<?php
    require_once('database.php');

    // Retrieving a data from schedule table and keeping it as array
    $sql = "SELECT * FROM schedule";
    $result = mysqli_query($connection, $sql);
    $length = mysqli_num_rows($result);

    $arr = array();
    for ($i = 0; $i < $length; $i++) {
        $row = mysqli_fetch_array($result);
        $arr[$i] = $row;
    }
?>