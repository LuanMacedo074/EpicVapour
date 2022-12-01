<div class="navbar">
    <a style="float: left;" class="img" href="index.php" style="margin-left: 15px;">
        <img src="./siteimages/logo.png" id="logo-main">
        <img src="./siteimages/logo2.png" id="logo-hover">
    </a>
    <a style="float: left;" href="javascript:void(0)">Comunidade</a>
    <a style="float: left;" href="javascript:void(0)">Jogos</a>
    <a style="float: left;" href="javascript:void(0)">Contato</a>
    <a style="float: left;" href="javascript:void(0)">Biblioteca</a>
    <?php if (array_key_exists("userdata", $_SESSION)){
        $data = $_SESSION["userdata"];
        $username = $data["nomeUsuario"];
        $saldo = $data["saldo"];
        $id = strval($data["idPublico"]);
        while (strlen($id) < 7){
            $id = "0" . $id;
        };?>
        <div class="dropdown">
            <button class="dropbtn"><?php echo strtoupper($username),", R$: $saldo"?>
            </button>
            <div class="dropdown-content">
                <a href=<?php echo "./perfil.php?id=$id"?>>Perfil</a>
                <a href="logout.php">Sair</a>
            </div>
        </div>
    <?php } else{ ?>
        <a style="float: right;" href="registro.php">Registro</a>
        <a style="float: right;" href="login.php">Entrar</a>
    <?php } ?>
