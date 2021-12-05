<?php
    session_start();
    require_once('database.php');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $status = $_POST['status'];
    
    if ($password === $confirm_password) {
        $password = md5($password);
        // connection...
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `status`) VALUES('$first_name', '$last_name', '$email', '$password', '$status');";
        if (mysqli_query($connection, $sql)) {
            $_SESSION['message'] = 'You have successfully signed up! Now you can sign in';
        } else {
            $_SESSION['message'] = mysqli_error($conn);
        }
        header('Location: ../login.php');
    } else {
        $_SESSION['message'] = 'Password should match';
        header('Location: ../index.php');
    }
?>