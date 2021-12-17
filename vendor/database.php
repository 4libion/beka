<?php
    // Database connection
    $connection = mysqli_connect(
        'localhost',
        'root',
        '',
        'beka'
    );
    // If error occurs handle this error by sending a message
    if (!$connection) {
        die('Cannot connect to the database');
    }
?>