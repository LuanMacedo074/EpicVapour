<?php

require './db.php';
require_once './getuserdata.php';

function checksession($db){
    if (array_key_exists('email', $_COOKIE)){
        $data = get_user_data($db, $_COOKIE['email']);
        if ( $data['session_token'] = $_COOKIE['token']){
            $_SESSION["userdata"] = $data;
            $token = bin2hex(random_bytes(16));
            $sql = file_get_contents("./sql/guardsession.sql");
            $db->prepare($sql)->execute([$token, $data["email"]]);
            setcookie("email", $data['email'], time() + 10 * 365 * 24 * 60 * 60);
            setcookie("token", $token, time() + 10 * 365 * 24 * 60 * 60);
    }  }  
}

$db = new DB();
checksession($db);

$db = null;


