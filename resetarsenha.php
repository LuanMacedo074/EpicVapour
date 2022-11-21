<?php session_start();
require_once './check.php';
require_once './db.php';
require_once 'getuserdata.php';
require './islogged.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESETAR SUA SENHA</title>
    <link rel="stylesheet" href="./style/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <script src="js/validate.js"></script>
    <script src="js/buttons.js"></script>
    <?php require './fonts'?>
</head>
<body class ="resetpasspage">
    <?php require 'navbar.php'?>
    <?php 
    $db = new DB();

    if (! array_key_exists('errcode', $_SESSION)){ 
        require_once 'resetpassform.php';
    }
    else if (count($_SESSION) > 0){
        if ($_SESSION['errcode'] == 1){
        session_unset();
        require_once 'resetpassform.php';
    ?>
        <p>A nova senha não pode ser igual a senha anterior</p>
    <?php
        }
        else if ($_SESSION['errcode'] == 2){
        session_unset();
        require_once 'resetpassform.php';
    ?>
        <p>A senha antiga não coincide.</p>
    <?php
        }
    else if ($_SESSION['errcode'] == 0){
        session_unset();
    ?>
        <p>Senha redefinida com sucesso!</p>
    <?php 
        }
    }
    else{
        echo "<p>Houve um problema com sua solicitação</p>";
    }
    $db = null
    ?>
</body>
</html>