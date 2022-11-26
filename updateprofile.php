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
            if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
                $sql = file_get_contents("./sql/updateavatar.sql");
                $db->prepare($sql)->execute([$path . "$imagename" , $active_session['email']]);
            }
        }
    };

    if ($_POST['username']){
        $sql = file_get_contents("./sql/updatename.sql");
        $db->prepare($sql)->execute([$_POST['username'], $active_session['email']]);;
    };

    if ($_POST['description']){
        $sql = file_get_contents("./sql/updatedescription.sql");
        $db->prepare($sql)->execute([$_POST['description'], $active_session['email']]);
    };
};

$db = null;



die(header("Location: ./perfil.php?id=$id"));