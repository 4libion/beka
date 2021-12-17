<?php
    // Starting session in order to use session variables
    session_start();
    $_SESSION['message'] = '';
    // Including database configuration to query through it
    require_once('database.php');

    // Getting data from registration form using $_POST global variable
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $status = $_POST['status'];
    
    // Validation of the input data
    // This is php built-in email validator
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] .= 'Invalid email format <br>';
    }

    // Checking if fields are empty and password is the same as password confirmation
    if(!empty($_POST["password"]) && $password == $confirm_password) {
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        // Adding password validation
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
    } else {
        $_SESSION['message'] .= "Please, fill password section! <br>";
    }

    if ($password === $confirm_password) {
        // If everything is ok, password will be encrypted, so that nobody will know the password except for user
        $password = md5($password);
        // Inserting a new user into users table in database
        $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `status`) VALUES('$first_name', '$last_name', '$email', '$password', '$status');";
        if (mysqli_query($connection, $sql)) {
            $_SESSION['message'] = 'You have successfully signed up! Now you can sign in';
        } else {
            $_SESSION['message'] .= mysqli_error($conn);
        }
        // Redirect user to the login page after registration completion
        header('Location: ../login.php');
    } else {
        // If something is wrong, user will be redirected to the registration page
        $_SESSION['message'] .= 'Password should match';
        header('Location: ../index.php');
    }
?>