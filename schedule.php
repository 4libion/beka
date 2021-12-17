<!-- This is a page where teacher ca create a new schedule -->
<!DOCTYPE html>
<html>
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

    <?php include('templates/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <!-- Schedule form that will be sent to the schedule_maker.php file in vendor folder -->
                <form action="/vendor/schedule_maker.php" method="POST">
                    <div class="row">
                        <div class="input-field col s6 offset-s3">
                            <i class="material-icons prefix">date_range</i>
                            <input name="date" type="text" class="datepicker" id="date">
                            <label for="date">Date</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s3 offset-s3">
                            <i class="material-icons prefix">date_range</i>
                            <input name="start_time" type="text" class="timepicker" id="starttime">
                            <label for="starttime">Start time</label>
                        </div>

                        <div class="input-field col s3">
                            <i class="material-icons prefix">date_range</i>
                            <input name="end_time" type="text" class="timepicker" id="endtime">
                            <label for="endtime">End time</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s3 offset-s5">
                            <button type="submit" class="center-align waves-effect waves-light btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <?php include('templates/footer.php'); ?>

    <script>
        // Initialization of materializecss classes
        $(document).ready(function(){
            $('.datepicker').datepicker();
        });
        $(document).ready(function(){
            $('.timepicker').timepicker();
        });
    </script>
</html>