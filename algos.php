<?php

    // In this file all algorithms used in the project are described
    require_once('vendor/database.php');

    // Getting all users from users table
    $sql = "SELECT * FROM `users`;";
    $result = mysqli_query($connection, $sql);

    // Keeping users as objects in array
    $users = array();

    $index = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        // Adding user's first names into users array
        $users[$index] = $row['first_name'];
        $index++;
    }

    // Implementation of bubble sort
    function bubble_sort($arr) {
        // Basically it sorts an array of strings in Ascending order, otherwise in alphabetical order
        // n is length of the given array
        $n = count($arr);
        do {
            // initially swapped variable is false so the given algorithm won't stop
            $swapped = false;
            for ($i = 0; $i < $n - 1; $i++) {
                // swap when elements are out of order
                if ($arr[$i] > $arr[$i + 1]) {
                    // Storing initial element in temp variable
                    $temp = $arr[$i];
                    // swapping elements under indexes i and i + 1
                    $arr[$i] = $arr[$i + 1];
                    // Now element under index i + 1 is the same as in temp variable
                    $arr[$i + 1] = $temp;
                    // Now next iteration will start since swapped is now true
                    $swapped = true;
                }
            }
            // Swapped element is not important now, so it is better to consider other elements
            $n--;
        }
        while ($swapped);
        return $arr;
    }

    $users = bubble_sort($users);


    function binarySearch($array, $value) {
        // initial index in array
        $left = 0;
        // last index of array is length - 1
        $right = count($array) - 1;
    
        while ($left <= $right) {
            // initial middle point
            $midpoint = (int) floor(($left + $right) / 2);

            if ($array[$midpoint] < $value) {
            // The midpoint value is less than the value.
            $left = $midpoint + 1;
            } else if ($array[$midpoint] > $value) {
            // The midpoint value is greater than the value.
            $right = $midpoint - 1;
            } else {
            // This is the value we are looking for.
            return $midpoint;
            }
        }
        // The value was not found.
        return -1;
    }
    $length = mysqli_num_rows($result);

    // This recursive function is used to retrieve data from the table
    function recursion($array, $index) {
        $length = count($array);
        if ($index == $length) return;
        echo $array[$index], '<br>';
        recursion($array, $index + 1);
    }

    $target = binarySearch($users, 'Talgat');
?>
