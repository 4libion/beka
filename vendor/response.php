<?php
    require_once('database.php');

    // Getting a response from teacher (either reject or accept)
    $response = $_GET['response'];
    // Getting id of the request from querystring
    $id = $_GET['id'];

    // If response is accept row in requests table with the given id will be updated as accepted in status
    if ($response == 'accept') {
        $sql = "UPDATE `requests` SET `status` = 'accepted' WHERE `id` = $id";
        $_SESSION['message'] = 'Successfully accepted!';
        mysqli_query($connection, $sql);
        header('Location: ../requests.php');
    // If response is reject row in requests table with the given id will be updated as rejected in status
    } else if ($response == 'reject') {
        $sql = "UPDATE `requests` SET `status` = 'rejected' WHERE `id` = $id";
        $_SESSION['message'] = 'Successfully rejected!';
        mysqli_query($connection, $sql);
        header('Location: ../requests.php');
    // If user wants to delete the request, the row with the given id will be deleted from requests table
    } else if ($response == 'delete') {
        $sql = "DELETE FROM `requests` WHERE `id` = $id";
        mysqli_query($connection, $sql);
        // User will be redirected to the dashboard page
        header('Location: ../dashboard.php');
    }
    
?>