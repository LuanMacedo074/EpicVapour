<?php

require './db.php';
require_once './getuserdata.php';

function check_expiration_time($expiration_time){
    $tempo = DateTime::createFromFormat("Y-m-d H:i:s", gmdate("Y-m-d H:i:s"));
    $expiration = DateTime::createFromFormat("Y-m-d H:i:s", $expiration_time);

    if ($expiration > $tempo){
        return true;
    } else{
        return false;
    }
}

$db = new DB(); 

$data = get_user_data($db,$_GET['email']);

if ($data && ! $data["is_active"]){
        if (! check_expiration_time($data["tempo_codigo"])){
           $sql = file_get_contents("./sql/deleteuser.sql");
           $db->prepare($sql)->execute([$data["email"]]);         
        } else{
            if (password_verify($_GET["activation_code"], $data["codigo_ativacao"])){
                $sql = file_get_contents("./sql/verifyaccount.sql");
                $db->prepare($sql)->execute([$data["email"]]);
            }
        }
} else{
    echo "usuario não encontrado";
}


session_start();
// require_once './check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATIVAR CONTA</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/buttons.js"></script>
    <script src="js/redirect.js"></script>
    <?php require './fonts'?>
</head>
<body class="redirect">
    <?php
    $data = get_user_data($db,$_GET['email']); 
    require './navbar.php'?>
    <img src="./siteimages/loginicon.png" class ="logo">
    <?php if ($data['is_active']){?>
        <p>Sua conta foi ativada. Você será redirecionado automaticamente.</p>
    <?php } if (!$data['is_active'] && !check_expiration_time($data['tempo_codigo'])) {?>
        <p>Seu link expirou. Você pode se cadastrar novamente.
        Você será redirecionado automaticamente.
        </p>
    <?php 
        $sql = file_get_contents("./sql/deleteuser.sql");
        $db->prepare($sql)->execute([$data["email"]]);
        };
        $db = null;
    ?>
</body>
</html>
