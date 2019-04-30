<?php

namespace Controllers;

use Modeles\Tables\Probleme;

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

    public function storeAction()
    {
        $probleme_ = addslashes(htmlspecialchars(trim($_POST['type'])));

        if ($probleme_ != "") {
            if ($_POST['csrf'] == $_SESSION['csrf']) {
                $probleme = new Probleme();
                $probleme->setType($probleme_);
                $probleme->save();
            }
            header('Location:index.php?page=Probleme');
        } else {
            header("Location:index.php?page=Probleme/create");
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
        $probleme->find();
        $this->setLayout("layout");
        echo $this->renderView("probleme/probleme_update", ['table' => $probleme, 'id' => $id]);
    }

    public function upgradeAction()
    {
        $probleme = new Probleme();
        $probleme->setId($_POST['id']);
        if (!empty($probleme->find())) {
            $probleme_ = addslashes(htmlspecialchars(trim($_POST['type'])));
            if ($probleme_ != "") {
                if ($_POST['csrf'] == $_SESSION['csrf']) {
                    $probleme->setType($probleme_);
                    $probleme->save();
                }
                header('Location:index.php?page=Probleme');
            } else {
                header("Location:index.php?page=Probleme/update/" . $_POST['id']);
            }
        }
        header('Location:index.php?page=Probleme');
    }

    public function showAction($id)
    {
        $probleme = new Probleme();
        $probleme->setId($id);
        $probleme->find();
        $this->setLayout("layout");
        echo $this->renderView("probleme/probleme_showone", ['table' => $probleme, 'id' => $id]);
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
