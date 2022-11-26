<?php 

require_once './db.php';
session_start();
function get_user_data_by_id($db, $id){
    $sql = file_get_contents("./sql/getuserdatabyid.sql");

    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $userdata = $stmt->fetch(PDO::FETCH_ASSOC);

    
    return $userdata;
}

$db = new DB();


$userdata = get_user_data_by_id($db, intval($_GET['id']));
$avatar = $userdata['avatar_path'];
$username = $userdata["nomeUsuario"];
if (!$userdata['descricao']){
    $descricao = "Nada informado.";} else{
    $descricao = $userdata["descricao"];
}; 
$id = $_GET['id'];


if (array_key_exists('userdata', $_SESSION)){
    $session = $_SESSION['userdata'];
};

$db = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMUNIDADE :: <?PHP echo $username?></title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <?php require './fonts'?>
    <link rel="stylesheet" href="./style/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body class="profilepage">
    <?php require 'navbar.php'?>
    <div class="showprofile">
        <img src="<?php echo $avatar?>" class="avatar"> 
        <p class="name"><?php echo $username?></p>
        <p class="descricao"><?php echo $descricao?></p>
        <?php if (isset($session) && $session['idPublico'] == $_GET['id']){?>
            <button class="editarperfil" onclick='location.href="editarperfil.php?id=<?php echo $id?>"'>Editar perfil</button>
        <?php }?>
    </div>
</body>
</html>