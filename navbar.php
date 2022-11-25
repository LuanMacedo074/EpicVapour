<div class="navbar">
        <nav>
            <ul>
                <li><a class="img" href="index.php" style="margin-left: 15px;">
                <img src="./siteimages/logo.png" id="logo-main">
                <img src="./siteimages/logo2.png" id="logo-hover">
                </a></li>
                <li><a href="javascript:void(0)">Comunidade</a></li>
                <li><a href="javascript:void(0)">Jogos</a></li>
                <li><a href="javascript:void(0)">Contato</a></li>
                <li><a href="javascript:void(0)">Biblioteca</a></li>
            </ul>
        </nav>
</div>
<?php
if (! array_key_exists("userdata", $_SESSION)){ echo <<<TXT
<div class="username">
<ul>
<li style="float:right; margin-right: 15px"><a href="registro.php">Registro</a></li>
<li style="float:right"><a href="login.php">Entrar</a></li>
</ul>
</div>
TXT;}else{
$data = $_SESSION["userdata"];
$username = $data["nomeUsuario"];
$saldo = $data["saldo"];
$id = strval($data["idPublico"]);
while (strlen($id) < 7){
    $id = "0" . $id;
};?>
<div class="username">
    <ul>
    <li style="float:right"><a href="javascript:void(0)"><?php echo strtoupper($username),", R$: $saldo"?></a></li>
    <div class="usermenu">
        <ul>
            <li><a href=<?php echo "./perfil.php?id=$id"?>>Perfil</a></li>
            <li><a href="javascript:void(0)">Adicionar Saldo</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </div>
    </ul>
</div>
<?php 
}?>

