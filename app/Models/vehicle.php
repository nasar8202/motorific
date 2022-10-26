<?php

namespace App\Models;

use App\Models\vehicleInformation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id','vehicle_registartion_number','vehicle_name','vehicle_year','vehicle_color','vehicle_type','vehicle_tank','vehicle_mileage','vehicle_price','status'
    ];
    public function vehicleInformation()

    {

        return $this->hasOne(vehicleInformation::class,'vehicle_id','id');

    }
    public function VehicleImage()

    {

        return $this->hasMany(VehicleImage::class);
    }
}
