<?php session_start();
require_once './check.php';
session_unset();
session_destroy();
die(header("Location: ./index.php"));