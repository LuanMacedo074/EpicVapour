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
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/validate.js"></script>
</head>
<body>

    <div class="navbar">
        <nav>
            <ul>
                <li><a href="index.php" >Home</a></li>
                <li><a href="javascript:void(0)">Comunidade</a></li>
                <li><a href="javascript:void(0)">Jogos</a></li>
                <li><a href="javascript:void(0)">Contato</a></li>
                <li style="float:right"><a href="registro.php">Registro</a></li>
                <li style="float:right"><a href="javascript:void(0)" class="active">Entrar</a></li>
            </ul>
        </nav>
    </div>
    <div class="loginform">
        <form action="createsession.php" method="post" onsubmit="return validateLogin();">
            <ul>
                <li><input type="text" placeholder="Email" id="email" name="email"></li>
                <li><input type="password" placeholder="Senha" id="password"name="password"></li>
                <li><button class="btn1" type="submit">ENTRAR</button> <a href="recuperarsenha.php">ESQUECEU SUA SENHA?</a></li>
                <?php if (array_key_exists("err", $_SESSION)){
                    echo "<li><p> O USUÁRIO NÃO EXISTE</p></li>";
                    session_unset();}?>
            </ul>       
        </form>
    </div>
</body>
</html>