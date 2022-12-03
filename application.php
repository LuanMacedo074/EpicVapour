<?php 
session_start();
require_once './db.php';

$db =  new DB();
$sql = "SELECT * FROM public.jogo Where id = $_GET[id]";
$stmt  = $db->prepare($sql);
$stmt->execute();
$game = $stmt->fetch(PDO::FETCH_ASSOC);


$db = null;
?>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOJA :: <?php echo $game['nome']?></title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <?php require './fonts'?>
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body class='gamepage'>
    <?php require 'navbar.php'?>
    <div class="showgame">
    <p><?php echo $game['nome']?></p>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $game['path'] . "/carrousel1.png"?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $game['path'] . "/carrousel2.png"?>" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $game['path'] . "/carrousel3.png"?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <img src="<?php echo $game['path'] . "/gameicon.png"?>" class="gameicon">
        <p class="desc"><?php echo $game['descricao']?></p>
        <p class="preco">R$: <?php echo "$game[preco], $game[faixaEtaria]"?></p>
        <button class="buybtn"onclick='location.href="confirmarcompra.php?id=<?php echo $_GET["id"]?>"'>COMPRAR AGORA</button>
        </div>
        <?php if (isset($_SESSION['confirmcompra']) && $_SESSION['confirmcompra'] == 1){?>
            <p style="color: green;">Jogo adicionado a conta com sucesso.</p>
        <?php unset($_SESSION['confirmcompra']);} else if (isset($_SESSION['confirmcompra']) && $_SESSION['confirmcompra'] == 0){?>
            <p style="color: red;">Houve um erro com sua compra</p>
        <?php unset($_SESSION['confirmcompra']);}?>
    </div>
</body>