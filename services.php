<?php
$str = 1;
$title = "Услуги";
session_start();
require "include/connect_db.php";
require "template/header.php";


$sql = mysqli_query($mysql, 'SELECT *
                            FROM workers
                            ORDER BY workers.id DESC');
while ($row = mysqli_fetch_assoc($sql)) {
    $posts[] = $row;
}
$select = mysqli_query($mysql, 'SELECT *
                            FROM services
                            ORDER BY services.id DESC');
while ($col = mysqli_fetch_assoc($select)) {
    $service[] = $col;
}
?>
<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" href="css/transition.min.css">
<link rel="stylesheet" href="css/dimmer.min.css">
<script src="js/search.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/transition.min.js"></script>
<script src="js/dimmer.min.js"></script>
<script src="js/modal.js"></script>


<body class="flex">
    <div class="ui container">

        <div class="ui raised segment cont ">

            <h2 class="header ml-5 ">Наши услуги</h2>
            <div class="ui cards">
                <?php foreach ($service as $col) { ?>


                    <div class="ui card ml-5 ">
                        <div class="image">
                            <img src="img/<?= $col['file'] ?>">
                        </div>
                        <div class="content ">
                            <?php $id = $col['id']; ?>
                            <a class="ui tiny button header" href="request.php?id=<?= $id ?>"><?= $col['name'] ?></a>

                            <div class="description"><?= $col['description'] ?></div>
                        </div>
                    </div>




                <?php } ?>

            </div>
            <div class="ui three column grid mb-3">


            </div>
            <div class="ui horizontal divider">Наши сотрудники</div>
            <div class="ui grid mt-3">
                <div class="row">

                    <?php foreach ($posts as $row) { ?>

                        <div class="four wide column">
                            <a class="ui tiny circular image">
                                <img src="img/<?= $row['file'] ?>">
                            </a>
                            <div class="content">
                                <a class="header"> <?= $row['firstname'] ?></a>
                                <div class="description">
                                    <p><?= $row['specification'] ?></p>
                                </div>
                            </div>

                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>











    <script>
        $('.tiny.modal')
            .modal('attach events', '.tiny', 'show');
    </script>



    <?php
    require "template/footer.php";

    ?>