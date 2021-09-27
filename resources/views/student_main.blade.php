@extends('main')
@section('page')


<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="state"]').on('click',function(){
               var stateID = jQuery(this).val();
               if(stateID)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/getDistrict/' +stateID,
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
    
    jQuery(document).ready(function()
    {
        $("form").submit(function(){
        alert("Student Details Entered Successfully");
        // swal("Details entered successfully", "You clicked the button!", "success");
        });

        // $("#clk").click(function(){
        // alert("Student Details Entered Successfully");
        // });





    });

    </script>


   <div class="py-12">
        <div class="container">
            <div class="row">                        
                <!-- students details table -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Students Details</div>
                            <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Location</th>
                                <th scope="col">Pin Code</th>
                                <th scope="col">State</th>
                                <th scope="col">District</th>
                                <th scope="col">Joining Course</th>
                                <th scope="col">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($students as $student)
                                <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{Carbon\Carbon::parse($student->dop)->format('d-m-Y')}}</td>
                                <td>{{$student->location}}</td>
                                <td>{{$student->pincode}}</td>
                                <td>{{$student->stateFind->name}}</td>
                                <td>{{$student->districtFind->name}}</td>
                                <td>{{$student->course}}</td>
                                <td>
                                    <div>
                                        <a href="{{route('student.edit',$student->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{route('student.delete',$student->id)}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>

                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                </div>  
                <!-- students details table end -->

                <!-- student form to enter the details -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Enter The Student Details</div>
                        <div class="card-body">
                            <form action="{{route('student.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Full Name">
                                    <div class="text-danger">{{$errors->first('name')}}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="formGroupExampleInput2" placeholder="Mail ID">
                                    <div class="text-danger">{{$errors->first('email')}}</div>

                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="Phone Number">
                                    <div class="text-danger">{{$errors->first('phone')}}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">DOB</label>
                                    <input type="date" class="form-control" name="dop" id="formGroupExampleInput2" placeholder="Date of birth">
                                    <div class="text-danger">{{$errors->first('dop')}}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location" id="formGroupExampleInput2" placeholder="Place">
                                    <div class="text-danger">{{$errors->first('location')}}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Pin Code</label>
                                    <input type="number" class="form-control" name="pincode" id="formGroupExampleInput2" placeholder="Pin Code">
                                    <div class="text-danger">{{$errors->first('pincode')}}</div>
                                </div>
                                <div class="mb-3">
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
                                        <option>--Select District--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Joining Course</label>
                                    <input type="text" class="form-control" name="course" id="formGroupExampleInput2" placeholder="Course Name">
                                    <div class="text-danger">{{$errors->first('course')}}</div>
                                </div>
                                
                                <button type="submit" id="clk" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>      
                <!-- student form to enter the details -->
      
            </div>    
        </div>
    </div>



@endsection