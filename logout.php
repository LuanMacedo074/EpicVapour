<?php session_start();
require 'db.php';
require_once './check.php';
session_unset();
session_destroy();
setcookie("user_login", "", time() - 3600);
if (array_key_exists('token', $_COOKIE)){
    $db = new DB();
    $sql = file_get_contents("./sql/guardsession.sql");
    $db->prepare($sql)->execute([null, $_COOKIE["email"]]);
    $db = null;
    setcookie("email", '', time() - 10);
    setcookie("token", '', time() - 10 );
}
die(header("Location: ./index.php"));