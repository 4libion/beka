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
        #toast-container {
            top: auto !important;
            right: auto !important;
            bottom: 80%;
            left:31%;  
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
    <div class="row">
        <form action="../vendor/registration.php" class="col s6 offset-s3" method="POST">
            <h3 class="center-align">Registration</h3>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input name="first_name" id="first_name" type="text" class="autocomplete validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input name="last_name" id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">local_post_office</i>
                    <input name="email" id="email" type="email" class="validate">
                    <label for="email">Email</label>
                    <span class="helper-text" data-error="wrong format" data-success="right format"></span>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">reorder</i>
                    <select name="status">
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
            </div> 

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock_outline</i>
                    <input class="toaster" onclick="
                    M.toast({html: 'Your Password Must Contain At Least 8 Characters! <br> Your Password Must Contain At Least 1 Number! <br> Your Password Must Contain At Least 1 Capital Letter! <br> Your Password Must Contain At Least 1 Lowercase Letter! <br>', displayLength: 20000, classes: 'rounded'})" 
                    name="password" id="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">lock_outline</i>
                    <input name="confirm_password" id="confirm_password" type="password" class="validate">
                    <label for="confirm_password">Confirm Password</label>
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
                        Already have an account? - <a href="/login.php">Sign in!</a>
                    </p>
                </div>
            </div>
        </form>
    </div>        

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>