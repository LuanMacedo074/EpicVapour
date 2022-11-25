<?php session_start();
require 'checksession.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEM VINDO A EPIC VAPOUR!</title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <?php require './fonts'?>
    <link rel="stylesheet" href="./style/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php require 'navbar.php';
    var_dump($_SESSION)?>
</body>
</html>