<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'dop',
        'location',
        'pincode',
        'state',
        'district',
        'course',

    ];

    public function stateFind()
        {
            return $this->hasOne(State::class,'id','state');
        }
    
    public function districtFind()
    {
        return $this->hasOne(District::class,'id','district');
    }
    
}
