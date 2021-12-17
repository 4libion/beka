<?php
    session_start();
    require_once('database.php');

    // Getting data from request form
    $teacher = $_POST['teacher'];
    $date = ($_POST['date']);
    
    // Getting user's id from session variable
    $user_id = $_SESSION['user']['id'];
    $teacher_id = $teacher;

    // If everything is ok new row will be added in requests table
    $sql = "INSERT INTO `requests` (`student_id`, `teacher_id`, `date`) 
            VALUES($user_id, $teacher, '$date');";
    mysqli_query($connection, $sql);
    $_SESSION['message'] = 'Your request successfully sent!';
    // User will be redirected to the dashboard page with message of success
    header('Location: ../dashboard.php');
?>