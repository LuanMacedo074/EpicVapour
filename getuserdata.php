<?php

function get_user_data($db, $email){
    $sql = file_get_contents("./sql/getuserdata.sql");

    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    $userdata = $stmt->fetch(PDO::FETCH_ASSOC);

    
    return $userdata;
}