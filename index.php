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

$_SESSION['admin_id'] = 1;
$_SESSION['gestionnaire_id'] = 2;

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
