<?php
$title = "Контакты";
session_start();
require "template/header.php";

?>

<body class="flex">
    <div class="ui container">


        <h2 class="ui text-center header">Косметологическая клиника «Марибель»</h2>

        <div class="ui grid mt-3 ">
            <div class="row">
                <div class="four wide column text-center">


                </div>
                <div class="five wide column ">
                    <p class=""><strong>Адрес: </strong><br> г. Омск, ул. Маяковского, 16, 1 этаж</p>
                </div>
                <div class="one wide column text-center">

                </div>
                <div class="five wide column ">
                    <p class=""><strong>Время работы: </strong><br> Ежедневно 10:00–20:00</p>
                </div>
                <div class="four wide column text-center">

                </div>
            </div>
            <div class="row">
                <div class="four wide column text-center">


                </div>
                <div class="five wide column ">
                    <p class=""><strong>Почта: </strong><br>info@yandex.ru</p>
                </div>
                <div class="one wide column text-center">

                </div>
                <div class="five wide column ">
                    <p class=""><strong>Телефон: </strong><br> 8(950)345-13-54</p>
                </div>
                <div class="four wide column text-center">

                </div>
            </div>
        </div>
        <div class="ui grid mt-4 ">
            <div class="three wide column text-center">
            </div>
            <div class="eleven wide column text-center ml-2">
                <h3 class="">Мы находимся тут</h3>
                <iframe class="mt-2"
                    src="https://yandex.ru/map-widget/v1/?um=constructor%3A01672182e9bdfcb3cf645f8d4e0c4c351db55b632108648290f6b67f3ced7363&amp;source=constructor"
                    width="734" height="434" frameborder="0"></iframe>
            </div>
        </div>
    </div>

    <?php
    require "template/footer.php";
    ?>