<?php

require './db.php';

function get_user_data($db){
    $sql = file_get_contents("./getuserdata.sql");

    $email = $_GET["email"];
    $activation_code = $_GET["activation_code"];

    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    $userdata = $stmt->fetch(PDO::FETCH_ASSOC);

    return $userdata;
}

$db = new DB(); 

$data = get_user_data($db);

$db = null;
?>

