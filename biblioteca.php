<?php session_start();
require_once 'db.php';

$db = new DB();

$sql = 'SELECT * from public."jogosUsuario"
INNER JOIN jogo * 
on "jogosUsuario"."idJogo" = jogo.id
WHERE email = ?';

$stmt = $db->prepare($sql);
$stmt->execute([$_SESSION['userdata']['email']]);
$usergames = $stmt->fetchAll(PDO::FETCH_ASSOC);
 

$db = null;
?>
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca :: <?php echo $_SESSION['userdata']['nomeUsuario']?></title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <?php require './fonts'?>
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body class="bibliopage">
    <div class="showbiblio">
        <?php require 'navbar.php'?>
    </div>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <div class="w3-sidebar w3-gray w3-bar-block" style="width:10%">
            <?php foreach($usergames as $game){ ?>
            <a class="item" href="biblioteca.php?id=<?php echo $game['id']?>"><?php echo $game['nome']?></a> <br>
            <?php }?>
        </div>
    <?php if (! isset($_GET['id'])){?>
        <div style="margin-left:10%">
        </div>
    <?php } else { 
        $db = new DB();

        $sql = 'SELECT * from public.jogo
        WHERE id = ?';
        
        $stmt = $db->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $game = $stmt->fetch(PDO::FETCH_ASSOC);?>
        <div style="margin-left:10%">
            <p class="gamename"><?php echo $game['nome']?></p>
            <img class="gamelogo" src="<?php echo $game['path'] . "/gameicon.png"?>"> <br>
            <button class="playbtn" onclick="location.href='<?php echo $game['link']?>'"> JOGAR</button>
        </div>
<?php }?>
</body>
