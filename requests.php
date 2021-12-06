<!DOCTYPE html>
<html>

<?php
    include('templates/header.php');
    require_once('vendor/database.php');
?>

<div class="row">

    <?php
        if ($_SESSION['user']['status'] == 'student') {
            $sql = "SELECT users.first_name, requests.date, requests.id, requests.status FROM requests INNER JOIN users ON users.id = requests.teacher_id WHERE requests.student_id =".$_SESSION['user']['id'].";";
        } else if ($_SESSION['user']['status'] == 'teacher') {
            $sql = "SELECT users.first_name, requests.date, requests.id, requests.status FROM requests INNER JOIN users ON users.id = requests.student_id WHERE requests.teacher_id =".$_SESSION['user']['id']." AND requests.status = 'waitlist';";
        }
        // echo $sql;
        $question = mysqli_query($connection, $sql);
        $length = mysqli_num_rows($question);
        for ($i = 0; $i < $length; $i++) {
            $row = mysqli_fetch_array($question);
            $date = explode(' ',$row['date']);
            if ($_SESSION['user']['status'] == 'student') {
                echo '<div class="col s4">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">'. $row['first_name'] .'</span>
                                <p>Date: '. $date[0] .'</p>
                                <p>Time: '. $date[1] .'</p>
                                <p>Status: '. $row['status'] .' </p>
                            </div>
                        </div>
                    </div>'; 
                
                  
            } else if ($_SESSION['user']['status'] == 'teacher') {
                echo '<div class="col s4">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">'. $row['first_name'] .'</span>
                                <p>Date: '. $date[0] .'</p>
                                <p>Time: '. $date[1] .'</p>
                            </div>
                            <div class="card-action">
                                <a href="/vendor/response.php?response=accept&&id='. $row['id'] .'">Accept</a>
                                <a href="/vendor/response.php?response=reject&&id='. $row['id'] .'">Reject</a>
                            </div>
                        </div>
                    </div>'; 
            }
        }
        // while ($row = mysqli_fetch_array($question)) {
        //     echo $row['first_name'];
        //     $date = explode(' ',$row['date']);
        //     if ($_SESSION['user']['status'] == 'teacher') {
        //         echo '<div class="row">
        //                 <div class="col s4">
        //                     <div class="card blue-grey darken-1">
        //                         <div class="card-content white-text">
        //                             <span class="card-title">'. $row['first_name'] .'</span>
        //                             <p>Date: '. $date[0] .'</p>
        //                             <p>Time: '. $date[1] .'</p>
        //                         </div>
        //                         <div class="card-action">
        //                             <a href="#">Accept</a>
        //                             <a href="#">Reject</a>
        //                         </div>
        //                     </div>
        //                 </div>
        //             </div>';
        //     } else if ($_SESSION['user']['status'] == 'student') {
        //         echo 'Hello';
        //         echo '<div class="row">
        //                 <div class="col s4">
        //                     <div class="card blue-grey darken-1">
        //                         <div class="card-content white-text">
        //                             <span class="card-title">'. $row['teacher_id'] .'</span>
        //                             <p>Date: '. $date[0] .'</p>
        //                             <p>Time: '. $date[1] .'</p>
        //                         </div>
        //                     </div>
        //                 </div>
        //             </div>';
        //     } 
        // }
    ?>
</div>

<?php include('templates/footer.php'); ?>

</html>