<?php
$title = "Админ панель";

session_start();
if ($_SESSION["status"] != 228) {
    header("Location: index.php");
    exit();
}
require "include/connect_db.php";
require "template/header.php";

?>

<body class="flex">

    <div class="ui container">
        <div class="ui tabular menu">
            <a class="item" href="admin_listrequest.php">
                <h4>Просмотр заявок</h4>
            </a>
            <a class="item" href="admin_listworker.php">
                <h4>Просмотр работников</h4>
            </a>
            <a class="item" href="admin_addworker.php">
                <h4>Добавление работника </h4>
            </a>
            <a class="item active" href="admin_addservices.php">
                <h4>Добавление услуг</h4>
            </a>
        </div>
        <div class="ui grid mt-5">
            <div class="three wide column">
            </div>
            <div class="six wide column forms">
                <h2>Добавить услугу</h2>
                <form class="ui form" action="include/addservice.php" method="POST" enctype="multipart/form-data">
                    <div class="field">
                        <label>Название</label>
                        <input class="form_input" type="text" name="name" placeholder="">
                    </div>
                    <div class="field">
                        <label>Описание</label>
                        <textarea rows="3" cols="30" name="description" class="form_input" type="text"></textarea>

                    </div>
                    <div class="field">
                        <label>Фото</label>
                        <input type="file" name="file" id="file" placeholder="">
                    </div>
                    <button class="ui positive button" type="submit" name="submit">
                        Добавить
                    </button>

                </form>
            </div>



        </div>
    </div>
    </div>
    </div>





    <?php
    require "template/footer.php"; ?>