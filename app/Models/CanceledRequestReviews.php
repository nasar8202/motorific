<?php

namespace App\Models;

use App\Models\DealerVehicle;
use App\Models\OrderVehicleRequest;
use Illuminate\Database\Eloquent\Model;
use App\Models\DealersOrderVehicleRequest;
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
    public function dealerVehicle()

    {

        return $this->hasOne(DealerVehicle::class,'id','dealer_vehicle_id');
    }
    public function order()

    {

        return $this->hasOne(OrderVehicleRequest::class,'id','biding_id');
    }
    public function bidorder()

    {

        return $this->hasOne(BidedVehicle::class,'id','biding_id');
    }
    public function dealerOrder()

    {

        return $this->hasOne(DealersOrderVehicleRequest::class,'id','order_requests_id');
    }
}
