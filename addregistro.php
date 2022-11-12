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
        $stamp = $time->format('d-m-y h:i:sa');

        return $stamp;
    }

    function generate_activation_code(){
        return bin2hex(random_bytes(16));
    }

    function send_activation_email($email, $activation_code){
    $activation_link = "http://localhost/projetounidadeiii/EpicVapour/ativarconta.php?email=$email&activation_code=$activation_code";
    var_dump($activation_link); 
    }


    $db = new DB();
    $salt = create_user_salt();
    $id = create_user_id($db);
    $user = get_user_data($_POST, $salt);
    $language = get_browser_language();
    $stamp = generate_expiration_time();
    $code = generate_activation_code();
    $activatecode = password_hash($code, PASSWORD_BCRYPT);

    $sql = file_get_contents("./sql/addregistro.sql");

    $db->prepare($sql)->execute([$user[0], $user[1], $id, $user[2], 0, $salt, $language, $activatecode, $stamp]);

    send_activation_email($user[0], $code);

    $db = null;
    
?>