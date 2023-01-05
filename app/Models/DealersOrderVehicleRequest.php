<?php

namespace App\Models;

use App\Models\User;
use App\Models\DealerVehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DealersOrderVehicleRequest extends Model
{
    use HasFactory;
    public function user()

    {

        return $this->hasOne(User::class,'id','user_id');
    }
    public function vehicle()

    {

        return $this->hasOne(DealerVehicle::class,'id','vehicle_id');
    }
}
