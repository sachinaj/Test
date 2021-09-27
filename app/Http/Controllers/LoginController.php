<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\ApiHelper;


class LoginController extends Controller
{  
    use ApiHelper;
    
    public function registerUserExample(Request $request){
        // return $request;
        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'required|email|unique:users',
        //     'password'=>'required|min:8',
        // ]);
        // $user= User::create([
            
        //     'name' =>$request->name,
        //     'email'=>$request->email,
        //     'password'=>bcrypt($request->password)
        // ]); 

        // return $request;
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

         $access_token_example= $user->createToken('Auth Token')->accessToken;
        //   return response()->json(['token' => $access_token_example],200);
        return $this->sendResponse(true,['token' => $access_token_example],'Register successful',200);

        
    }

    /**
     * login user to our application
     */
    public function loginUserExample(Request $request){
        $login_credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(auth()->attempt($login_credentials)){
            //generate the token for the user
            $user_login_token= auth()->user()->createToken('PassportExample@Section.io')->accessToken;
            //now return this token on success login attempt
            // return response()->json(['token' => $user_login_token], 200);
            return $this->sendResponse(true,['token' => $user_login_token],'Login successful',200);

        }
        else{
            //wrong login credentials, return, user not authorised to our system, return error code 401
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
    }

    /**
     * This method returns authenticated user details
     */
    public function authenticatedUserDetails(){
        //returns details
        return response()->json(['authenticated-user' => auth()->user()], 200);
    }

}

