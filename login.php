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
    <title>ENTRAR</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/validate.js"></script>
    <?php require './fonts'?>
</head>
<body class="loginpage">
    <?php require 'navbar.php'?>    
    <div class="loginform">
        <form action="createsession.php" method="post" onsubmit="return validateLogin();">
            <ul>
                <li><img id="loginico" src="siteimages/loginicon.png"> <br</li>
                <li><label class = "headertext">SIGN IN</label> <br></li>
                <li><input type="text" placeholder="Email" id="email" class="entrybox" name="email"></li>
                <li><input type="password" placeholder="Senha" id="password"class="entrybox" name="password"></li>
                <li class="checkbox"><input type="checkbox" name="mantersessao">
                    <span class="checkmark">Manter conectado</span></li><br>
                <li><button class="submitbuttons" id="btn1" type="submit">ENTRAR</button></li>
                <?php if (array_key_exists("err", $_SESSION)){
                    echo "<li class='errlog'><p>USUÁRIO E SENHA NÃO ENCONTRADOS</p></li>";
                    session_unset();}?>
            </ul>
        </form>
    </div>
    <div class="esqueceubox">
        <a class="textesqueceu" href="recuperarsenha.php">ESQUECEU SUA SENHA ?</a>
    </div>
</body>
</html>