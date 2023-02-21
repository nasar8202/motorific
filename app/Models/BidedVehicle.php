<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BidedVehicle extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id','vehicle_id','bid_price','status'
    ];
    public function user()

    {

        return $this->hasOne(User::class,'id','user_id');
    }
    public function vehicle()

    {

        return $this->hasOne(Vehicle::class,'id','vehicle_id');
    }
    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y',strToTime($value));
    }
}
