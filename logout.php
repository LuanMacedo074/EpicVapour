<?php session_start();
require_once './check.php';
session_unset();
session_destroy();
setcookie("user_login", "", time() - 3600);
die(header("Location: ./index.php"));