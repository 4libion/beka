<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: dashboard.php');
    }
?>

<!DOCTYPE html>
<html>

<?php include('templates/login.php'); ?>
<?php
    if (isset($_SESSION['message'])) {
        echo '<p> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
?>

<?php include('templates/footer.php'); ?>

</html>