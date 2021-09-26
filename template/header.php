<?php

?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/semantic.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <link rel="stylesheet" href="css/mt.css">
    <link type="image/x-icon" rel="shortcut icon" href="img/prazdnik.ico">
    <script href="js/dropdown.min.js"></script>
    <script href="js/semantic.min.js"></script>
    <script href="js/main.js"></script>
    <script href="js/jquery-3.5.1.min.js"></script>
    <title><?= $title ?></title>
</head>

<header>
    <a class="is-menu" href="#menu"><i class="bars icon "></i></a>
    <div id="menu" class="ui large top fixed menu raised ">
        <div class="ui container">
            <div class="item header">Name
            </div>
            <!-- <a class="item" href="index.php">Главная</a> -->
            <a class="item" href="index.php"> <strong class="white"> Главная</strong> </a>
            <a class="item" href="services.php"> <strong class="white"> Услуги</strong> </a>
            <a class="item" href="contacs.php"><strong class="white">Контакты</strong></a>

            <div class="right menu">
                <div class="ui icon input transparent mt-2">
                    <form name="f1" action="search.php" id="myform" method="GET">
                        <input type="search" name="search_q" placeholder="Поиск" class="bg cont">
                        <a href="" onclick="document.getElementById('myform').submit()"><input value="Найти" type="submit" class="tiny ui button"></a>
                    </form>
                </div>
                <?php if (isset($_SESSION['user_id'])) {
                    echo '<a class="item white " href="profile.php"><strong>Личный кабинет</strong></a> ';
                    echo '<a class="item  white" href="logout.php"><strong>Выйти</strong></a> ';
                    if ($_SESSION['status'] == 228) {
                        echo '<a class="item white" href="admin_addservices.php"><strong>Админ панель</strong></a>';
                    }
                } else {
                    echo '<div class="item"><a class="ui button but inverted" href="login.php">Войти</a></div>';
                    echo '<div class="item"><a class="ui button but inverted" href="signup.php">Регистрация</a></div>';
                }

                ?>

            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/semantic.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.is-menu').on('click', function() {
                $('i', this)
                    .toggleClass('window minimize outline');
                $('#menu.ui.menu')
                    .transition('slide down');
            });
        });
    </script>
</header>






</header>