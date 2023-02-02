<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderVehicleRequest extends Model
{
    use HasFactory;
    
    public function user()

    {

        return $this->hasOne(User::class,'id','user_id');
    }
    public function vehicle()

    {

        return $this->hasOne(Vehicle::class,'id','vehicle_id');
    }
}
