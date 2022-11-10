<?php

namespace App\Models;

use App\Models\vehicleInformation;
use Illuminate\Database\Eloquent\Model;
use App\Models\vehicleConditionAndDamage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id','vehicle_registartion_number','vehicle_name','vehicle_year','vehicle_color','vehicle_type','vehicle_tank','vehicle_mileage','vehicle_price','status'
        ,'all_auction','start_vehicle_date','start_vehicle_time','end_vehicle_date','end_vehicle_time','retail_price','clean_price','average_price','hidden_price'
    ];
    public function vehicleInformation()

    {

        return $this->hasOne(vehicleInformation::class,'vehicle_id','id');

    }
    public function VehicleImage()

    {

        return $this->hasOne(VehicleImage::class,'vehicle_id','id');

    }
    public function vehicleConditionAndDamage()

    {

        return $this->hasOne(vehicleConditionAndDamage::class,'vehicle_id','id');

    }
}
