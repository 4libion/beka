<?php
    session_start();
    require_once('database.php');

    // Getting a data from schedule form which is filled by teacher
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    // Concatenating start time and end time in schedule variable via "|" sign
    $schedule = '';
    $schedule .= $date;
    $schedule .= '|';
    $schedule .= $start_time;
    $schedule .= '-';
    $schedule .= $end_time;

    // New row will appear in schedule table
    $sql = "INSERT INTO `schedule` (`teacher_id`, `date`) VALUES (".$_SESSION['user']['id'].", '$schedule');";
    mysqli_query($connection, $sql);
    // User will be redirected to schedule page with success data in querystring as shown below
    header('Location: ../schedule.php?success=true');
?>