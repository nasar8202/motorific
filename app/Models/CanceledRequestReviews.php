<?php

namespace App\Models;

use App\Models\OrderVehicleRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CanceledRequestReviews extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function user()

    {

        return $this->hasOne(User::class,'id','user_id');
    }
    public function vehicle()

    {

        return $this->hasOne(Vehicle::class,'id','vehicle_id');
    }
    public function order()

    {

        return $this->hasOne(OrderVehicleRequest::class,'id','order_requests_id');
    }
}
