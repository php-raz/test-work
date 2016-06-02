<?php


final class ConnectDB
{
    public static $db;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $base = 'test-work';

        $mysqli = @new mysqli($host, $user, $pass, $base);
        if ($mysqli->connect_errno) {
            die('Не удалось подключиться к базе: ' . $base);
        }
        self::$db = $mysqli;
    }
}