<?php
session_start();
require_once '../view/header.php';
require_once '../ini.php';

if (!empty($_POST['create']) && isset($_POST['create'])) {

    $name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'user_status', FILTER_SANITIZE_STRING);

    $user = new Users();
    $user->create($name, $status);

} else {
    echo '<h3 id="reg">Добавить запись</h3>
        <form id="test-form" action="" method="post">
            <div class="form-group">
                <label for="user_name">ФИО</label>
                <input type="text" name="user_name" required class="form-control" id="user_name" placeholder="ФИО">
            </div>
            <div class="form-group">
                <label for="user_status">Статус</label>
                <input type="text" name="user_status" required class="form-control" id="user_status" placeholder="Статус">
            </div>
            <div class="form-group ">
                <input type="submit" value="Создать" name="create" class="btn btn-success pull-right">
            </div>
        </form>';

}
require_once '../view/footer.php';