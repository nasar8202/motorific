<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vehicleConditionAndDamage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'vehicle_id','exterior_grade','scratches_and_scuffs','dents','paintwork_problems','windscreen_damage','broken_missing','warning_lights_on_dashboard','service_record','main_dealer_services','independent_dealer_service'
    ];
}
