<?php
require_once('db.php');

$path = parse_ini_file("./conf/serverconf.ini")['gamesdirectory'];
function generate_id($database){
    $stmt = $database->prepare("SELECT COUNT(*) FROM public.jogo");
    $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);

    return $rows['count'] +1;
}

function get_files_path($id, $path){
        if (is_dir($path . $id)){
            return $path . $id;
        } else{
            mkdir ($path . $id, 077, true);
            return $path . $id;}
}


function write_files($FILES, $path){
    $c = 0;
    if ($FILES){
        foreach($FILES as $file){
            $type = explode("/",$file['type'])[1];
            $c += 1;
            if ($c == 1){
                $imagename = "gameicon" . ".$type";}
            else{
                $imagename = "carrousel" . $c-1 . ".$type";
            }
            $imagetemp = $file['tmp_name'];
            if(is_uploaded_file($imagetemp)) {
                    $file_path =  $path . "/$imagename";
                    if(move_uploaded_file($imagetemp, $file_path)) {
                    }
                }
        }  
    };
}

function registerlanguages($db, $languages, $id){
    $sql = 'INSERT INTO public."idiomasJogos"("idJogo", abreviacao)
    values (?, ?)';
    foreach ($languages as $lang){
        $db->prepare($sql)->execute([$id, $lang]);}
}

function registergender($db, $genders, $id){
    $sql = 'INSERT INTO public."generosJogo"("idJogo", "idGenero")
    values (?, ?)';
    foreach ($genders as $gender){
        $db->prepare($sql)->execute([$id, $gender]);}
}



$db = new DB();

$sql = file_get_contents('./sql/addgame.sql');
$id = generate_id($db);
$preco = number_format($_POST['preco'], 2);
$preco = floatval($preco);
$db->prepare($sql)->execute([$id, $_POST['nome'],$_POST['faixaetaria'], 
$_POST['desc'], gmdate("Y-M-d"), $preco, get_files_path($id, $path) ,$_POST["link"]]);

write_files($_FILES, get_files_path($id, $path));

registerlanguages($db, $_POST['idiomas'], $id);

registergender($db, $_POST['generos'], $id);


$db = null;