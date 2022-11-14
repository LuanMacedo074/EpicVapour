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
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/buttons.js"></script>
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
                <li style="float:right"><a href="login.php">Entrar</a></li>
            </ul>
        </nav>
    </div>
    <div class="loginform">
        <form action="sendrecoveryemail.php" method="post" onsubmit="return isEmail('email');">
            <ul>
                <li><input type="text" placeholder="Email" id="email" name="email"></li>
                <li> <button class="btn3" type="submit">ENVIAR EMAIL</button></li>
            </ul>       
        </form>
    </div>
</body>
</html>