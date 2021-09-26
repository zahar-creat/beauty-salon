<?php
$title = "Админ панель";
session_start();
if ($_SESSION["status"] != 228) {
    header("Location: index.php");
    exit();
}
require "include/connect_db.php";
require "template/header.php";



$sql = mysqli_query($mysql, 'SELECT *
                            FROM request
                            ORDER BY request.id DESC');
while ($row = mysqli_fetch_assoc($sql)) {
    $posts[] = $row;
}

?>

<body class="flex">
    <div class="ui container ">
        <div class="ui tabular menu">
            <a class="item active" href="admin_listrequest.php">
                <h4>Просмотр заявок</h4>
            </a>
            <a class="item" href="admin_listworker.php">
                <h4>Просмотр работников</h4>
            </a>
            <a class="item" href="admin_addworker.php">
                <h4>Добавление работника </h4>
            </a>
            <a class="item" href="admin_addservices.php">
                <h4>Добавление услуг</h4>
            </a>
        </div>
        <div class="ui grid">
            <div class="thirteen wide column">
                <h2>Список заявок</h2>
                <div class="ui grid">
                    <?php foreach ($posts as $row) { ?>
                        <div class="five wide column">
                            <div class="ui cards">


                                <div class="card">
                                    <div class="content">
                                        <div class="header"><?= $row['name'] ?>
                                        </div>
                                        <div class="meta mt-2">Услуга: <?= $row['service'] ?> </div>
                                        <div class="meta">Дата: <?php $date = date_create($row['date']);
                                                                echo date_format($date, 'd.m.Y'); ?> </div>
                                        <div class="meta"> Время записи: <?= $row['time'] ?></div>
                                        <h4 class="ui sub header mt-2">Сообщение:</h4>
                                        <div class="description"><?= $row['message'] ?>
                                        </div>
                                    </div>
                                    <div class="extra content">
                                        <div class="header">Контакты </div>
                                        <div class="description"><?= $row['phone'] ?></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>


        </div>
    </div>

    </div>






    <?php
    require "template/footer.php"; ?>