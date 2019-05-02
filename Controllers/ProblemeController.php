<?php

namespace Controllers;

use Modeles\Tables\Maintenance;
use Modeles\Tables\Piece;
use Modeles\Tables\Probleme;
use Modeles\Tables\Vehicule;

class ProblemeController extends Controller
{
    public function indexAction($vehicule)
    {
        $probleme = new Probleme();
        $probleme->setVehicule_id($vehicule);
        $problemes = $probleme->findAllProblemeByVehicule();
        $token = sha1(time());
        $_SESSION['token'] = $token;
        $this->setLayout("layout");
        echo $this->renderView("probleme/probleme_show", ['table_data' => $problemes, "vehicule" => $vehicule, 'token' => $token]);
    }

    public function storeAction($vehicule)
    {
        if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
            return;
        }
        $detail = addslashes(htmlspecialchars(trim($_POST['detail'])));
        $date_debut = addslashes(htmlspecialchars(trim($_POST['date_debut'])));
        $date_fin = addslashes(htmlspecialchars(trim($_POST['date_fin'])));
        $description = addslashes(htmlspecialchars(trim($_POST['description'])));
        $sujet = addslashes(htmlspecialchars(trim($_POST['sujet'])));
        $pieces = addslashes(htmlspecialchars(trim($_POST['pieces'])));

        $pieces = explode(",", $pieces);

        if ($vehicule != "") {
            $v = new Vehicule();
            $v->setId($vehicule);
            if ($v->find()) {
                if ($_POST['csrf'] == $_SESSION['csrf']) {
                    $p = new Probleme();
                    $p->setVehicule_id($vehicule);
                    $p->setDetail($detail);
                    $p->setTechnicien_id($_SESSION['technicien_id']);
                    if ($p->save()) {
                        if ($date_debut || $date_fin || $description || $sujet) {
                            $p->search();
                            $m = new Maintenance();
                            $m->setDate_debut($date_debut);
                            $m->setDate_fin($date_fin);
                            $m->setDescription($description);
                            $m->setProbleme_id($p->getId());
                            $m->setSujet($sujet);
                            if ($m->save()) {
                                $m->search();
                                if (!empty($pieces)) {
                                    foreach ($pieces as $piece) {
                                        $p = new Piece();
                                        $p->setMaintenance_id($m->getId());
                                        $p->setPiece($piece);
                                        $p->save();
                                    }
                                }
                            }
                        }
                    }
                }
            }
            header('Location:index.php?page=Probleme/index/' . $vehicule);
        } else {
            header("Location:index.php?page=Probleme/create/" . $vehicule);
        }
    }

    public function createAction($vehicule)
    {
        $this->setLayout("layout");
        echo $this->renderView("probleme/probleme", ["vehicule" => $vehicule]);

    }

    public function updateAction($id)
    {
        $probleme = new Probleme();
        $probleme->setId($id);
        $data = $probleme->deepFind();
        $this->setLayout("layout");
        $m = new Maintenance();
        $m->setId($data->MAINTENANCE_ID);
        $pieces = $m->getPieces();
        $pieceString = "";
        foreach ($pieces as $item) {
            $pieceString .= $item->PIECE . ',';
        }
        echo $this->renderView("probleme/probleme_update", ['table' => $data, 'pieces' => trim($pieceString, ','), 'id' => $id]);
    }

    public function upgradeAction()
    {
        if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
            return;
        }
        $probleme = new Probleme();
        $probleme->setId($_POST['id']);
        if (!empty($probleme->find())) {
            $detail = addslashes(htmlspecialchars(trim($_POST['detail'])));
            $date_debut = addslashes(htmlspecialchars(trim($_POST['date_debut'])));
            $date_fin = addslashes(htmlspecialchars(trim($_POST['date_fin'])));
            $description = addslashes(htmlspecialchars(trim($_POST['description'])));
            $sujet = addslashes(htmlspecialchars(trim($_POST['sujet'])));
            $pieces = addslashes(htmlspecialchars(trim($_POST['pieces'])));
            $pieces = explode(",", $pieces);

            if ($_POST['csrf'] == $_SESSION['csrf']) {
                $probleme->setDetail($detail);
                $probleme->setTechnicien_id($_SESSION['technicien_id']);
                if ($probleme->save()) {
                    if ($date_debut || $date_fin || $description || $sujet) {
                        $m = new Maintenance();
                        $m->setId($probleme->Maintenance()->ID);
                        $m->setDate_debut($date_debut);
                        $m->setDate_fin($date_fin);
                        $m->setDescription($description);
                        $m->setProbleme_id($probleme->getId());
                        $m->setSujet($sujet);
                        $m->search();
                        if ($m->save()) {
                            $m->search();
                            if (!empty($pieces)) {
                                $listePiece = $m->getPieces();
                                foreach ($pieces as $piece) {
                                    $p = new Piece();
                                    $p->setMaintenance_id($m->getId());
                                    $p->setPiece($piece);
                                    foreach ($listePiece as $item) {
                                        if ($item->PIECE == $piece) {
                                            $p->setId($item->ID);
                                        }
                                    }
                                    $p->save();
                                }
                            }
                        }
                    }
                }
            }
            header('Location:index.php?page=Probleme/index/' . $probleme->getVehicule_id());
        }
        header('Location:index.php?page=Probleme/index/' . $probleme->getVehicule_id());
    }

    public function showAction($id)
    {
        $probleme = new Probleme();
        $probleme->setId($id);
        $data = $probleme->deepFind();

        $this->setLayout("layout");
        $m = new Maintenance();
        $m->setId($data->MAINTENANCE_ID);
        $pieces = $m->getPieces();
        $pieceString = "";
        foreach ($pieces as $item) {
            $pieceString .= '<li>' . $item->PIECE . '</li>';
        }
        echo $this->renderView("probleme/probleme_showone", ['table' => $data, 'pieces' => $pieceString, 'id' => $id]);
    }

    public function removeAction($id, $token)
    {

        if ($token == $_SESSION['token']) {
            $probleme = new Probleme();
            $probleme->setId($id);
            $probleme->remove();
        }
        header('Location:index.php?page=Probleme');
    }

}
