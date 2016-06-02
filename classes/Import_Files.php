<?php

class Import_Files
{
    private $mysqli, $table_name;

    public function __construct($table_name)
    {
        ConnectDB::getInstance();
        $db = ConnectDB::$db;
        $this->mysqli = $db;

        $this->table_name = $table_name;
    }

    public function insert($param, $update = false)
    {
        if ($param != null) {
            $key = array_keys($param);
            $value = array_values($param);
            if ($update) {
                for ($i = 0; $i < count($key); $i++) {
                    if ($value[$i] != '') {
                        $sql = 'UPDATE `' . $this->table_name . '` SET `' . $key[$i] . '` = "' . $value[$i] . '"
                    WHERE id = "' . $param['id'] . '"';
                    }
                    $result = $this->mysqli->query($sql);
                    if (!$result) die($this->mysqli->error);
                }
            } else {
                for ($i = 0; $i < count($key); $i++) {
                    if ($value[$i] != '') {
                        if ($i == 0) {
                            $sql = 'INSERT  INTO `' . $this->table_name . '` SET `' . $key[$i] . '` = "' . $value[$i] . '"';
                        } else {
                            $sql = 'UPDATE `' . $this->table_name . '` SET `' . $key[$i] . '` = "' . $value[$i] . '"
                    WHERE id = "' . $param['id'] . '"';
                        }
                    }
                    $result = $this->mysqli->query($sql);
                    if (!$result) die($this->mysqli->error);
                }
            }
        }
    }

    public function validate($param)
    {
        $count = count($param);
        $param['id'] = filter_var($param[0], FILTER_VALIDATE_INT);
        $param['name'] = filter_var($param[1], FILTER_SANITIZE_STRING);
        $param['status'] = filter_var($param[2], FILTER_VALIDATE_INT);

        for ($i = 0; $i < $count; $i++) {
            unset($param[$i]);
        }
        return $param;
    }

    public function id_row()
    {
        $sql = 'SELECT * FROM `' . $this->table_name . '`';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        $result = $result->fetch_all(MYSQLI_ASSOC);

        $id = array();
        foreach ($result as $item) {
            $id[] = $item['id'];
        }
        return $id;
    }
}