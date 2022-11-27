<?php
require './db.php';

session_start();

$db = new DB();
$id = $_GET['id'];
$active_session = $_SESSION['userdata'];

$serverdata = parse_ini_file("./conf/serverconf.ini");

if ($id == $active_session['idPublico']){
    if ($_FILES['avatar']){
        
        $path = $serverdata['imagespath'];

        $imagename = $_FILES['avatar']['name'];

        $imagetype = $_FILES['avatar']['type'];

        $imageerror = $_FILES['avatar']['error'];

        $imagetemp = $_FILES['avatar']['tmp_name'];
    
        $imagePath = $path;
    
        if(is_uploaded_file($imagetemp)) {
            if (is_dir($imagePath . $_GET['id'])){
                $file_path =  $imagePath . $_GET['id'] . "/$imagename";
                if(move_uploaded_file($imagetemp, $file_path)) {
                    echo "Worked";
                    $sql = file_get_contents("./sql/updateavatar.sql");
                    $db->prepare($sql)->execute([$file_path , $active_session['email']]);
                    $_SESSION['userdata']['avatar_path'] = $file_path;
                }
            } else{
                mkdir($imagePath . $_GET['id'], 0777,true);}
        }
    };

    if ($_POST['username']){
        $sql = file_get_contents("./sql/updatename.sql");
        $db->prepare($sql)->execute([$_POST['username'], $active_session['email']]);;
        $_SESSION['userdata']['nomeUsuario'] = $_POST['username'];
    };

    if ($_POST['description']){
        $sql = file_get_contents("./sql/updatedescription.sql");
        $db->prepare($sql)->execute([$_POST['description'], $active_session['email']]);
        $_SESSION['userdata']['descricao'] = $_POST['description'];
    };
};



$db = null;



die(header("Location: ./perfil.php?id=$id"));