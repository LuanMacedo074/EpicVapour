<?php

    require './db.php';



    function create_user_id($database){
        $rows = $database->exec("SELECT COUNT(*) FROM public.usuario");

        return $rows + 1;
    }

    function create_user_salt(){
        $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz$&+,:;=?@#|<>.^*()%!-';

        return substr(str_shuffle($str), 0, 21);
    }

    function get_user_data($data, $salt){
        $email = $data["email"];
        $username = strtolower($data["username"]);
        $password = password_hash($salt.$data["password"], PASSWORD_BCRYPT);
        return [$email, $username, $password];
    }

    function get_browser_language(){
        return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5);
    }

    $db = new DB();
    $salt = create_user_salt();
    $id = create_user_id($db);
    $user = get_user_data($_POST, $salt);
    $language = get_browser_language();


    $sql = file_get_contents("./addregistro.sql");

    $db->prepare($sql)->execute([$user[0], $user[1], $id, $user[2], 0, $salt, $language])

    
?>