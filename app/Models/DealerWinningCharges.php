<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\DealerVehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DealerWinningCharges extends Model
{
    use HasFactory;
    public function Vehicle()

    {

        return $this->hasOne(Vehicle::class,'id','vehicle_id');

    }
    public function dealerVehicle()

    {

        return $this->hasOne(DealerVehicle::class,'id','dealer_vehicle_id');

    }
    public function User()

    {

        return $this->hasOne(User::class,'id','user_id');

    }
}
