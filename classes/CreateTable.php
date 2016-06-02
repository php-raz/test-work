<?php

class CreateTable
{
    private $mysqli;

    public function __construct()
    {
        ConnectDB::getInstance();
        $db = ConnectDB::$db;
        $this->mysqli = $db;
    }

    public function show_tab()
    {
        $sql = 'SELECT * FROM `users` LIMIT 1';
        $result = $this->mysqli->query($sql);
        return $result;
    }

    public function create_tab()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `users`(
                    `id` INT NOT NULL AUTO_INCREMENT,
                    `name` CHAR(20) NOT NULL,
                    `status` INT NOT NULL,
                    PRIMARY KEY (`id`))';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        echo '<h5>Таблица `users` создана</h5>';
    }
}