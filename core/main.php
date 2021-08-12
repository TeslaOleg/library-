<?php 
    session_start();
    if(
        !array_key_exists("users", $_SESSION ) 
     ) {
        $_SESSION["users"] = [];
    }

    if(
        !array_key_exists("user", $_SESSION ) 
     ) {
        $_SESSION["user"] = [];
    }