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
    <?php require './fonts'?>
</head>
<body class ="registerpage">
    <?php require 'navbar.php'?>
    <div class="registerform">
        <form action="addregistro.php" method="post" onsubmit="return validateForm();">
            <ul>
                <li><img id="loginico" src="siteimages/loginicon.png"> <br</li>
                <li><label class = "headertext">REGISTRO</label> <br></li>
                <li><input type="text" placeholder="Email" id ="email" name="email" class="entrybox"> <input type="text" class="entrybox" placeholder="Confirma Email" id="confirmemail" name="confirmemail"></li>
                <li><input type="text" style="width: 28em;" placeholder="Usuario" class="entrybox" id="username" name="username"></li>
                <li><input type="password" placeholder="Senha" class="entrybox" id="password"name="password"> <input type="password" class="entrybox" id="confirmpassword"name="confirmpassword "placeholder="Confirma Senha"></li>
                <li><label class="alerttext"> Use oito ou mais caracteres com uma combinação de letras, números e símbolos.</label></li>
                <li> <button class="submitbuttons" type="submit">REGISTRAR</button></li>
                <?php 
                    if (array_key_exists("err", $_SESSION)){
                    echo "<li class='errlog'><p>ESTE EMAIL JÁ POSSUI CADASTRO</p></li>";
                    session_unset();}
                ?>
            </ul>
        </form>
    </div>
</body>
</html>