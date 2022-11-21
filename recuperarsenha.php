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
    <?php require './fonts'?>
</head>
<body class = "forgotpage">
    <?php require 'navbar.php'?>
    <div class="recoveryform">
        <form action="sendrecoveryemail.php" method="post" onsubmit="return isEmail('email');">
            <ul>
                <li><img id="loginico" src="siteimages/loginicon.png"> <br</li>
                <li><label class = "headertext">RECUPERAR SUA SENHA</label> <br></li>
                <li><input type="text" class="entrybox" placeholder="Email" id="email" name="email"></li>
                <li><label class = "formtext">Digite o email da sua conta verificada e nós iremos enviar para você
                    um link para redefinir a sua senha.
                </label></li>
                <li> <button class="submitbuttons" id="sendbutton" type="submit">ENVIAR EMAIL</button></li>
            </ul>       
        </form>
    </div>
</body>
</html>