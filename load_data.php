<?php
session_start();
require_once 'ini.php';

if (empty($_POST['files'])) {
    require_once 'view/header.php';
    $files = $_GET['files'];

    $tab = new CreateTable();
    $table = $tab->create_tab();

    echo '<h4>Для заполнения таблицы данными выберите файл в формате CSV</h4>';
    echo '<form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="file">
                </div>
                <div class="form-group ">
                    <input type="hidden" value="' . $files . '" name="hidden">
                    <input type="submit" value="Отправить" name="files[]" class="btn btn-success pull-right">
                </div>
              </form>';

    require_once 'view/footer.php';

} else {
    $file = $_FILES['file'];
    $file_name = $file['name'];
    move_uploaded_file($file['tmp_name'], $file_name);
    $file_path = str_replace('\\', '/', dirname(__FILE__)) . '/' . $file_name;
    $_SESSION['$file_path'] = $file_path;

    header("HTTP/1.1 307 Temporary Redirect");
    header('Location: files/import_csv.php');
}