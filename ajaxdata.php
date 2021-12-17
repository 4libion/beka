<?php
    // This is an ajax file which is used for dynamic pages. 
    // In our case it is used for course selection page, where date will vary depending on choosen teacher.
    include_once('vendor/database.php');

    if($_POST['teacher_id']) {
        $sql = "SELECT * FROM schedule WHERE teacher_id = ". $_POST['teacher_id'] ."";
        // Adding dates of teacher as options into select tags 
        $result = $connection -> query($sql);
        if ($result -> num_rows > 0) {
            echo '<option value="">Date</option>';
            while ($row = $result -> fetch_assoc()) {
                echo '<option value="'. $row['date'] .'">'. $row['date'] .'</option>';
            }
            echo    "<script>
                        $(document).ready(function(){
                            $('select').formSelect();
                        });
                    </script>";
        } else {
            echo '<option>No date found</option>';
        }
    }
?>