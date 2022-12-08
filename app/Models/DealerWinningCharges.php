<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DealerWinningCharges extends Model
{
    use HasFactory;
    public function Vehicle()

    {

        return $this->hasOne(Vehicle::class,'id','vehicle_id');

    }
    public function User()

    {

        return $this->hasOne(User::class,'id','user_id');

    }
}
