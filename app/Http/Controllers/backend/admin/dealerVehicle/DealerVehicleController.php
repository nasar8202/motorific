<?php

namespace App\Http\Controllers\backend\admin\dealerVehicle;

use App\Models\LiveSaleTime;
use Illuminate\Http\Request;
use App\Models\DealerVehicle;
use App\Models\DealerVehicleMedia;
use App\Models\DealerVehicleTyres;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DealerVehicleHistory;
use App\Models\DealerVehicleExterior;
use App\Models\DealerVehicleInterior;
use App\Models\DealerAdvertVehicleDetail;
use App\Models\DealerVehicleExteriorDetails;
use App\Models\DealerVehicleInteriorDetails;

class DealerVehicleController extends Controller
{
    public function viewDealerVehicle()
    {
        $DealerVehicles = DealerVehicle::with('DealerVehicleExterior')->get();
        // dd($DealerVehicles);
        return view('backend.admin.dealersVehicle.viewDealerVehicle',compact('DealerVehicles'));
    }
    public function dealerVehicleUpdatePrice(Request $request ,$id)
    {
        $request->validate([
           
            'retail_price' => 'required',
            'clean_price' => 'required',
            'average_price' => 'required',
            'hidden_price' => 'required',

        ]);
        $vehicle = DealerVehicle::where('id',$id)->first();
        $vehicle->vehicle_price = $request->retail_price;
        $vehicle->retail_price = $request->retail_price;
        $vehicle->clean_price = $request->clean_price;
        $vehicle->average_price = $request->average_price;
        $vehicle->hidden_price = $request->hidden_price;
        $vehicle->status = 1;
        

        $vehicle->save();
        return redirect()->route('viewDealerVehicle')->with('success', 'Vehicle Updated  Successfully!');
    }
    public function viewDealerVehicleDetail($id)
    {
        $vehicle = DealerVehicle::where('id',$id)
        ->with('DealerAdvertVehicleDetail')
        ->with('DealerVehicleExterior')
        ->with('DealerVehicleHistory')
        ->with('DealerVehicleInterior')
        ->with('DealerVehicleMedia')
        ->with('DealerVehicleInteriorDetails')
        ->with('DealerVehicleExteriorDetails')
        ->first();
        // $liveselltime = LiveSaleTime::first();
        // dd($vehicle);
        return view('backend.admin.dealersVehicle.editDealerVehicle',compact('vehicle'));
    }
    
    public function deleteDealerVehicle($id)
    {
        
        DB::beginTransaction();
        try{

       $DealerVehicle = DealerVehicle::find($id);
       $DealerAdvertVehicleDetail = DealerAdvertVehicleDetail::where('dealer_vehicle_id',$id)->first();
       $DealerVehicleHistory = DealerVehicleHistory::where('dealer_vehicle_id',$id)->first();
       $DealerVehicleMedia = DealerVehicleMedia::where('dealer_vehicle_id',$id)->first();
       $DealerVehicleInteriorDetails = DealerVehicleInteriorDetails::where('dealer_vehicle_id',$id)->first();
       $DealerVehicleExteriorDetails = DealerVehicleExteriorDetails::where('dealer_vehicle_id',$id)->first();
       $DealerVehicleInterior = DealerVehicleInterior::where('dealer_vehicle_id',$id)->get();
       $DealerVehicleExterior = DealerVehicleExterior::where('dealer_vehicle_id',$id)->get();
       $DealerVehicleTyres = DealerVehicleTyres::where('dealer_vehicle_id',$id)->get();
       $DealerVehicle->delete();
       $DealerAdvertVehicleDetail->delete();
       $DealerVehicleHistory->delete();
       $DealerVehicleMedia->delete();
       if($DealerVehicleInteriorDetails != null){
       $DealerVehicleInteriorDetails->delete();
    }
    if($DealerVehicleExteriorDetails != null){
       $DealerVehicleExteriorDetails->delete();
    }

        foreach($DealerVehicleInterior as $Interior){
          if(file_exists(public_path("/uploads/DealerVehicles/interior/".$Interior->interior_image))){
            unlink(public_path("/uploads/DealerVehicles/interior/".$Interior->interior_image));
          }
          $Interior->delete();
        }
        foreach($DealerVehicleExterior as $Exterior){
          if(file_exists(public_path("/uploads/DealerVehicles/exterior/".$Exterior->exterior_image))){
            unlink(public_path("/uploads/DealerVehicles/exterior/".$Exterior->exterior_image));
          }
          $Exterior->delete();              
        }
        foreach($DealerVehicleTyres as $Tyres){
          if(file_exists(public_path("/uploads/DealerVehicles/tyres/".$Tyres->tyre_image))){
            unlink(public_path("/uploads/DealerVehicles/tyres/".$Tyres->tyre_image));
          }
       $Tyres->delete();
        }

         

    }
    catch(\Exception $e)
    {
        DB::rollback();
        return Redirect()->back()
            ->with('error',$e->getMessage() )
            ->withInput();
    }
    DB::commit();
    return redirect()->route('viewDealerVehicle')->with('success', 'Vehicle Deleted  Successfully!');
}

}
