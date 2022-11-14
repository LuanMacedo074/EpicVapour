<?php
require './db.php';
require_once './check.php';
require_once './getuserdata.php';

function create_session($data, $password){
    if ($data && $data["is_active"] && password_verify($data["salt"].$password, $data["senha"])){
        $_SESSION["newsession"] = 1;
        $_SESSION["userdata"] = $data;
        die(header("Location: ./index.php"));
    } else{
        $_SESSION["err"] = 1;
        die(header("Location: ./login.php"));
    }
}

session_start();

$db = new DB();
$email = $_POST["email"];
$password = $_POST["password"];
$data = get_user_data($db, $email);

create_session($data, $password);

$db = null;












