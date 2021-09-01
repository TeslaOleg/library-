<?php
include "main.php";

$key = array_search($_POST["email"], array_column($_SESSION["users"], 'email'));

if ($key === false) {

    var_dump($key);

    die("eror");

    return "Есть такой!";
}

$user = $_SESSION["users"][$key];


if (password_verify($_POST["password"], $user["password"])) {
    $_SESSION["user"] = $user;
    $_SESSION["user"]["id"] = $key;

    header('Location: ' . "/");
    die();
} else {
    echo "не работает";
    die();
}
