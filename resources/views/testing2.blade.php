<!DOCTYPE html>
<html>
<head>
    <title>PHP - How to make dependent dropdown list using jquery Ajax?</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
</head>
<body>


<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Select State and get bellow Related City</div>
      <div class="panel-body">
            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="state" class="form-control">
                    <option value="">--- Select State ---</option>


                    <?php
                        require('db_config.php');
                        $sql = "SELECT * FROM demo_state"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['name']."</option>";
                        }
                    ?>


                </select>
            </div>


            <div class="form-group">
                <label for="title">Select City:</label>
                <select name="city" class="form-control" style="width:350px">
                </select>
            </div>


      </div>
    </div>
</div>


<script>
$( "select[name='state']" ).change(function () {
    var stateID = $(this).val();


    if(stateID) {


        $.ajax({
            url: "ajaxpro.php",
            dataType: 'Json',
            data: {'id':stateID},
            success: function(data) {
                $('select[name="city"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $('select[name="city"]').empty();
    }
});
</script>


</body>
</html>















<div class="form-group">
<label for="country">Select State:</label>
<select name="state" class="form-control" style="width:250px">
    <option value="">--- Select State ---</option>
    @foreach ($states as $key => $state)
    <option value="{{ $key }}">{{ $state }}</option>
    @endforeach
</select>
</div>
<div class="form-group">
<label for="district">Select District:</label>
<select name="district" class="form-control"style="width:250px">
<option>--State--</option>
</select>
</div>









Select state: <select name="state" id="countySel" size="1">
<option value="" selected="selected">Select state</option>
</select>
<br>
<br>
Select District: <select name="district" id="stateSel" size="1">
<option value="" selected="selected">Select District</option>
</select>