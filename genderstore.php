<?php 
    session_start();
    require_once 'navbar.php';
    require_once 'db.php';

    $db = new DB();

    $stmt = $db->prepare("SELECT * FROM public.genero WHERE id=$_GET[id]");
    $stmt->execute();
    $gender = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>  

<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOJA :: <?php echo $gender['nomeGenero']?></title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <?php require './fonts'?>
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body class='genderpage'>
    <div class="genderdiv">
        <p><?php echo $gender['nomeGenero']?></p>
        <?php 
        $stmt = $db->prepare('SELECT * FROM public."generosJogo" WHERE "idGenero" = ?');
        $stmt->execute([$_GET['id']]);
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($games as $game){
            $stmt = $db->prepare('SELECT * FROM public.jogo WHERE "id" = ?');
            $stmt->execute([$game["idJogo"]]);
            $actualgame = $stmt->fetchAll(PDO::FETCH_ASSOC);  
            ?>
            <a class="innera" href="./application.php?id=<?php echo $actualgame[0]['id']?>">
            <img class="innerimg" src="<?php echo $actualgame[0]['path'] . "/gameicon.png"?>"><?php echo $actualgame[0]['nome']?>
            </a> <br>
        <?php }?>
    </div>
</body>