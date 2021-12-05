<?php
    session_start();
    require_once('database.php');

    $teacher = $_POST['teacher'];
    $date = ($_POST['date']);

    echo $teacher, ' ', $date;

    $sql = "SELECT `id` FROM `users` WHERE `first_name` = '$teacher' AND `status` = 'teacher';";
    $teacher_id = mysqli_query($connection, $sql);
    if (mysqli_num_rows($teacher_id) > 0) {
        $teacher_id = mysqli_fetch_array($teacher_id);
    }
    $user_id = $_SESSION['user']['id'];
    $teacher_id = $teacher_id['id'];

    $sql = "INSERT INTO `requests` (`student_id`, `teacher_id`, `date`) 
            VALUES($user_id, $teacher_id, '$date');";
    mysqli_query($connection, $sql);
    $_SESSION['message'] = 'Your request successfully sent!';
    header('Location: ../dashboard.php');
?>