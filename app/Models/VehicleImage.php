<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'vehicle_id','image'
    ];

    public function VehicleImage()
    {
         return $this->belongsTo(Vehicle::class);
    }
}
