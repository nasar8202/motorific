<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vehicleInformation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'vehicle_id','vehicle_feature_id','seat_material_id','number_of_keys_id','tool_pack_id','looking_wheel_nut_id','smooking_id','logbook_id','location','vehicle_owner_id','private_plate_id','finance_id','status'
    ];
}
