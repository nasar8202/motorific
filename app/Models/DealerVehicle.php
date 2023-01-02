<?php

namespace App\Models;

use App\Models\DealerVehicleMedia;
use App\Models\DealerVehicleTyres;
use App\Models\DealerVehicleHistory;
use App\Models\DealerVehicleExterior;
use App\Models\DealerVehicleInterior;
use Illuminate\Database\Eloquent\Model;
use App\Models\DealerAdvertVehicleDetail;
use App\Models\DealerVehicleExteriorDetails;
use App\Models\DealerVehicleInteriorDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DealerVehicle extends Model
{
    use HasFactory;
    public function DealerAdvertVehicleDetail()

    {

        return $this->hasOne(DealerAdvertVehicleDetail::class,'dealer_vehicle_id','id');

    }
    public function DealerVehicleExterior()

    {

        return $this->hasMany(DealerVehicleExterior::class,'dealer_vehicle_id','id');

    }
    public function DealerVehicleHistory()

    {

        return $this->hasOne(DealerVehicleHistory::class,'dealer_vehicle_id','id');

    }
    public function DealerVehicleInterior()

    {

        return $this->hasMany(DealerVehicleInterior::class,'dealer_vehicle_id','id');

    }
    public function DealerVehicleMedia()

    {

        return $this->hasOne(DealerVehicleMedia::class,'dealer_vehicle_id','id');

    }
    public function DealerVehicleTyre()

    {

        return $this->hasMany(DealerVehicleTyres::class,'dealer_vehicle_id','id');

    }
     public function DealerVehicleInteriorDetails()

    {

        return $this->hasOne(DealerVehicleInteriorDetails::class,'dealer_vehicle_id','id');

    }
    public function DealerVehicleExteriorDetails()

    {

        return $this->hasOne(DealerVehicleExteriorDetails::class,'dealer_vehicle_id','id');

    }
    
}
