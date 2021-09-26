<?php

require "include/connect_db.php";
require "template/header.php";
$title = "Поиск";

$search_q = $_GET['search_q'];
$search_q = trim($search_q);
$search_q = strip_tags($search_q);
$sql = mysqli_query($mysql, "SELECT * FROM services WHERE name LIKE '%$search_q%' 
OR description LIKE '%$search_q%'");
while ($row = mysqli_fetch_array($sql)) { ?>
<div class="ui container">
    <h2>Наши услуги</h2>
    <div class="ui raised segment cont">

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

    </div>
</div>

<?php }

mysqli_free_result($sql);
mysqli_close($mysql);
?>