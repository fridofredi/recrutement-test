<?php

require "Modeles/Autoload.php";
require "Modeles/connexionBD.php";
session_start();
Modeles\Autoload::register();
$controller_namespace = "Controllers\\";
$page = isset($_GET['page']) ? $_GET['page'] : 'Default';
$pages = explode('/',$page);

$controller = $controller_namespace.(isset($pages[0]) ? $pages[0] : 'Default').'Controller';
$method = (isset($pages[1]) ? $pages[1] : 'index').'Action';

array_shift($pages);
array_shift($pages);
$urls = array(
    "admin" => array(
        "Gestionnaire",
        "Technicien",
        "Auth",
        "Default"
    ),
    "gestionnaire" => array(
        "Vehicule",
        "Type_vehicule",
        "Auth",
        "Default"
    ),
    "technicien" => array(
        "Maintenance",
        "Probleme",
        "Vehicule",
        "Auth",
        "Default"
    ),
    "other" => array(
        "Auth"
    )
);

$find = false;
if (isset($_SESSION['technicien_id']) and !empty($_SESSION['technicien_id'])) {
    $profile_connected = "technicien";
    foreach ($urls['technicien'] as $item) {
        if (preg_match("#^{$item}#", $page)) {
            $find = true;
        }
    }
} else if (isset($_SESSION['admin_id']) and !empty($_SESSION['admin_id'])) {
    $profile_connected = "admin";
    foreach ($urls['admin'] as $item) {
        if (preg_match("#^" . $item . "#", $page)) {
            $find = true;
        }
    }
} else if (isset($_SESSION['gestionnaire_id']) and !empty($_SESSION['gestionnaire_id'])) {
    $profile_connected = "gestionnaire";
    foreach ($urls['gestionnaire'] as $item) {
        if (preg_match("#^" . $item . "#", $page)) {
            $find = true;
        }
    }
} else {
    foreach ($urls['other'] as $item) {
        if (preg_match("#^" . $item . "#", $page)) {
            $find = true;
        }
    }
}
if (!$find)
    header("Location:index.php?page=Auth/login");

try {
    ($_SESSION['csrf'] ?? $_SESSION['csrf'] = sha1(random_bytes(8)));
} catch (Exception $e) {
}

if (class_exists($controller)){
  if (!method_exists($controller, $method)){
    die('Method not exists');
  }else {
    call_user_func_array(array(new $controller , $method), $pages);
  }
}else{
    die('Class not exists');
}
