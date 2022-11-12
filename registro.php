<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEM VINDO A EPIC VAPOUR!</title>
    <link rel="stylesheet" href="./style/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/validate.js"></script>
</head>
<body>
    <nav>
        <div class="navbar">
            <ul>
                <li><a href="index.php" >Home</a></li>
                <li><a href="javascript:void(0)">Comunidade</a></li>
                <li><a href="javascript:void(0)">Jogos</a></li>
                <li><a href="javascript:void(0)">Contato</a></li>
                <li style="float:right"><a href="registro.php" class="active">Registro</a></li>
                <li style="float:right"><a href="javascript:void(0)">Entrar</a></li>
            </ul>
        </div>

        <div class="registerform">
            <form action="addregistro.php" method="post" onsubmit="return validateForm();">
                <ul>
                    <li><input type="text" placeholder="examplo@dominio.com" id = "email" name="email"> <input type="text" placeholder="Confirma Email" id="confirmemail" name="confirmemail"></li>
                    <li><input type="text" placeholder="Usuario" id="username" name="username"></li>
                    <li><input type="password" placeholder="Senha" id="password"name="password"> <input type="password" id="confirmpassword"name="confirmpassword "placeholder="Confirma Senha"></li>
                    <li> <button class="btn1" type="submit">Enviar</button></li>
                </ul>
            </form>
        </div>
    </nav>
</body>
</html>