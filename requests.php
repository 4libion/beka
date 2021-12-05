<!DOCTYPE html>
<html>

<?php
    include('templates/header.php');
    require_once('vendor/database.php');
?>

<div class="row">

    <?php
        if ($_SESSION['user']['status'] == 'student') {
            $sql = "SELECT * FROM `requests` WHERE `student_id` =". $_SESSION['user']['id'] ."";
        } else if ($_SESSION['user']['status'] == 'teacher') {
            $sql = "SELECT * FROM `requests` WHERE `teacher_id` =". $_SESSION['user']['id'] ."";
        }
        $requests = mysqli_query($connection, $sql);
        $results = mysqli_num_rows($requests);
        $requests = mysqli_fetch_array($requests);

        if ($_SESSION['user']['status'] == 'student') {
            $sql = "SELECT first_name FROM users INNER JOIN requests ON users.id = requests.teacher_id WHERE requests.student_id =".$_SESSION['user']['id'].";";
        } else if ($_SESSION['user']['status'] == 'teacher') {
            $sql = "SELECT first_name FROM users INNER JOIN requests ON users.id = requests.student_id WHERE requests.teacher_id =".$_SESSION['user']['id'].";";
        }

        $question = mysqli_query($connection, $sql);
        $answer = mysqli_fetch_array($question);


        for ($i = 0; $i < $results; $i++) {
            if ($_SESSION['user']['status'] == 'teacher') {
                echo '<div class="row">
                        <div class="col s4">
                            <div class="card blue-grey darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">'. $answer['first_name'] .'</span>
                                    <p>Date: '. $requests['date'] .'</p>
                                </div>
                                <div class="card-action">
                                    <a href="#">Accept</a>
                                    <a href="#">Reject</a>
                                </div>
                            </div>
                        </div>
                    </div>';
            } else {
                echo '<div class="row">
                        <div class="col s4">
                            <div class="card blue-grey darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">'. $answer['first_name'] .'</span>
                                    <p>Date: '. $requests['date'] .'</p>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            
        }
    ?>
</div>

<?php include('templates/footer.php'); ?>

</html>