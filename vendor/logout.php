<?php
    // If user wants to log out all session variables will be destroyed and user will be redirected to the login page
    session_start();
    unset($_SESSION['user']);
    header('Location: ../login.php');
?>