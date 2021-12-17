<!-- This is a page where student can send request to the teacher -->
<!DOCTYPE html>
<html>

<style>
    .row {
        padding: 10px;
    }

    a {
        color: #ffffff;
    }
</style>

<?php include('templates/header.php');?>

<div class="row">
        <!-- Request form for student -->
        <form action="../vendor/request.php" class="col s6 offset-s3" method="POST">
            <h3 class="center-align">Send request to teacher</h3>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">reorder</i>

                    <?php
                        include_once('vendor/database.php');
                        // Getting users with teacher status from users table and adding them as options in select tag
                        $sql = "SELECT * FROM `users` WHERE `status` = 'teacher' ORDER BY `first_name`;";
                        $result = $connection -> query($sql);
                    ?>
                    <select name="teacher" id="teacher" onchange="fetch_date(this.value)">
                        <option value="">Teacher</option>
                        <?php
                            if ($result -> num_rows > 0) {
                                while ($row = $result -> fetch_assoc()) {
                                    echo '<option value='. $row['id'] .'>'. $row['first_name'] .'</option>';
                                }
                            }
                        ?>
                    </select>
                    <label for="teacher">Teacher</label>
                </div>

                <!-- Date options depends on selected teacher -->
                <div class="input-field col s6">
                    <i class="material-icons prefix">reorder</i>
                    <select name="date" id="date">
                        <option value="">Date</option>    
                    </select>
                    <label for="date">Date</label>
                </div>
            </div>

            <div class="row">
                <div class="col s12 center-align">
                    <button type="submit" class="center-align waves-effect waves-light btn">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Initialization of some materialize classes
        $(document).ready(function(){
            $('select').formSelect();
        });

        // Function used to connect ajax functionality to the select tags for teacher
        function fetch_date(id) {
            console.log(id);
            $('date').html('');
            $.ajax({
                type: 'post',
                url: 'ajaxdata.php',
                data: {teacher_id: id},
                success: function(data) {
                    console.log(data);
                    $('#date').html(data);
                }
            });
        }

        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
<?php include('templates/footer.php'); ?>

</html>