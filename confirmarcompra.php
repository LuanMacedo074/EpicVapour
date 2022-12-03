<?php

session_start();
require_once 'db.php';


$db = new DB();
$sql = "SELECT * FROM public.jogo WHERE id=$_GET[id]";

$stmt = $db->prepare($sql);
$stmt->execute();
$game = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = file_get_contents('./sql/buygame.sql');

if (($_SESSION['userdata']['saldo']) >= $game['preco']){
    $db->prepare($sql)->execute([$_SESSION['userdata']['email'], $_GET['id'], $game['preco'], 
    gmdate("Y-M-d"), null, null]);
    $novosaldo = $_SESSION['userdata']['saldo'] - $game['preco'];
    $email = $_SESSION['userdata']['email'];
    $_SESSION['userdata']['saldo'] = $novosaldo;
    $db->prepare("UPDATE public.usuario set saldo=? where email=?")->execute([strval($novosaldo), $email]);
    $_SESSION['confirmcompra'] = 1;
}  else{
    $_SESSION['confirmcompra'] = 0;
}

die(header("Location: application.php?id=$_GET[id]"));


$db = null;