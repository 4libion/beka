<?php
    // If user is already logged in, he won't be able to acces this page
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: dashboard.php');
    }
?>

<!-- This login page simply includes templates in templates folder -->
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