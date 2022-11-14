<?php

require_once './db.php';
require_once './getuserdata.php';
require_once './check.php';

function generate_recovery_email($email, $db){
    $recovery_code = bin2hex(random_bytes(16));
    while (strlen($recovery_code) < 7){
        $recovery_code = '0' . $recovery_code;
    }
    $encrypted_recovery_code = password_hash($recovery_code, PASSWORD_BCRYPT);
    $data = get_user_data($db, $email);
    if ($data){
        $sql = file_get_contents("./sql/setrecoverycode.sql");
        $db->prepare($sql)->execute([$encrypted_recovery_code, $data['email']]);
        $recovery_link = "http://localhost/projetounidadeiii/EpicVapour/resetarsenha.php?email=$email&recovery_code=$recovery_code";
        return $recovery_link;}
}

$db = new DB();

$useremail = $_POST['email'];
$link = generate_recovery_email($useremail, $db);
echo "<a href='$link'>RESETAR</a>";

$db = null;