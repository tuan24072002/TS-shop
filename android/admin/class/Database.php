<?php
class Database
{
    public static function connectDB()
    {
        $host = "srv479.hstgr.io";
        $db = "u264766295_android";
        $port=3306;
        $username = "u264766295_android_admin";
        $password = "Admin123";
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=UTF8";
        try {
            $pdo = new PDO($dsn, $username, $password);
            return $pdo;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }
    }
}