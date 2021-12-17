<?php
    require_once('database.php');
    $name = $_POST['search'];

    // Searching for requests via first_name

    $sql = "SELECT * FROM `users` WHERE `first_name` = '$name'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        // If request is found
        header('Location: ../requests.php?search=found&&first_name='. $name .'');
    } else {
        // If request is not found
        $_SESSION['message'] = ''. $name .' not found';
        header('Location: ../requests.php?search=notfound&&first_name='. $name .'');
    }

?>