<?php 
    include "main.php";

    $key = array_search( $_POST["email"], array_column ( $_SESSION["users"], 'email' ) );

    if($key === false ) {

        var_dump($key);
        
        die("hui");
        
        return "Есть такой!";
    } 

    $user = $_SESSION["users"][$key];

    // print_r([
    //     $user["password"] , password_hash($_POST["password"] , PASSWORD_BCRYPT)
    // ]);
    // die();

    if( password_verify($_POST["password"], $user["password"]) ) {
        $_SESSION["user"] = $user;

        header('Location: '. "/");
        die();
    } else {
       echo "все плохо" ;
       die();
    }
