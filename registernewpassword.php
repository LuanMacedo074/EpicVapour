<?php

require_once './db.php';
require_once './getuserdata.php';
require_once './check.php';

session_start();


$db = new DB();

$email = $_GET['email'];
$recovery_code = $_GET['recovery_code'];
$oldpassword = $_POST['oldpassword'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword_'];

$data = get_user_data($db, $email);
$salt = $data['salt'];

if ($oldpassword == $password){
    $_SESSION['errcode'] = 1;
}if(! password_verify($data["salt"].$oldpassword, $data["senha"])){
    $_SESSION['errcode'] = 2;   
}if (password_verify($data["salt"].$oldpassword, $data["senha"]) && $oldpassword != $password){
    $newpass = password_hash($salt.$password, PASSWORD_BCRYPT);
    $sql = file_get_contents("./sql/registernewpassword.sql");
    $db->prepare($sql)->execute([$newpass,null, $data['email']]);
}
var_dump($_SESSION);

$db = null;
die(header("Location: ./resetarsenha.php?email=$email&recovery_code=$recovery_code"));