<?php
session_start();
require_once '../ini.php';
require_once '../view/header.php';

$id = filter_input(INPUT_GET, 'update', FILTER_SANITIZE_NUMBER_INT);
$user = new Users();
$data = $user->findOne($id);

if (!$_POST['edit_user']) {
    echo '<h3>Редактирование pfgbcm</h3>';
    echo '<form action="" method="post">
                <div class="form-group">
                    <label for="user_name">ФИО</label>
                    <input type="text" name="user_name" value="' . $data[1] . '" required class="form-control" id="user_name" placeholder="ФИО">
                </div>
                <div class="form-group">
                    <label for="user_status">Статус</label>
                    <input type="text" name="user_status" value="' . $data[2] . '" required class="form-control" id="user_status" placeholder="Статус">
                </div>
                <div class="form-group ">
                    <input type="submit" value="Сохранить" name="edit_user" class="btn btn-success pull-right">
                </div>
              </form>';
} else {
    $name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'user_status', FILTER_SANITIZE_STRING);

    $user->update($id, $name, $status);
}


require_once '../view/footer.php';