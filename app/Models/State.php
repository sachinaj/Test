<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table='state';
    public function getDistrictRelation()
    {
        return $this->hasmany(District::class,'state_id','id');
    }

}
