<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>
    <?php
        if (!$_SESSION['user']) {
            $_SESSION['message'] = 'You need to sign in!';
            header('Location: /login.php');
        }
    ?>
    <style>
        body {
            color: #ffffff;
        }
        .row {
            height: auto;
            padding: 10px !important;
        }
        .col {
            padding: 10px !important;
        }
    </style>

    <div class="row">
        <div class="grey col s12 m4 l3">
            <div class="row">
                <?php echo $_SESSION['user']['status'], ': ', $_SESSION['user']['first_name'], ' ', $_SESSION['user']['last_name'];?>
            </div> 
            <div class="row">
                <?php echo 'email: ', $_SESSION['user']['email'];?>
            </div> 
        </div>

        <div class="teal col s12 m8 l9">
            <div class="row">
                My scheduled courses
            </div> 
            <div class="row">
                Right Side
            </div> 
        </div>
    </div>
    
    <?php include('templates/footer.php'); ?>

</html>