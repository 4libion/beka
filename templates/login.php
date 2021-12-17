<?php
    if (isset($_SESSION['message'])) {
        echo '<p class="message"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
?>

<head>
    <title>Coursemaster!</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <style type="text/css">
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
    <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="message"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
    ?>
    <!-- Login form -->
    <div class="row valign-wrapper center-align">
        <!-- This form's inputs will be sent to the login.php file in vendor folder which will render it -->
        <form action="../vendor/login.php" class="col s6 offset-s3" method="POST">
            <div class="row">
                <h3 class="center-align col s12">Login</h3>
            </div>
            <div class="row ">
                <div class="input-field col s12">
                    <i class="material-icons prefix">local_post_office</i>
                    <input name="email" id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock_outline</i>
                    <input name="password" id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div> 

            <div class="row">
                <div class="col s12 center-align">
                    <button type="submit" class="center-align waves-effect waves-light btn">Submit</button>
                </div>
            </div>

            <div class="row">
                <div class="col s12 center-align">
                    <p>
                        Don't have an account? - <a href="/index.php">Sign up!</a>
                    </p>
                </div>
            </div> 
        </form>
    </div>