<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>
    <?php
        require_once('vendor/database.php');
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
        <div class="col s4 sample">
            <div class="card teal">
                <div class="card-content white-text">
                    <span class="card-title">My Profile</span>
                    <p>Name: <?php echo $_SESSION['user']['first_name'], ' ', $_SESSION['user']['last_name']?></p>
                    <p>Email: <?php echo $_SESSION['user']['email']?></p>
                    <p>Status: <?php echo $_SESSION['user']['status']?></p>
                </div>
            </div>
        </div>

        <!-- <div class="col s12 m8 l9"> -->
            <!-- <div class="row"> -->
                <!-- <p class="black-text">My scheduled courses</p> -->
            <!-- </div>  -->
            <!-- <div class="row"> -->
                <?php
                    if ($_SESSION['user']['status'] == 'student') {
                        $sql = "SELECT users.first_name, requests.date, requests.id, requests.status FROM requests INNER JOIN users ON users.id = requests.teacher_id WHERE requests.student_id =".$_SESSION['user']['id']." AND requests.status = 'accepted';";
                    } else if ($_SESSION['user']['status'] == 'teacher') {
                        $sql = "SELECT users.first_name, requests.date, requests.id, requests.status FROM requests INNER JOIN users ON users.id = requests.student_id WHERE requests.teacher_id =".$_SESSION['user']['id']." AND requests.status = 'accepted';";
                    }

                    $result = mysqli_query($connection, $sql);
                    $length = mysqli_num_rows($result);

                    for ($i = 0; $i < $length; $i++) {
                        $row = mysqli_fetch_array($result);
                        $date = explode(' ',$row['date']);
                        echo '<div class="col s4 sample">
                                <div class="card blue-grey darken-1">
                                    <div class="card-content white-text">
                                        <row>
                                            <span class="card-title">'. $row['first_name'] .'</span>
                                        </row>
                                        <p>Date: '. $date[0] .'</p>
                                        <p>Time: '. $date[1] .'</p>
                                    </div>
                                    <div class="card-action">
                                        <a href="/vendor/response.php?response=delete&&id='. $row['id'] .'">Delete</a>
                                    </div>
                                </div>
                            </div>';
                    }
                ?>
            <!-- </div>  -->
        </div>
    </div>
    <script>
        $(document.ready(function(){
            $('.sample').matchHeight();
        });
    </script>
    <?php include('templates/footer.php'); ?>

</html>