<!-- This is a page with requests -->
<!DOCTYPE html>
<html>

<?php
    include('templates/header.php');
    require_once('vendor/database.php');
?>
<div class="container">
    <div class="row">
        <div class="col s4">
            <form action="/vendor/search.php" method="POST">
                <div class="input-field">
                    <?php
                        if ($_SESSION['user']['status'] == 'teacher') {
                            $target = 'student';
                        } else if ($_SESSION['user']['status'] == 'student') {
                            $target = 'teacher';
                        }
                        echo '<input name="search" id="search" type="search" placeholder="Search for '. $target .' by name" required>';
                    ?>
                    
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <?php
    // There are two cases: if either there is something entered in search bar or not 
    if (!empty($_GET)) {
        if ($_GET['search'] == 'found') {

            // Displaying a corresponding data for user with specific status (student or teacher)
            $name = $_GET['first_name'];
            // These sql statements are the same as in dashboard file. They use inner join via foreign key constraints
            if ($_SESSION['user']['status'] == 'student') {
                $sql = "SELECT users.first_name, requests.date, requests.id, requests.status FROM requests INNER JOIN users ON users.id = requests.teacher_id WHERE requests.student_id =".$_SESSION['user']['id']." AND users.first_name = '".$name."';";
            } else if ($_SESSION['user']['status'] == 'teacher') {
                $sql = "SELECT users.first_name, requests.date, requests.id, requests.status FROM requests INNER JOIN users ON users.id = requests.student_id WHERE requests.teacher_id =".$_SESSION['user']['id']." AND requests.status = 'waitlist' AND users.first_name =  '".$name."';";
            }
        } else if ($_GET['search'] == 'notfound') {
            $name = $_GET['first_name'];
            echo '<p> '. $name .' not found</p>';
            if ($_SESSION['user']['status'] == 'student') {
                $sql = "SELECT users.first_name, requests.date, requests.id, requests.status FROM requests INNER JOIN users ON users.id = requests.teacher_id WHERE requests.student_id =".$_SESSION['user']['id'].";";
            } else if ($_SESSION['user']['status'] == 'teacher') {
                $sql = "SELECT users.first_name, requests.date, requests.id, requests.status FROM requests INNER JOIN users ON users.id = requests.student_id WHERE requests.teacher_id =".$_SESSION['user']['id']." AND requests.status = 'waitlist';";
            }
        }
        $question = mysqli_query($connection, $sql);
        $length = mysqli_num_rows($question);
        // The functionality of display is the same as in dashboard file. I goes through requests using for loop
        for ($i = 0; $i < $length; $i++) {
            $row = mysqli_fetch_array($question);
            echo '<script>console.log("Hello World");</script>';
            $date = explode('|',$row['date']);
            if ($_SESSION['user']['status'] == 'student') {
                echo '<div class="col s4">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">'. $row['first_name'] .'</span>
                                <p>Date: '. $date[0] .'</p>
                                <p>Time: '. $date[1] .'</p>
                                <p>Status: '. $row['status'] .'</p>
                                <p>Id: '. $row['id'] .' </p>
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
                                <p>Id: '. $row['id'] .'</p>
                            </div>
                            <div class="card-action">
                                <a href="/vendor/response.php?response=accept&&id='. $row['id'] .'">Accept</a>
                                <a href="/vendor/response.php?response=reject&&id='. $row['id'] .'">Reject</a>
                            </div>
                        </div>
                    </div>'; 
            }
        }
    } else {
        if ($_SESSION['user']['status'] == 'student') {
            $sql = "SELECT users.first_name, requests.date, requests.id, requests.status FROM requests INNER JOIN users ON users.id = requests.teacher_id WHERE requests.student_id =".$_SESSION['user']['id'].";";
        } else if ($_SESSION['user']['status'] == 'teacher') {
            $sql = "SELECT users.first_name, requests.date, requests.id, requests.status FROM requests INNER JOIN users ON users.id = requests.student_id WHERE requests.teacher_id =".$_SESSION['user']['id']." AND requests.status = 'waitlist';";
        }
        $question = mysqli_query($connection, $sql);
        $length = mysqli_num_rows($question);
        for ($i = 0; $i < $length; $i++) {
            $row = mysqli_fetch_array($question);
            $date = explode('|',$row['date']);
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
    }
    ?>
</div>

<?php include('templates/footer.php'); ?>
</html>