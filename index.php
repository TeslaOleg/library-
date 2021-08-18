<?php
include "core/main.php";

if ($user_id !== false) {
  header('Location: ' . "/list.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/css/main.css" />
  <link rel="stylesheet" href="css/normalize.css" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <title>Library</title>
</head>

<body>
  <main>
    <header id="header" class="header">
      <div class="wrapper">
        <div class="title">
          <h1 class="header_title">Ваша Библиотека</h1>
          <h2 class="header_desc">Более 100000 книг онлайн!</h2>
        </div>
        <div class="author">
          <div class="login">
            <a class="header_link" href="#login" class="log">Авторизоватся</a>
          </div>
          <div class="registr">
            <a class="header_link" href="#register" class="reg">Зарегистрироватся</a>
          </div>
        </div>
      </div>
    </header>
    <!-- form login modal -->
    <form id="login" class="popup" action="/core/log.php" method="post">
      <a href="#header" class="popup__area"></a>
      <div class="popup__body">
        <div class="popup__content">
          <a href="#header" class="popup__close">X</a>
          <h2 class="popup__title">Вход</h2>
          <input type="text" name="email" placeholder="Почта" class="field">
          <input type="text" name="password" placeholder="Пароль" class="field">
          <button type="submit">Войти</button>
        </div>
      </div>
    </form>
    <!-- form registr modal -->
    <form id="register" class="popup" action="/core/reg.php" method="post">
      <a href="#header" class="popup__area">X</a>
      <div class="popup__body">
        <div class="popup__content">
          <a href="#header" class="popup__close">X</a>
          <h2 class="popup__title">Регистрация</h2>
          <input type="text" name="bio" placeholder="Имя" class="field">
          <input type="text" name="email" placeholder="Почта" class="field">
          <input type="text" name="password" placeholder="Пароль" class="field">
          <button type="submit">Регистрация</button>
        </div>
      </div>
    </form>
  </main>

  <pre>
    <?php
    print_r($_SESSION);
    ?>
    </pre>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</body>

</html>