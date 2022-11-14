<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEM VINDO A EPIC VAPOUR!</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <nav>
        <div class="navbar">
            <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="javascript:void(0)">Comunidade</a></li>
                <li><a href="javascript:void(0)">Jogos</a></li>
                <li><a href="javascript:void(0)">Contato</a></li>
                <?php 
                if (!$_SESSION){ echo <<<TXT
                <li style="float:right"><a href="registro.php">Registro</a></li>
                <li style="float:right"><a href="login.php">Entrar</a></li>
                TXT;
                }
                else{
                $data = $_SESSION["userdata"];
                $username = $data["nomeUsuario"];
                $saldo = $data["saldo"];
                ?>
                <li style="float:right"><a href="javascript:void(0)"><?php echo strtoupper($username)?></a></li>
                <li style="float:right"><a href="javascript:void(0)"><?php echo "R$: $saldo" ?></a></li>    
                <?php
                }?>
            </ul>
        <div class="navbar">
    </nav>
    <a href="logout.php">LOGOUT</a>
</body>
</html>