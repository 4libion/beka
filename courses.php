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

<?php include('templates/header.php'); ?>

<div class="row">
        <form action="../vendor/request.php" class="col s6 offset-s3" method="POST">
            <h3 class="center-align">Send request to teacher</h3>

            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">reorder</i>
                    <select name="teacher" id="teacher" onchange="populate(this.id, 'schedule')">
                        <option value=""></option>
                        <option value="Talgat">Talgat agai</option>
                        <option value="Berik">Berik agai</option>
                    </select>
                    <label for="teacher">Teacher</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix">reorder</i>
                    <select name="date" id="schedule"></select>
                    <label for="schedule">Date</label>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('select').formSelect();
        });

        function populate(s1, s2) {
            console.log(s1, s2);
            var s1 = document.getElementById(s1);
            var s2 = document.getElementById(s2);
            s2.innerHTML = "";
            if (s1.value == 'Talgat') {
                var option_array = ['|', '6.12.2021 8:00-8:40|6.12.2021 8:00-8:40', '7.12.2021 8:00-8:40|7.12.2021 8:00-8:40', '7.23.2021 15:00-15:40|7.23.2021 15:00-15:40'];
            }
            for (var option in option_array) {
                var pair = option_array[option].split('|');
                var new_option = document.createElement('option');
                new_option.value = pair[0];
                new_option.innerHTML = pair[1];
                s2.options.add(new_option);
                console.log('added!');
                $('select').on('contentChanged', function() {
                    $(this).formSelect().append($('<option>'+new_option+'</option>'));
                });
            }
            console.log(s1);
            console.log(s2);
            $(document).ready(function(){
                $('select').formSelect();
            });
        }
    </script>

<!-- <div class="row">
    <div class="col s6">
        <div class="card red lighten-3">
        <div class="card-content white-text">
            <span class="card-title">Math</span>
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
            <a class="white-text" href="/course.php?course=math">Go</a>
        </div>
        </div>
    </div>

    <div class="col s6">
        <div class="card teal lighten-4">
        <div class="card-content white-text">
            <span class="card-title">Physics</span>
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
            <a class="white-text" href="/course.php?course=physics">Go</a>
        </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col s6">
        <div class="card purple lighten-3">
        <div class="card-content white-text">
            <span class="card-title">Chemistry</span>
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
            <a class="white-text" href="/course.php?course=chemistry">Go</a>
        </div>
        </div>
    </div>

    <div class="col s6">
        <div class="card green lighten-4">
        <div class="card-content white-text">
            <span class="card-title">Biology</span>
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
            <a class="white-text" href="/course.php?course=biology">Go</a>
        </div>
        </div>
    </div>
</div> -->

<?php include('templates/footer.php'); ?>

</html>