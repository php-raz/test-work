<?php
session_start();
require_once '../ini.php';
if (!empty($_GET['delete']) && isset($_GET['delete'])) {

    $id = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
    $user = new Users();
    $user->delete($id);
    session_destroy();
    setcookie(session_name(), '');
    header("HTTP/1.1 307 Temporary Redirect");
    header("Location: ../index.php");

}
