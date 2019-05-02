<?php

namespace Controllers;

use Modeles\Tables\Type_vehicule;
use Modeles\Tables\Vehicule;

class VehiculeController extends Controller
{
    public function indexAction()
    {
        $v = new Vehicule();
        $vehicules = $v->findAll();
        $token = sha1(time());
        $_SESSION['token'] = $token;
        $this->setLayout("layout");
        echo $this->renderView("vehicule/vehicule_show", ['table_data' => $vehicules, 'token' => $token]);
    }

    public function storeAction()
    {
        if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
            return;
        }
        $date_achat = addslashes(htmlspecialchars(trim($_POST['date_achat'])));
        $type_vehicule_id = addslashes(htmlspecialchars(trim($_POST['type_vehicule_id'])));
        if ($date_achat != "" and $type_vehicule_id != "") {
            if ($_POST['csrf'] == $_SESSION['csrf']) {
                $v = new Vehicule();
                $v->setDate_achat($date_achat);
                $v->setType_vehicule_id($type_vehicule_id);
                $v->setGestionnaire_id($_SESSION['gestionnaire_id']);
                $v->save();
            }
            header('Location:index.php?page=Vehicule');
        } else {
            header("Location:index.php?page=Vehicule/create");
        }
    }

    public function createAction()
    {
        $this->setLayout("layout");
        echo $this->renderView("vehicule/vehicule", ['select_data' => (new Type_vehicule())->findAll()]);

    }

    public function updateAction($id)
    {
        $v = new Vehicule();
        $v->setId($id);
        $v->find();
        $this->setLayout("layout");
        echo $this->renderView("vehicule/vehicule_update", ['table' => $v, 'id' => $id, 'select_data' => (new Type_vehicule())->findAll()]);
    }

    public function upgradeAction()
    {
        if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
            return;
        }
        $v = new Vehicule();
        $v->setId($_POST['id']);
        if (!empty($v->find())) {
            $date_achat = addslashes(htmlspecialchars(trim($_POST['date_achat'])));
            $type_vehicule_id = addslashes(htmlspecialchars(trim($_POST['type_vehicule_id'])));
            if ($type_vehicule_id != "") {
                if ($_POST['csrf'] == $_SESSION['csrf']) {
                    if ($date_achat != "")
                        $v->setDate_achat($date_achat);
                    $v->setType_vehicule_id($type_vehicule_id);
                    $v->setGestionnaire_id($_SESSION['gestionnaire_id']);
                    $v->save();
                }
                header('Location:index.php?page=Vehicule');
            } else {
                header("Location:index.php?page=Vehicule/update");
            }
        }
        header('Location:index.php?page=Vehicule');
    }

    public function showAction($id)
    {
        $v = new Vehicule();
        $v->setId($id);
        $v->find();
        $this->setLayout("layout");
        echo $this->renderView("vehicule/vehicule_showone", ['table' => $v, 'id' => $id]);
    }

    public function removeAction($id, $token)
    {

        if ($token == $_SESSION['token']) {
            $v = new Vehicule();
            $v->setId($id);
            $v->remove();
        }
        header('Location:index.php?page=Vehicule');
    }

}
