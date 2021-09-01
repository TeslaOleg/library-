<?php
include "main.php";
// print_r($_POST);
// [bio] => adad 
// [email] => 21jochua21@gmail.com 
// [password] => 23234 
// [done] => Войти 

$key = array_search($_POST["email"], array_column($_SESSION["users"], 'email'));

if ($key !== false) {
    var_dump($key);
    die("eror");
    return "Есть такой!";
}

$_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);

$_SESSION["users"][] = $_POST;
header('Location: ' . "/");
die();
