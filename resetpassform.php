<?php require_once 'check.php';
$email = $_GET['email'];
$recovery_code = $_GET['recovery_code'];?>

<div class="resetpassform">
    <form action="registernewpassword.php?email=<?php echo $email?>&recovery_code=<?php echo $recovery_code?>" method="post" onsubmit="return validateRecovery();">
        <ul>
            <li><img id="loginico" src="siteimages/loginicon.png"> <br</li>
            <li><label class = "headertext">RESETAR SENHA</label> <br></li>
            <li><input type="password" class="entrybox" placeholder="Senha antiga" id="oldpassword" name="oldpassword">
            <li><input type="password" class="entrybox" placeholder="Senha nova" id="password" name="password"></li>
            <li><input type="password" class="entrybox" id="confirmpassword" name="confirmpassword "placeholder="Confirma Senha"></li>
            <li><button class="submitbuttons" type="submit">RESETAR</button></li>
        </ul>      
    </form>
</div>