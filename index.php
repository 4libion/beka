<?php
    // If user is already logged in, he won't be able to acces this page
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: dashboard.php');
    }
?>

<!-- This registration page simply includes templates in templates folder -->
<!DOCTYPE html>
<html>

<?php include('templates/registration.php'); ?>
<?php include('templates/footer.php'); ?>

</html>