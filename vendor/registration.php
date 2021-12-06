<?php
    session_start();
    $_SESSION['message'] = '';
    require_once('database.php');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $status = $_POST['status'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] .= 'Invalid email format <br>';
    }
    if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
        $password = test_input($_POST["password"]);
        $cpassword = test_input($_POST["cpassword"]);
        if (strlen($_POST["password"]) <= 8) {
            $_SESSION['message'] .= "Your Password Must Contain At Least 8 Characters! <br>";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $_SESSION['message'] .= "Your Password Must Contain At Least 1 Number! <br>";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $_SESSION['message'] .= "Your Password Must Contain At Least 1 Capital Letter! <br>";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $_SESSION['message'] .= "Your Password Must Contain At Least 1 Lowercase Letter! <br>";
        } else {
            $_SESSION['message'] .= "Please Check You've Entered Or Confirmed Your Password! <br>";
        }
    }


    if ($password === $confirm_password) {
        $password = md5($password);
        // connection...
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `status`) VALUES('$first_name', '$last_name', '$email', '$password', '$status');";
        if (mysqli_query($connection, $sql)) {
            $_SESSION['message'] = 'You have successfully signed up! Now you can sign in';
        } else {
            $_SESSION['message'] .= mysqli_error($conn);
        }
        header('Location: ../login.php');
    } else {
        $_SESSION['message'] .= 'Password should match';
        header('Location: ../index.php');
    }
?>