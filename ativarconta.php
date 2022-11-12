<?php

require './db.php';

function get_user_data($db){
    $sql = file_get_contents("./sql/getuserdata.sql");

    $email = $_GET["email"];
    $activation_code = $_GET["activation_code"];

    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    $userdata = $stmt->fetch(PDO::FETCH_ASSOC);

    return $userdata;
}

function check_expiration_time($expiration_time){
    $tempo = DateTime::createFromFormat("Y-m-d H:i:s", gmdate("Y-m-d H:i:s"));
    $expiration = DateTime::createFromFormat("Y-m-d H:i:s", $expiration_time);

    if ($expiration > $tempo){
        return true;
    } else{
        return false;
    }
}



$db = new DB(); 

$data = get_user_data($db);

if ($data && ! $data["is_active"]){
        if (! check_expiration_time($data["tempo_codigo"])){
           $sql = file_get_contents("./sql/deleteuser.sql");
           $db->prepare($sql)->execute([$data["email"]]);         
        } else{
            if (password_verify($_GET["activation_code"], $data["codigo_ativacao"])){
                $sql = file_get_contents("./sql/verifyaccount.sql");
                $db->prepare($sql)->execute([$data["email"]]);
            }
        }
} else{
    echo "usuario não encontrado";
}

$db = null;

?>

