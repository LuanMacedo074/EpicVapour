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
    <title>ENTRAR</title>
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
    <?php 
    $db = new DB();

    if (!$_SESSION && isset($_GET['email']) && isset($_GET['recovery_code'])){ 
        require_once 'loginform.php';
    }
    else if (count($_SESSION) > 0){
        if ($_SESSION['errcode'] == 1){
        session_unset();
        require_once 'loginform.php';
    ?>
        <p>A nova senha não pode ser igual a senha anterior</p>
    <?php
        }
        else if ($_SESSION['errcode'] == 2){
        session_unset();
        require_once 'loginform.php';
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
    else if (isset($_GET['email']) && ! isset($_GET['recovery_code'])){
        echo "<p>Houve um problema com sua solicitação</p>";
    }
    $db = null
    ?>
</body>
</html>