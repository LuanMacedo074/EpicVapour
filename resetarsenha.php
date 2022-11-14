<?php session_start();
require_once './check.php';
require_once './db.php';
require_once 'getuserdata.php';
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
    if (isset($_GET['email'])){
        $data = get_user_data($db, $_GET['email']);
    if ($data && password_verify($_GET['recovery_code'], $data['recovery_code'])){
    ?>
        <div class="loginform">
            <form action="registernewpassword.php?email=<?php echo $_GET['email']?>" method="post" onsubmit="return validateRecovery();">
                <ul>
                    <li><input type="password" placeholder="Senha antiga" id="oldpassword" name="oldpassword">
                    <li><input type="password" placeholder="Senha nova" id="password" name="password"></li>
                    <li><input type="password" id="confirmpassword" name="confirmpassword "placeholder="Confirma Senha"></li>
                    <li><button class="btn4" type="submit">RESETAR</button></li>
                </ul>      
            </form>
        </div>
    <?php 
    } else{
    ?>
           <div class="loginform">
            <form action="registernewpassword.php?email=<?php echo $_GET['email']?>" method="post" onsubmit="return validateRecovery();">
                <ul>
                    <li><input type="password" placeholder="Senha antiga" id="oldpassword" name="oldpassword">
                    <li><input type="password" placeholder="Senha nova" id="password" name="password"></li>
                    <li><input type="password" id="confirmpassword" name="confirmpassword "placeholder="Confirma Senha"></li>
                    <li><button class="btn4" type="submit">RESETAR</button></li>
                </ul>      
            </form>
        </div>
        <p>Ocorreu um erro ao validar sua conta</p>
    <?php
    }}
    $db = null;
    ?>

    <?php
    if (!$_SESSION){
    }
    else{
        if ($_SESSION['errcode'] == 1){
        session_unset();
    ?>
        <p>A nova senha não pode ser igual a senha anterior</p>
    <?php
        }
        else if ($_SESSION['errcode'] == 2){
        session_unset();
    ?>
        <p>A senha anterior não coincide.</p>
    <?php
        }
    else if ($_SESSION['errcode'] == 0){
        session_unset();
    ?>
        <p>Senha redefinida com sucesso!</p>
    <?php 
        }
    }?>
</body>
</html>