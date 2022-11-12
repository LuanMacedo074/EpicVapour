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

    function generate_expiration_time(){
        $tempo = gmdate("y-m-d h:i:sa");
        $time = new DateTime($tempo);
        $time->modify('+5 minutes');
        $stamp = $time->format('y-m-d h:i:sa');

        return $stamp;
    }

    function generate_activation_code(){
        $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz$&+,:;=?@#|<>.^*()%!-';
        $code = substr(str_shuffle($str), 0, 21);
        $enctriptedcode = password_hash($code, PASSWORD_BCRYPT);

        return $enctriptedcode;
    }

    $db = new DB();
    $salt = create_user_salt();
    $id = create_user_id($db);
    $user = get_user_data($_POST, $salt);
    $language = get_browser_language();
    $stamp = generate_expiration_time();
    $activatecode = generate_activation_code();


    $sql = file_get_contents("./addregistro.sql");

    $db->prepare($sql)->execute([$user[0], $user[1], $id, $user[2], 0, $salt, $language, $activatecode, $stamp]);


    $db = null;
    
?>