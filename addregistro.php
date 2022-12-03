<?php

    require './db.php';
    require "./getuserdata.php";
    session_start();
    

    function create_user_id($database){
        $stmt = $database->prepare("SELECT COUNT(*) FROM public.usuario");
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        return $rows['count'] +1;
    }

    function create_user_salt(){
        $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz$&+,:;=?@#|<>.^*()%!-';

        return substr(str_shuffle($str), 0, 21);
    }

    function create_user_data($data, $salt){
        $email = $data["email"];
        $username = strtolower($data["username"]);
        $password = password_hash($salt.$data["password"], PASSWORD_BCRYPT);
        return [$email, $username, $password];
    }

    function get_browser_language(){
        return explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE'])[0];
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
    $activation_link = "http://" . $_SERVER['SERVER_NAME'] ."/EpicVapour/ativarconta.php?email=$email&activation_code=$activation_code";
    echo "<a href='$activation_link'>Ativar</a>"; 
    }

    $db = new DB();
    if (get_user_data($db, $_POST['email'])){
        $_SESSION["err"] = 1;
        die(header("Location: ./registro.php"));
    } else {
        $salt = create_user_salt();
        $id = create_user_id($db);
        $user = create_user_data($_POST, $salt);
        $language = get_browser_language();
        $stamp = generate_expiration_time();
        $code = generate_activation_code();
        $activatecode = password_hash($code, PASSWORD_BCRYPT);

        $sql = file_get_contents("./sql/addregistro.sql");

        $db->prepare($sql)->execute([$user[0], $user[1], $id, $user[2], 0, $salt, $language, $activatecode, $stamp]);

        send_activation_email($user[0], $code);}

    $db = null;