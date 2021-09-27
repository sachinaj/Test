@extends('main')
@section('page')
<div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Update The Student Details</div>
                        <div class="card-body">
                            <form action="{{route('student.update',$students->id)}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$students->name}}" id="formGroupExampleInput" placeholder="Full Name">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$students->email}}" id="formGroupExampleInput2" placeholder="Mail ID">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Phone</label>
                                    <input type="number" class="form-control" name="phone" value="{{$students->phone}}" id="formGroupExampleInput2" placeholder="Phone Number">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">DOB</label>
                                    <input type="date" class="form-control" name="dop" value="{{$students->dop}}" id="formGroupExampleInput2" placeholder="Date of birth">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Location</label>
                                    <input type="text" class="form-control" name="location" value="{{$students->location}}" id="formGroupExampleInput2" placeholder="Place">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Pin Code</label>
                                    <input type="number" class="form-control" name="pincode" value="{{$students->pincode}}" id="formGroupExampleInput2" placeholder="Pin Code">
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
                                    <input type="text" class="form-control" name="course" value="{{$students->course}}" id="formGroupExampleInput2" placeholder="Course Name">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    
@endsection