<?php
$title = "Главная";
session_start();
require "include/connect_db.php";
require "template/header.php";

$sql = mysqli_query($mysql, 'SELECT *
                            FROM services
                            ORDER BY services.id DESC');
while ($row = mysqli_fetch_assoc($sql)) {
    $posts[] = $row;
}
?>
<link rel="stylesheet" href="css/chiefslider.css">
<link rel="stylesheet" href="css/carousel.css">
<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" href="css/transition.min.css">
<link rel="stylesheet" href="css/dimmer.min.css">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/transition.min.js"></script>
<script src="js/dimmer.min.js"></script>
<script src="js/modal.js"></script>
<script src="js/glide.min.js"></script>



<body class="flex">


    <div class="slider mt-4" data-slider="chiefslider">
        <div class="slider__container">
            <div class="slider__wrapper">
                <div class="slider__items">
                    <div class="slider__item">
                        <div class="slider__item-container">
                            <div class="slider__item-content"><img src="img/image_605c55a9c70fb.png" alt=""></div>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="slider__item-container">
                            <div class="slider__item-content"><img src="img/image_605c55a815ac0.png" alt=""></div>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="slider__item-container">
                            <div class="slider__item-content"><img src="img/image_605c559d24ce1.jpg" alt=""></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <a href="#" class="slider__control" data-slide="prev"></a>
        <a href="#" class="slider__control" data-slide="next"></a>
    </div>



    <script src="js/chiefslider.js"></script>

    <script>
    const $slider = document.querySelector('[data-slider="chiefslider"]');
    const slider = new ChiefSlider($slider, {
        loop: true
    });
    </script>
    <div class="ui container ">
        <div class="ui segment cont ">


            <!-- <div class="four wide column">

            </div> -->
            <div class="text-center">
                <h1 class="">О НАС И НАШЕЙ РАБОТЕ</h1>
                <p>Косметологическая клиника «Марибель» стремится сделать Вашу жизнь более комфортной, подарив красоту и
                    уверенность в себе. В Омске мы осуществляем полный спектр мероприятий в сфере красоты, гарантируя их
                    эффективность и качество.</p>
                <h2 class="pink">С вниманием к мелочам</h2>
                <p> Мы понимаем, что не каждый человек с легкостью принимает решение о посещении клиники косметологии. У
                    многих первый шаг связан с психологическим дискомфортом, поэтому специалисты стремятся найти
                    индивидуальный подход к каждому посетителю. Для большего удобства мы стремимся сделать Клинику
                    максимально уютной. В дружественной, приятной атмосфере любая процедура переносится с удовольствием.
                </p>
                <h2 class="pink">Услуги косметологии на любой вкус</h2>
                <p>
                    Нельзя остановить время, так как возрастные изменения и появление морщин неизбежны. Но замедлить его
                    ход реально, выглядя свежо благодаря регулярному уходу.</p>







            </div>

            <?php if (isset($_SESSION['user_id'])) { ?>
            <div class="ui right close rail">
                <h3>Записаться</h3>

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
                        <label>Время записи</label>
                        <input name="time" type="time" min="10:00" max="20:00" step="1800">

                    </div>
                    <div class="field">
                        <label>Сообщение</label>
                        <textarea rows="2" cols="30" name="message" class="form_input" type="text"></textarea>

                    </div>
                    <button class="ui positive button" type="submit" name="submit">
                        Отправить
                    </button>


                </form>


            </div>
            <?php   } ?>


            <h2 class="ui horizontal divider header ">НАПРАВЛЕНИЯ И УСЛУГИ</h2>
            <div class="ui grid mt-3">
                <div class="row">
                    <div class="four wide column text-center">
                        <img src="img/info_3.png" alt="">
                        <h3 class="text-center ">Новейшее косметологическое оборудование</h3>
                    </div>
                    <div class="four wide column text-center"><img src="img/info_4.png" alt="">
                        <h3 class="text-center ">Разработка личных комплексных программ</h3>
                    </div>
                    <div class="four wide column text-center"><img src="img/info_5.png" alt="">
                        <h3 class="text-center">Гарантированный результат</h3>
                    </div>
                    <div class="four wide column text-center">

                        <img src="img/info_2.png" alt="">
                        <h3 class="text-center ">Медицинская лицензия
                            в каждом салоне</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    $('#select')
        .dropdown();
    </script>
    <script>
    $('.tiny.modal')
        .modal('attach events', '.tiny.button', 'show');
    </script>
    <script>
    $('.slider').glide({
        autoplay: true,
        arrowsWrapperClass: 'slider-arrows',
        arrowRightText: '>',
        arrowLeftText: '<'
    });
    </script>
    <?php
    require "template/footer.php";
    ?>