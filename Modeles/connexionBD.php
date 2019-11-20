<?php

class Connexion
{

    /**
     * @var \PDO
     */
    private static $pdo;

    private static $host = 'localhost';
    private static $dbname = 'recrutementTest';
    private static $user = 'root';
    private static $password = '';

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
