<?php

class DatabaseSingleton
{
    private static $dbName = 'catalyst';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = 'osama123';
    private static $connection = null;

    private function __construct()
    {
        die('Init function is not allowed');
    }

    public static function getConnection()
    {
        // One connection through whole application
        if (null == self::$connection) {
//            try {
//                self::$connection =  mysqli_connect(self::$dbHost, self::$dbUsername, self::$dbUserPassword, self::$dbName);
                self::$connection = new mysqli(self::$dbHost, self::$dbUsername, self::$dbUserPassword, self::$dbName);
//                echo "Connected successfully";
//            } catch (PDOException $e) {
//                die("Oops");
//                echo "Connection failed: " . $e->getMessage();
//            }
            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$connection->connect_error);
            }

        }
        return self::$connection;
    }

    public static function disconnect()
    {
        self::$connection = null;
    }


}