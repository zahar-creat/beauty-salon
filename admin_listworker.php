<?php
session_start();
$title = "Админ панель";
if ($_SESSION["status"] != 228) {
    header("Location: index.php");
    exit();
}
require "include/connect_db.php";
require "template/header.php";
$sql = mysqli_query($mysql, 'SELECT *
                            FROM workers
                            ORDER BY workers.id DESC');
while ($row = mysqli_fetch_assoc($sql)) {
    $posts[] = $row;
}
?>

<body class="flex">
    <div class="ui container">
        <div class="ui tabular menu">
            <a class="item" href="admin_listrequest.php">
                <h4>Просмотр заявок</h4>
            </a>
            <a class="item active" href="admin_listworker.php">
                <h4>Просмотр работников</h4>
            </a>
            <a class="item" href="admin_addworker.php">
                <h4>Добавление работника </h4>
            </a>
            <a class="item " href="admin_addservices.php">
                <h4>Добавление услуг</h4>
            </a>
        </div>
        <h2 class="mb-4">Список работников</h2>
        <div class="ui grid">

            <div class="thirteen wide column">
                <div class="ui items">
                    <?php foreach ($posts as $row) { ?>

                    <div class="item mb-5">
                        <a class="ui tiny image">
                            <img src="img/<?= $row['file'] ?>">
                        </a>
                        <div class="content">
                            <a class="header"><?= $row['firstname'] ?> <?= $row['secondname'] ?></a>
                            <a class="ml-2"><?= $row['specification'] ?></a><a class="ml-4"><?= $row['tel'] ?></a>
                            <div class="description">

                                <p><?= $row['description'] ?></p>
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
    require "template/footer.php";

    ?>