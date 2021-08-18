<?php include "core/main.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/libraty.css" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <title>Твоя Библиотека</title>
</head>

<body>
    <header class="header">
        <div class="wrapper">
            <div class="header_container">
                <div class="header_nav">
                    <a class="link" href="/">Ваша Библиотека</a>
                </div>
                <div class="header__log">
                    <a href="core/logout.php" class="log_out">Выйти</a>
                </div>
            </div>
        </div>
    </header>
    <!-- 
        название, 
        год издания. 
        на форме списка необходимо реализовать сортировку, 
        поиск 
    -->
    <!-- form login modal -->
    <main>
        <div class="wrapper">
            <form id="books" class="popup" action="/core/add.php" method="post">
                <a href="#header" class="popup__area"></a>
                <div class="popup__body">
                    <div class="popup__content">
                        <a href="#header" class="popup__close">X</a>
                        <h2 class="popup__title">Добавить книгу</h2>
                        <input type="text" name="name" placeholder="Название" class="field" />
                        <input type="text" name="year" placeholder="Год издания" class="field" />
                        <button type="submit">Добавить</button>
                    </div>
                </div>
            </form>
            <!-- table with info-->
            <div class="table__header">
                <h3 class="my_books">Моя библиотека</h2>
                    <div class="registr">
                        <a class="header_link" href="#books" class="reg">Добавить книгу</a>
                    </div>
            </div>
            <!-- drop list sort -->
            <div class="sort_container">
                <form class="sort__books" action="list.php" method="get">
                    <select class="col_value" name="col">
                        <option value="id" <?php echo ($_GET['col'] != 'id') ?: 'selected' ?>>Номер</option>
                        <option value="name" <?php echo ($_GET['col'] != 'name') ?: 'selected' ?>>Название</option>
                        <option value="year" <?php echo ($_GET['col'] != 'year') ?: 'selected' ?>>Год издания</option>
                    </select>
                    <select class="direct_value" name="direct">
                        <option value="asc" <?php echo ($_GET['direct'] != 'asc') ?: 'selected' ?>>По возрастанию</option>
                        <option value="desc" <?php echo ($_GET['direct'] != 'desc') ?: 'selected' ?>>По убыванию</option>
                    </select>
                    <input class="btn_search" placeholder="Поиск" type="text" name="s" value="<?php $_GET['s'] ?? '' ?>">
                    <button class="btn__sort" type="submit">Поиск - Сортировка</button>
                </form>
                <form class="form_clean" action="list.php" method="get">
                    <button class="btn_clean" type="submit">Очистить</button>
                </form>
            </div>
            <table class="table">
                <tr>
                    <th>Номер</th>
                    <th>Название</th>
                    <th>Год издания</th>
                </tr>
                <?php
                $lib = $_SESSION['libs']['lib_' . $user_id] ?? [];

                foreach ($lib as $key1 => &$value1) {
                    $value1['id'] = $key1;
                }
                // сортировка SORT_ASC = по порядку  -  SORT_DESC = наоборот;

                // array_filter

                // search on page
                function filter($item)
                {
                    $name = $item['name'];
                    $pos = strpos($name, $_GET['s']);
                    return ($pos !== false);
                }
                if (!empty($_GET['s'])) {
                    $lib = array_filter($lib, 'filter');
                }

                $key = array_search($_POST["email"], array_column($_SESSION["users"], 'email'));

                // Функция сравнения
                function cmp($a, $b)
                {
                    $col = $_GET["col"] ?? 'id';
                    $sod = strcasecmp($a[$col], $b[$col]);
                    if ($sod == 0) {
                        return 0;
                    }

                    if ($_GET['direct'] == "desc") {
                        return strcasecmp($b[$col], $a[$col]);
                    }
                    return $sod;
                }

                // Сортируем и выводим получившийся массив
                uasort($lib, 'cmp');

                //array_multisort($years, $direct, $lib , $keys); // slogno multisort

                //$lib = array_combine($keys, $lib); // ychi
                foreach ($lib as $key =>
                    $value) { ?>
                    <tr class="res_book">
                        <td><?php echo $key;  ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['year']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <pre>
        <?php
        print_r($_SESSION["libs"]);
        ?>
    </pre>
        </div>
    </main>
</body>

</html>