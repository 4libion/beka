<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: dashboard.php');
    }
?>

<!DOCTYPE html>
<html>

<?php include('templates/registration.php'); ?>
<?php include('templates/footer.php'); ?>

</html>