<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <form action="#">
                    <div class="row">
                        <div class="input-field col s6 offset-s3">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" class="datepicker" id="date">
                            <label for="date">Date</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s3 offset-s3">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" class="timepicker" id="starttime">
                            <label for="starttime">Start time</label>
                        </div>

                        <div class="input-field col s3">
                            <i class="material-icons prefix">date_range</i>
                            <input type="text" class="timepicker" id="endtime">
                            <label for="endtime">End time</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <!-- <form action="#">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" class="datepicker" id="date">
                    <label for="date">Date</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s3">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" class="timepicker" id="starttime">
                    <label for="starttime">Start time</label>
                </div>

                <div class="input-field col s3">
                    <i class="material-icons prefix">date_range</i>
                    <input type="text" class="timepicker" id="endtime">
                    <label for="endtime">End time</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s2">
                    <div class="col s12 center-align">
                        <button type="submit" class="center-align waves-effect waves-light btn">Submit</button>
                    </div>
                </div>
            </div>
        </form> -->
    
    

    <?php include('templates/footer.php'); ?>

    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker();
        });
        $(document).ready(function(){
            $('.timepicker').timepicker();
        });
    </script>
</html>