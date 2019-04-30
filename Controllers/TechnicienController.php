<?php

namespace Controllers;

use Modeles\Tables\Technicien;

class TechnicienController extends Controller
{
    public function indexAction()
    {
        $t = new Technicien();
        $techniciens = $t->findAll();
        $token = sha1(time());
        $_SESSION['token'] = $token;
        $this->setLayout("layout");
        echo $this->renderView("technicien/technicien_show", ['table_data' => $techniciens, 'token' => $token]);
    }

    public function storeAction()
    {
        $nom = addslashes(htmlspecialchars(trim($_POST['nom'])));
        $prenoms = addslashes(htmlspecialchars(trim($_POST['prenoms'])));
        $username = addslashes(htmlspecialchars(trim($_POST['username'])));
        $password = trim($_POST['password']);
        if ($nom != "" and $prenoms != "" and $password != "" and $username != "") {
            if ($_POST['csrf'] == $_SESSION['csrf']) {
                $t = new Technicien();
                $t->setNom($nom);
                $t->setPrenoms($prenoms);
                $t->setPassword(sha1($password));
                $t->setAdmin_id($_SESSION['admin_id']);
                $t->setUsername($username);
                $t->save();
            }
            header('Location:index.php?page=Technicien');
        } else {
            header("Location:index.php?page=Technicien/create");
        }
    }

    public function createAction()
    {
        $this->setLayout("layout");
        echo $this->renderView("technicien/technicien");

    }

    public function updateAction($id)
    {
        $t = new Technicien();
        $t->setId($id);
        $t->find();
        $this->setLayout("layout");
        echo $this->renderView("technicien/technicien_update", ['table' => $t, 'id' => $id]);
    }

    public function upgradeAction()
    {
        $t = new Technicien();
        $t->setId($_POST['id']);
        if (!empty($t->find())) {
            $nom = addslashes(htmlspecialchars(trim($_POST['nom'])));
            $prenoms = addslashes(htmlspecialchars(trim($_POST['prenoms'])));
            $username = addslashes(htmlspecialchars(trim($_POST['username'])));
            $password = trim($_POST['password']);
            if ($nom != "" and $prenoms != "" and $username != "") {
                if ($_POST['csrf'] == $_SESSION['csrf']) {
                    $t->setNom($nom);
                    $t->setPrenoms($prenoms);
                    if ($password)
                        $t->setPassword(sha1($password));
                    $t->setAdmin_id($_SESSION['admin_id']);
                    $t->setUsername($username);
                    $t->save();
                }
                header('Location:index.php?page=Technicien');
            } else {
                header("Location:index.php?page=Technicien/update");
            }
        }
        header('Location:index.php?page=Technicien');
    }

    public function showAction($id)
    {
        $t = new Technicien();
        $t->setId($id);
        $t->find();
        $this->setLayout("layout");
        echo $this->renderView("technicien/technicien_showone", ['table' => $t, 'id' => $id]);
    }

    public function removeAction($id, $token)
    {

        if ($token == $_SESSION['token']) {
            $t = new Technicien();
            $t->setId($id);
            $t->remove();
        }
        header('Location:index.php?page=Technicien');
    }

}
