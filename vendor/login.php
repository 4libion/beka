<?php
    // Starting a session in order to implement user's data who is logged in currently in session
    session_start();
    // Including database configuration in order to query it
    require_once('database.php');

    // Getting user's data from login form
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Check if user exists in database with given email and password
    $check_user = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        // If there is user, creating a two dimensional associative array with data about user
        $_SESSION['user'] = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
            'status' => $user['status']
        ];

        // If admin is logged in, redirect him to admin page
        if ($user['status'] == 'admin') {
            header('Location: ../admin.php');
        // If student or techer is logged in, redirect him or her to dashboard page
        } else {
            header('Location: ../dashboard.php');
        }

        // If something is wrong in form, user will be redirected to the login page and message will be displayed
    } else {
        $_SESSION['message'] = 'Email or password is incorrect!';
        header('Location: ../login.php');
    }
?>