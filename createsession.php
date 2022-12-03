<?php
require './db.php';
require_once './getuserdata.php';


function guard_session($data, $db){
    $token = bin2hex(random_bytes(16));
    $sql = file_get_contents("./sql/guardsession.sql");
    $db->prepare($sql)->execute([$token, $data["email"]]);
    setcookie("email", $data['email'], time() + 10 * 365 * 24 * 60 * 60);
    setcookie("token", $token, time() + 10 * 365 * 24 * 60 * 60);
}


function create_session($db,$formdata){
    $email = $formdata["email"];
    $password = $formdata["password"];
    $data = get_user_data($db, $email);
    if ($data && $data["is_active"] && password_verify($data["salt"].$password, $data["senha"])){
        $_SESSION["sessionid"] = $_COOKIE['PHPSESSID'];
        $_SESSION["userdata"] = $data;
        if (array_key_exists('mantersessao' ,$_POST)){
            guard_session($data, $db);
        }
        die(header("Location: ./index.php"));
    } else{
        $_SESSION["err"] = 1;
        die(header("Location: ./login.php"));
    }
}



session_start();
$db = new DB();
create_session($db, $_POST);
$db = null;












