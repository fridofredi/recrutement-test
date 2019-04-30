<?php

namespace Controllers;

use Modeles\Tables\Gestionnaire;

class GestionnaireController extends Controller
{
    public function indexAction()
    {
        $g = new Gestionnaire();
        $gestionnaires = $g->findAll();
        $token = sha1(time());
        $_SESSION['token'] = $token;
        $this->setLayout("layout");
        echo $this->renderView("gestionnaire/gestionnaire_show", ['table_data' => $gestionnaires, 'token' => $token]);
    }

    public function storeAction()
    {
        $nom = addslashes(htmlspecialchars(trim($_POST['nom'])));
        $prenoms = addslashes(htmlspecialchars(trim($_POST['prenoms'])));
        $username = addslashes(htmlspecialchars(trim($_POST['username'])));
        $password = trim($_POST['password']);
        if ($nom != "" and $prenoms != "" and $password != "" and $username != "") {
            if ($_POST['csrf'] == $_SESSION['csrf']) {
                $g = new Gestionnaire();
                $g->setNom($nom);
                $g->setPrenoms($prenoms);
                $g->setPassword(sha1($password));
                $g->setAdmin_id($_SESSION['admin_id']);
                $g->setUsername($username);
                $g->save();
            }
            header('Location:index.php?page=Gestionnaire');
        } else {
            header("Location:index.php?page=Gestionnaire/create");
        }
    }

    public function createAction()
    {
        $this->setLayout("layout");
        echo $this->renderView("gestionnaire/gestionnaire");

    }

    public function updateAction($id)
    {
        $g = new Gestionnaire();
        $g->setId($id);
        $g->find();
        $this->setLayout("layout");
        echo $this->renderView("gestionnaire/gestionnaire_update", ['table' => $g, 'id' => $id]);
    }

    public function upgradeAction()
    {
        $g = new Gestionnaire();
        $g->setId($_POST['id']);
        if (!empty($g->find())) {
            $nom = addslashes(htmlspecialchars(trim($_POST['nom'])));
            $prenoms = addslashes(htmlspecialchars(trim($_POST['prenoms'])));
            $username = addslashes(htmlspecialchars(trim($_POST['username'])));
            $password = trim($_POST['password']);
            if ($nom != "" and $prenoms != "" and $username != "") {
                if ($_POST['csrf'] == $_SESSION['csrf']) {
                    $g->setNom($nom);
                    $g->setPrenoms($prenoms);
                    if ($password)
                        $g->setPassword(sha1($password));
                    $g->setAdmin_id($_SESSION['admin_id']);
                    $g->setUsername($username);
                    $g->save();
                }
                header('Location:index.php?page=Gestionnaire');
            } else {
                header("Location:index.php?page=Gestionnaire/update");
            }
        }
        header('Location:index.php?page=Gestionnaire');
    }

    public function showAction($id)
    {
        $g = new Gestionnaire();
        $g->setId($id);
        $g->find();
        $this->setLayout("layout");
        echo $this->renderView("gestionnaire/gestionnaire_showone", ['table' => $g, 'id' => $id]);
    }

    public function removeAction($id, $token)
    {

        if ($token == $_SESSION['token']) {
            $g = new Gestionnaire();
            $g->setId($id);
            $g->remove();
        }
        header('Location:index.php?page=Gestionnaire');
    }

}
