<?php 
require_once ('db.php');

$db = new DB();

$stmt = $db->prepare("SELECT * FROM public.genero");
$stmt->execute();
$gender = $stmt->fetchAll(PDO::FETCH_ASSOC);

$db = null;
?>

<div class="navbarme">
    <a style="float: left;" class="img" href="index.php" style="margin-left: 15px;">
        <img src="./siteimages/logo.png" id="logo-main">
        <img src="./siteimages/logo2.png" id="logo-hover">
    </a>
    <a style="float: left;" href="javascript:void(0)">Comunidade</a>
    <div class="dropdownme" style='float: left;'>
        <button class="dropbtn">Jogos</button>
        <div class="dropdown-contentme">
            <?php foreach ($gender as $g){?>
            <a style="font-size: 10px;" href="./genderstore.php?id=<?php echo $g["id"]?>"><?php echo $g["nomeGenero"]?></a>
            <?php }?>
        </div>
    </div>
    <a style="float: left;" href="javascript:void(0)">Contato</a>
    <?php if (array_key_exists("userdata", $_SESSION)){
        $data = $_SESSION["userdata"];
        $username = $data["nomeUsuario"];
        $saldo = $data["saldo"];
        $id = strval($data["idPublico"]);
        while (strlen($id) < 7){
            $id = "0" . $id;
        };?>
        <div class="dropdownme" style='float: right;'>
            <button class="dropbtn"><?php echo strtoupper($username),", R$: $saldo"?>
            </button>
            <div class="dropdown-contentme">
                <a href=<?php echo "./perfil.php?id=$id"?>>Perfil</a>
                <a style="float: left;" href="biblioteca.php">Biblioteca</a>
                <a href="logout.php">Sair</a>
            </div>
        </div>
    <?php } else{ ?>
        <a style="float: right;" href="registro.php">Registro</a>
        <a style="float: right;" href="login.php">Entrar</a>
    <?php } ?>
</div>
