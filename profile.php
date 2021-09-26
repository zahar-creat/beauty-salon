<?php
$title = "Личный кабинет";
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
require "include/connect_db.php";
require "template/header.php";
$sql = "SELECT * FROM request WHERE user_id=?";
$stmt = mysqli_stmt_init($mysql);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);


if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $delete = mysqli_query($mysql, "DELETE FROM request WHERE id = {$_GET['del_id']}");
    if ($delete) {
        echo "<p>Товар удален.</p>";
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($mysql) . '</p>';
    }
}




?>

<body class="flex">

    <div class="ui raised very padded text container segment">
        <h2>Личный кабинет</h2>
        <div class="pcolor mb-1 mt-2" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
            <p class="">
                <strong>Ваше имя:</strong>
                <span itemprop="addressLocality"><?= $_SESSION["name"] ?></span>,

            </p>
            <p class=""><strong>E-mail:</strong> <span itemprop="email"><?= $_SESSION["email"] ?></span></p>


        </div>

        <div class="ui right very close rail">
            <div class="ui raised segment">
                <h3 class="header">Ваши Заявки</h3>

                <div class="ui cards">

                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="card">
                        <div class="content">
                            <div class="header"><?= $row['name'] ?>
                            </div>
                            <div class="meta mt-2">Услуга: <?= $row['service'] ?> </div>
                            <div class="meta">Дата: <?php $date = date_create($row['date']);
                                                        echo date_format($date, 'd.m.Y'); ?> </div>
                            <div class="meta">Время записи: <?= $row['time'] ?>
                            </div>
                            <h4 class="ui sub header mt-2">Сообщение:</h4>
                            <div class="description"><?= $row['message'] ?>
                            </div>
                        </div>
                        <div class="extra content">
                            <div class="header">Контакты </div>
                            <div class="description"><?= $row['phone'] ?></div>

                        </div>
                        <a href='?del_id=<?= $row['id'] ?>'><button class="fluid ui red button">Удалить</button></a>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>
        <p></p>
        <p></p>
    </div>





    <?php
    require "template/footer.php";
    ?>