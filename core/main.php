<?php
session_save_path(__DIR__ . '/session'); // __DIR__ - магическая константа = которые меняют своё значение в зависимости от контекста

session_id("ueodlhaokhnorjgbpm11p15d3rcc0240");

session_start();


// search users in _SESSION
if (
    !array_key_exists("users", $_SESSION) // !array_key_exists Если ключ существует то вернуть False
) {
    $_SESSION["users"] = [];
}

// search user in _SESSION
if (
    !array_key_exists("user", $_SESSION)
) {
    $_SESSION["user"] = [];
}

// search lib = library in _SESSION
if (
    !array_key_exists("libs", $_SESSION)
) {
    $_SESSION["libs"] = [];
}


$user = $_SESSION["user"];
$user_id = $user["id"] ?? false;
