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
    <title>RESETAR SUA SENHA</title>
    <link rel="stylesheet" href="./style/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <script src="js/validate.js"></script>
    <script src="js/buttons.js"></script>
    <?php require './fonts'?>
</head>
<body class ="resetpasspage">
    <?php require 'navbar.php'?>
    <?php require_once 'check.php';
    $email = $_GET['email'];
    $recovery_code = $_GET['recovery_code'];
    $db = new DB();
    $userdata = get_user_data($db, $email);
    ?>

    <div class="resetpassform">
        <form action="registernewpassword.php?email=<?php echo $email?>&recovery_code=<?php echo $recovery_code?>" method="post" onsubmit="return validateRecovery();">
            <?php if (password_verify($recovery_code, $userdata['recovery_code'])){ ?>
                <ul>
                    <li><img id="loginico" src="siteimages/loginicon.png"> <br</li>
                    <li><label class = "headertext">RESETAR SENHA</label> <br></li>
                    <li><input type="password" class="entrybox" placeholder="Senha antiga" id="oldpassword" name="oldpassword">
                    <li><input type="password" class="entrybox" placeholder="Senha nova" id="password" name="password"></li>
                    <li><input type="password" class="entrybox" id="confirmpassword" name="confirmpassword "placeholder="Confirma Senha"></li>
                    <li><button class="submitbuttons" type="submit">RESETAR</button></li>               
                <?php if (null !== $_SESSION['errcode'] && $_SESSION['errcode'] == 2){?>
                    <li><label class="errcode">A nova senha não pode ser igual a senha anterior.</label></li>
                    <?php session_unset()?>
                <?php } else if(null !== $_SESSION['errcode'] && $_SESSION['errcode'] == 1){?>
                    <li><label class="errcode">A senha anterior não coincide.</label></li>
                    <?php session_unset()?>
                </ul>
            <?php }?>
                <ul><li><label style="color: red;" class="errcode">Houve um erro com sua solicitação</label></li></ul>
            <?php }?>   
        </form>
    </div>
    <?php $db = null;?>
</body>
</html>