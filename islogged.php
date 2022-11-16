<?php

function check_is_logged(){
    if(isset($_SESSION['sessionid'])){
    return true;
    } else{
        return false;
    }
}