<?php
session_start();
$title = '';

require 'include/connect_db.php';
require 'template/header.php';

$posts = [];
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    function clean($var)
    {
        $var = strip_tags($var);
        $var = trim($var);
        $var = str_replace(chr(10), "<br>", $var);
        $var = str_replace(chr(13), "<br>", $var);
        return $var;
    }
    $id = clean($id);
    $sql =  'SELECT *
                            FROM services
                           
                            WHERE id=?
                            ';
    $stmt = mysqli_stmt_init($mysql);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $posts = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($posts);
}



?>

<body class="flex">


    <div class="ui container  ">
        <div class="ui segment cont">

            <div class="ui grid mt-3 mb-3">

                <div class="six wide column forms ml-5  bgforms">
                    <h2 class="">Записаться</h2>
                    <form class="ui form" action="include/increquest.php" method="POST" enctype="multipart/form-data">
                        <div class="field">
                            <label>Ваше имя</label>
                            <input class="form_input" type="text" name="name" placeholder="">
                        </div>
                        <div class="field">
                            <label>Телефон</label>
                            <input class="form_input" type="tel" name="phone" placeholder="">
                        </div>

                        <div class="field">
                            <label>Выберите услугу</label>
                            <select name="service" class="ui dropdown" id="select">
                                <?php foreach ($posts as $row) { ?>
                                <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                                <?php } ?>

                            </select>

                        </div>

                        <div class="field">
                            <label>Дата</label>
                            <input class="form_input" type="date" name="date" placeholder="">
                        </div>

                        <div class="field">


                            <label>Время</label>
                            <input name="time" type="time" min="10:00" max="20:00">
                        </div>
                        <div class="field">
                            <label>Сообщение</label>
                            <textarea rows="2" cols="30" name="message" class="form_input" type="text"></textarea>

                        </div>
                        <button class="ui positive button but" type="submit" name="submit">
                            Отправить
                        </button>


                    </form>
                </div>
                <div class="six wide column forms ml-5 bgforms ">
                    <h2></h2>
                    <p class=" text-center"> Вы можете оставить заявку на запись и наши сотрудники свяжутся с вами в
                        ближащие время</p>
                    <p class="text-center"> Посмотреть свои заявки можно в личном кабинете пользователя</p>
                </div>
            </div>
        </div>
    </div>




    <?php require 'template/footer.php'; ?>