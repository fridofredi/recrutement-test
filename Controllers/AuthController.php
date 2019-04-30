<?php

namespace Controllers;

use Modeles\Tables\Admin;
use Modeles\Tables\Gestionnaire;
use Modeles\Tables\Technicien;

class AuthController
{
    public function indexAction()
    {
        echo "Index de Default";
    }

    public function loginAction()
    {
        if ($_SESSION['connect'])
            header("Location:index.php?page=Gestionnaire");
        require_once("Vues/Pages/login.php");
    }

    public function logAction()
    {
        $username = addslashes(htmlspecialchars(trim($_POST['username'])));
        $password = sha1(trim($_POST['password']));
        $type = addslashes(htmlspecialchars(trim($_POST['type'] ?? "")));
        $connect = false;
        if ($username != "") {

            if ($type == "technicien") {
                $technicien = new Technicien();
                $technicien->setUsername($username);
                $technicien->setPassword($password);
                $connect = $technicien->connect();
                if ($connect) {
                    $_SESSION['technicien_id'] = $technicien->getId();
                }
            } else if ($type == "gestionnaire") {
                $gestionnaire = new Gestionnaire();
                $gestionnaire->setUsername($username);
                $gestionnaire->setPassword($password);
                $connect = $gestionnaire->connect();
                if ($connect) {
                    $_SESSION['gestionnaire_id'] = $gestionnaire->getId();
                }
            } else if ($type == "administrateur") {
                $admin = new Admin();
                $admin->setUsername($username);
                $admin->setPassword($password);
                $connect = $admin->connect();
                if ($connect) {
                    $_SESSION['admin_id'] = $admin->getId();
                }
            } else {
                header("Location:index.php?page=Auth/login");
            }
        }
        $_SESSION['connect'] = $connect;
        if ($connect) {
            header("Location:index.php?page=Gestionnaire");
        } else {
            header("Location:index.php?page=Auth/error404");
        }
    }

    public function error404Action()
    {
        echo "<h1>404</h1>";
    }

    public function logoutAction()
    {
        unset($_SESSION['gestionnaire_id']);
        unset($_SESSION['admin_id']);
        unset($_SESSION['technicien_id']);
        $_SESSION['connect'] = false;
        header("Location:index.php?page=Auth/login");
    }
}
