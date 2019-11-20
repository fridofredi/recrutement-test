<?php

class Connexion
{

    /**
     * @var \PDO
     */
    private static $pdo;

    private static $host = 'localhost';
    private static $dbname = 'recrutem_recrutementtest';
    private static $user = 'recrutem_user';
    private static $password = 'recrutem123456789';

    /**
     * Initialise une connexion à la base de donnée
     *
     * @return mixed
     */
    private static function getConnection()
    {
        if (empty(self::$pdo)){
            self::$pdo = new \PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbname, self::$user, self::$password);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }

    public static function getInstance()
    {
        return self::getConnection();
    }
}
