<!-- Only admin may access this page! -->
<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php'); ?>
    <?php require_once('vendor/database.php'); ?>
    <?php require_once('algos.php') ?>
    <table class="responsive-table centered">
        <!-- Creating a table with all users in users table from database -->
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php
                // Going through users from users table with given first name in users array
                for ($i = 0; $i < count($users); $i++) {
                    $sql = "SELECT * FROM users WHERE first_name = '". $users[$i] ."'";
                    $result = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($result);
                    echo '  <tr>
                                <td>'. $row['first_name'] .'</td>
                                <td>'. $row['last_name'] .'</td>
                                <td>'. $row['email'] .'</td>
                                <td>'. $row['status'] .'</td>
                            </tr>';
                }
            ?>
        </tbody>
      </table>
    <?php include('templates/footer.php'); ?>
</html>
