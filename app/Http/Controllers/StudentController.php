<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\State;
use App\Models\District;


use DB;

class StudentController extends Controller
{
    public function show()
    {
        $students=Student::with('stateFind','districtFind')->get();
        $states=State::pluck('name','id');
        // $districts=District::pluck('name');

        // return $students;

        return view('student_main',compact('students','states'));

    }

    public function store(Request $request)
    { 
        // return $request;
        $validated=$request->validate([
            'name'=>'required|unique:students|max:255',
            'phone'=>'required|digits:10',
            'email'=>'required|email',
            'dop'=> 'required|date|before_or_equal:2004-06-08',
            'pincode'=>'required',
            'location'=>'required',
            'state'=>'required',
            'district'=>'required',

        ],
        [
            'name.required' => 'Please enter the name',
            'phone.required'=>'please enter a valid 10 digit number',
            'dop.required'=>'Age should be >18',
            'email.required'=>'please enter a valid email ID',
            'pincode.required'=>'*Required',
            'location.required'=>'*Required',
            'state.required'=>'*Required',
            'district.required'=>'*Required',

        ]);


        Student::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'dop'=> $request->dop,
            'location'=> $request->location,
            'pincode'=> $request->pincode,
            'state'=> $request->state,
            'district'=> $request->district,
            'course'=> $request->course,


            
        ]);
         return Redirect()->route('home');
    }

    public function edit($id)
    {
        $students=Student::find($id);
        // return $students;
        return view('student_edit',compact('students'));
    }

    public function getDistrict($id) 
    {
        $districts = District::get()->where("state_id",$id)->pluck("name","id");
        // return $districts;
        return json_encode($districts);
    } 

    public function update(Request $request,$id)
    {
        // return $request;
        $update=Student::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'dop'=>$request->dop,
            'location'=>$request->location,
            'pincode'=>$request->pincode,
            'state'=>$request->state,
            'district'=>$request->district,
            'course'=>$request->course,

        ]);
        return Redirect()->route('home');
    }

    public function delete($id)
    { 
        $delete=Student::find($id)->forceDelete();
        // return $delete;
        return Redirect()->route('home');
    }
}
