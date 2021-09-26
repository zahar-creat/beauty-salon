<?php
session_start();
if (isset($_POST['submit'])) {
    require 'connect_db.php';

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $service = $_POST['service'];
    $user_id = $_SESSION['user_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    function clean($var)
    {
        $var = strip_tags($var);
        $var = trim($var);
        $var = str_replace(chr(10), "<br>", $var);
        $var = str_replace(chr(13), "<br>", $var);
        return $var;
    }
    $name = clean($name);
    $phone = clean($phone);
    $date = clean($date);
    $time = clean($time);
    $service = clean($service);
    $message = clean($message);




    if (empty($name) || empty($phone) || empty($time)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $insert = "INSERT INTO request(
            name,
            phone, 
            message,
            service,
            date,
            time,
            user_id
 
        ) VALUES (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
            
            
        )";
        $stmt = mysqli_stmt_init($mysql);
        if (!mysqli_stmt_prepare($stmt, $insert)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                "ssssssi",
                $name,
                $phone,
                $message,
                $service,
                $date,
                $time,
                $user_id


            );
            mysqli_stmt_execute($stmt);
            header("Location: ../index.php?success=true");
            exit();
        }
    }
}