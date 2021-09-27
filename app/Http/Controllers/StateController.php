<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;


class StateController extends Controller
{
    public function district()
    {
       
        $districts=State::with('getDistrictRelation')->get();
        return $districts;
    
    }
    

}
