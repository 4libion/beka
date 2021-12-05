<?php
    session_start();
    require_once('database.php');

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
            'status' => $user['status']
        ];
        header('Location: ../dashboard.php');

        // OK
    } else {
        $_SESSION['message'] = 'Email or password is incorrect!';
        header('Location: ../login.php');
    }
?>