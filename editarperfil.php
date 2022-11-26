<?php 

require_once './db.php';

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

$db = null;
session_start();?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PERFIL :: <?PHP echo $username?></title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <?php require './fonts'?>
    <link rel="stylesheet" href="./style/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body class="editprofilepage">
    <?php require 'navbar.php'?>
    <div class="editprofile">
        <form enctype="multipart/form-data" action="updateprofile.php?id=<?php echo $id?>" class="editarperfilform" method="post">
        <label class="custom-file-upload"> 
            <img src="<?php echo $avatar?>" class="avatar">
            <img src="./siteimages/lupe.png" class="lupe">
            <input name="avatar" type="file" class="avatarinput" accept="image/*">
        </label>
        <textarea name="username" class="usernameinput" maxlength="10" placeholder="<?php echo $username?>"></textarea>
        <textarea name="description" class="descriptioninput" rows="6" maxlength="200" placeholder="<?php echo $descricao?>"></textarea>
        <button type="submit" class="sendbtn">CONFIRMAR</button>
        </form>
    </div>
</body>
</html>