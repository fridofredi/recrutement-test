<?php
namespace Modeles;

class Autoload
{

    /**
     * Fais le chargement automatique des classes
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Méthode qui charge la classe
     *
     * @param string $class
     */
    static function autoload(string $class)
    {
        $class = str_replace("\\", "/", $class);
        if (file_exists($class . '.php')) {
            require $class . '.php';
        }else{
          die('Classe Not Found');
        }
    }
}
