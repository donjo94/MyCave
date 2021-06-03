<?php

class Database
{

    private static $dbHost = "sql11.freemysqlhosting.net";
    private static $dbName = "sql11416776";
    private static $dbUser = "sql11416776";
    private static $dbUserPassword = "V8Q9q7hy3b";

    private static $connection = null;

    public static function connect()
    {
        try {
            self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUser, self::$dbUserPassword, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return self::$connection;
    }
    public static function disconnect()
    {
        self::$connection = null;
    }
}

Database::connect();
