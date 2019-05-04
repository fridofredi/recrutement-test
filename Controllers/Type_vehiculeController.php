<?php

namespace Controllers;

use Modeles\Tables\Type_vehicule;

class Type_vehiculeController extends Controller
{
    public function indexAction()
    {
        $type = new Type_vehicule();
        $type_vehicules = $type->findAll();
        $token = sha1(time());
        $_SESSION['token'] = $token;
        $this->setLayout("layout");
        echo $this->renderView("type_vehicule/type_vehicule_show", ['table_data' => $type_vehicules, 'token' => $token]);
    }

    public function storeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }
        $type_ = addslashes(htmlspecialchars(trim($_POST['type'])));

        if ($type_ != "") {
            if ($_POST['csrf'] == $_SESSION['csrf']) {
                $type = new Type_vehicule();
                $type->setType($type_);
                $type->save();
            }
            header('Location:index.php?page=Type_vehicule');
        } else {
            header("Location:index.php?page=Type_vehicule/create");
        }
    }

    public function createAction()
    {
        $this->setLayout("layout");
        echo $this->renderView("type_vehicule/type_vehicule");

    }

    public function updateAction($id)
    {
        $type = new Type_vehicule();
        $type->setId($id);
        $type->find();
        $this->setLayout("layout");
        echo $this->renderView("type_vehicule/type_vehicule_update", ['table' => $type, 'id' => $id]);
    }

    public function upgradeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }
        $type = new Type_vehicule();
        $type->setId($_POST['id']);
        if (!empty($type->find())) {
            $type_ = addslashes(htmlspecialchars(trim($_POST['type'])));
            if ($type_ != "") {
                if ($_POST['csrf'] == $_SESSION['csrf']) {
                    $type->setType($type_);
                    $type->save();
                }
                header('Location:index.php?page=Type_vehicule');
            } else {
                header("Location:index.php?page=Type_vehicule/update/" . $_POST['id']);
            }
        }
        header('Location:index.php?page=Type_vehicule');
    }

    public function showAction($id)
    {
        $type = new Type_vehicule();
        $type->setId($id);
        $type->find();
        $this->setLayout("layout");
        echo $this->renderView("type_vehicule/type_vehicule_showone", ['table' => $type, 'id' => $id]);
    }

    public function removeAction($id, $token)
    {

        if ($token == $_SESSION['token']) {
            $type = new Type_vehicule();
            $type->setId($id);
            $type->remove();
        }
        header('Location:index.php?page=Type_vehicule');
    }

}
