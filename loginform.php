<?php require_once 'check.php';
$email = $_GET['email']?>

<div class="loginform">
    <form action="registernewpassword.php?email=<?php echo $email?>" method="post" onsubmit="return validateRecovery();">
        <ul>
            <li><input type="password" placeholder="Senha antiga" id="oldpassword" name="oldpassword">
            <li><input type="password" placeholder="Senha nova" id="password" name="password"></li>
            <li><input type="password" id="confirmpassword" name="confirmpassword "placeholder="Confirma Senha"></li>
            <li><button class="btn4" type="submit">RESETAR</button></li>
        </ul>      
    </form>
</div>