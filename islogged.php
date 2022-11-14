<?php

function check_is_logged(){
    if(isset($_SESSION['newsession'])){
    return true;
    } else{
        return false;
    }
}