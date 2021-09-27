@extends('student_main')
@section('dropdown')

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

@endsection



<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="state"]').on('change',function(){
               var stateID = jQuery(this).val();
               if(stateID)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/getstates/' +stateID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="district"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="district"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="district"]').empty();
               }
            });
    });
    </script>