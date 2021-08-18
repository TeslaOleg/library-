<?php
include "main.php";

// print_r($_POST);
$user = $_SESSION["user"];
$user_id = $user["id"];

$key = array_search($_POST["name"], array_column($_SESSION["libs"]["lib_" . $user_id] ?? [], 'name'));

if ($key !== false) {

    var_dump($key);

    die("Есть такая книга!");
}

$_SESSION["libs"]["lib_" . $user_id][] = [
    'name' => $_POST['name'],
    'year' => $_POST['year'],
];


header('Location: ' . "/list.php");
die();
