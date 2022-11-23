<?php session_start();
require_once './check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECUPERAR SENHA</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/buttons.js"></script>
    <script src="js/redirect.js"></script>
    <?php require './fonts'?>
</head>
<body class="senharesetada">
    <?php require './navbar.php'?>
    <img src="./siteimages/loginicon.png" class ="logo">
    <p>Sua senha foi redefinida. Você será redirecionado automaticamente.</p>
</body>
</html>