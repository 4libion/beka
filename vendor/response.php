<?php
    require_once('database.php');

    $response = $_GET['response'];
    $id = $_GET['id'];

    if ($response == 'accept') {
        $sql = "UPDATE `requests` SET `status` = 'accepted' WHERE `id` = $id";
        $_SESSION['message'] = 'Successfully accepted!';
    } else {
        $sql = "UPDATE `requests` SET `status` = 'rejected' WHERE `id` = $id";
        $_SESSION['message'] = 'Successfully rejected!';
    }
    mysqli_query($connection, $sql);

    header('Location: ../requests.php');
?>