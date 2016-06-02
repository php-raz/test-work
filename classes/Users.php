<?php

class Users
{
    private $mysqli;

    public function __construct()
    {
        ConnectDB::getInstance();
        $db = ConnectDB::$db;
        $this->mysqli = $db;
    }

    public function create($name, $status)
    {
        $sql = 'INSERT INTO `users` SET id = "NULL", name = "' . $name . '", status = "' . $status . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        echo '<h3>Пользователь "' . $name . '" добавлен</h3>';
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `users` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) {
            die($this->mysqli->error);
        }
    }

    public function update($id, $name, $status)
    {
        $sql = 'UPDATE `users` SET name = "' . $name . '", status = "' . $status . '"
         WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        echo '<h3>Пользователь "' . $name . '" обновлен</h3>';

    }

    public function find()
    {
        $sql = "SELECT * FROM `users`";
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findOne($id)
    {
        $sql = 'SELECT * FROM `users` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_row();

    }
}
