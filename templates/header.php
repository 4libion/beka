<!-- This page is used in all pages as header -->
<?php
    session_start();
    if (!$_SESSION['user']) {
        $_SESSION['message'] = 'You need to sign in!';
        header('Location: /login.php');
    }
?>
<head>
    <title>Coursemaster!</title>

    <!-- Adding external source codes in order to make some classes to work properly -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <style type="text/css">
        .brand {
            background: #cbb09c !important;
        }
        .brand-text {
            color: #cbb09c !important;
        }
        footer {
            background: #ffffff;
            position: absolute;
            left: 0;
            bottom: 0;
            height: 50px;
            width: 100%;
            overflow: hidden;
        }
    </style>
</head>
    <body class="grey lighten-4">
        <nav class="white z-depth-0">
            <div class="container">
                <!-- Navigation panel at the top -->
                <a href="../dashboard.php" class="brand-logo left brand-text">Coursemaster</a>
                <ul id="nav-mobile" class="right hide-on-small-and-down">
                    <!-- Some links will be visible or invisible depending on user's status -->
                    <?php
                        if ($_SESSION['user']['status'] == 'admin') {
                            echo '<li><a href="../admin.php" class="brand z-depth-0">Admin Panel</a></li>';
                        }
                    ?>
                    <?php
                        if ($_SESSION['user']['status'] != 'admin') {
                            echo '<li><a href="../dashboard.php" class="brand z-depth-0">Dashboard</a></li>';
                        }
                    ?>
                    
                    <?php
                        if ($_SESSION['user']['status'] == 'student') {
                            echo '<li><a href="../courses.php" class="brand z-depth-0">Take course</a></li>';
                        }
                    ?>
                    <?php
                        if ($_SESSION['user']['status'] != 'admin') {
                            echo '<li><a href="../requests.php" class="brand z-depth-0">Requests</a></li>';
                        }
                    ?>
                    <?php
                        if ($_SESSION['user']['status'] == 'teacher') {
                            echo '<li><a href="../schedule.php" class="brand z-depth-0">Schedule</a></li>';
                        }
                    ?>
                    <li><a href="../vendor/logout.php" class="brand z-depth-0">Logout</a></li>
                </ul>
            </div>
        </nav>

        <!-- If there is some message from other pages, it will be displayed -->
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="black-text message"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>