<?php session_start();
require './islogged.php';

if (check_is_logged() == true){
    die(http_response_code(403));}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="./style/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <script src="js/validate.js"></script>
</head>
<body>
    <?php require 'navbar.php'?>
    <div class="registerform">
        <form action="addregistro.php" method="post" onsubmit="return validateForm();">
            <ul>
                <li><input type="text" placeholder="examplo@dominio.com" id = "email" name="email"> <input type="text" placeholder="Confirma Email" id="confirmemail" name="confirmemail"></li>
                <li><input type="text" placeholder="Usuario" id="username" name="username"></li>
                <li><input type="password" placeholder="Senha" id="password"name="password"> <input type="password" id="confirmpassword"name="confirmpassword "placeholder="Confirma Senha"></li>
                <li> <button class="btn1" type="submit">REGISTRAR</button></li>
            </ul>
        </form>
    </div>
</body>
</html>