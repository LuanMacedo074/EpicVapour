<?php
require_once 'db.php';

$db = new DB();
$stmt = $db->prepare("SELECT * FROM public.idioma");
$stmt->execute();
$languages = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->prepare("SELECT * FROM public.genero");
$stmt->execute();
$gender = $stmt->fetchAll(PDO::FETCH_ASSOC);

$db = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMUNIDADE :: <?PHP echo $profileusername?></title>
    <link rel="icon" type="image/x-icon" href="./favicon.ico">
    <?php require './fonts'?>
    <link rel="stylesheet" href="./style/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
</head>
<body class="addgame">
    <div>
        <form enctype="multipart/form-data" action="registergame.php" method="post">
            NOME <br>
            <textarea name="nome" id="nome" ></textarea> <br>
            descrição <br>
            <textarea name="desc" id="name" rows="6" maxlength="255"></textarea> <br>
            faixaetaria <br>
        <select name="faixaetaria" id="faixaetaria">
            <option value="">ESCOLHA UMA OPÇÃO</option>
            <option value="Livre">L</option>
            <option value="PG10">10</option>
            <option value="PG12">12</option>
            <option value="PG14">14</option>
            <option value="PG16">16</option>
            <option value="PG18">18</option>
        </select> <br>
        PRECO <br>
        <input type="number" name="preco" step="0.01" id="preco"/> <br>
        link <br>
        <input type="text" id="link" name="link"> <br>
        icone <br>
        <input name="icon" id="icon" type="file" accept="image/*"> <br>
        IMAGENS PRA CARROSEL <br>
        <input name="carrousel1" id="carrousel1" type="file" accept="image/*">
        <input name="carrousel2" id="carrousel2" type="file" accept="image/*">
        <input name="carrousel3" id="carrousel3" type="file" accept="image/*"> <br>
        LINGUAS <br>
        <select multiple name="idiomas[]" id="idiomas">
            <?php foreach ($languages as $row){?>
                <option value="<?php echo $row["abreviacao"]?>"><?php echo ($row["abreviacao"] . ", $row[idioma]");?></option>    
            <?php }?>
        </select> <br>
        <select multiple name="generos[]" id="generos">
            <?php foreach ($gender as $row){?>
                <option value="<?php echo $row["id"]?>"><?php echo ($row["nomeGenero"]);?></option>    
            <?php }?>
        </select> <br>
        <button type="submit">REGISTRAR</button>
        </form>
    </div>
</body>
</html>