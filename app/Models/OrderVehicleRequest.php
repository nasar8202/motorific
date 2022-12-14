<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vehicle;

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
