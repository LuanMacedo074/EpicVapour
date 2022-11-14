<?php


function check_access_method(){
    if(!isset($_SERVER['HTTP_REFERER'])){
    die(http_response_code(403));
    } else{
        return true;
    }
}

check_access_method();