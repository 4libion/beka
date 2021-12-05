<?php
    $connection = mysqli_connect(
        'localhost',
        'root',
        '',
        'beka'
    );
    if (!$connection) {
        die('Cannot connect to the database');
    }
?>