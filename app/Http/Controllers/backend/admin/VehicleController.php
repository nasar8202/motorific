<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Models\SeatMaterial;
use DB;
class VehicleController extends Controller
{

    public function ViewVehicleFeatures()
    {
        $VehicleFeatures = VehicleFeature::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewVehicleFeatures',compact('VehicleFeatures'));
    }
    public function ViewSeatMaterials()
    {
        $SeatMaterials = SeatMaterial::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewSeatMaterials',compact('SeatMaterials'));
    }
    public function createVehicleFeatureForm()
    {

        return view('backend.admin.vehicles.createVehicleFeatureForm');
    }

    public function createSeatMaterialForm()
    {

        return view('backend.admin.vehicles.createSeatMaterial');
    }

    public function storeSeatMaterial(Request $request)
    {
            $request->validate([
                'addMoreInputFields.*.title' => 'required'
            ]);
            DB::beginTransaction();
            try{
            foreach($request->addMoreInputFields as $data) {


                    $seat_material_iamges = time() . '_' . $data['image']->getClientOriginalName();

                    $data['image']->move(public_path() . '/materials/seat_material_iamges/', $seat_material_iamges);

                    $seatMaterial = new SeatMaterial();
                    $seatMaterial->image = $seat_material_iamges;
                    $seatMaterial->title = $data['title'];
                    $seatMaterial->save();


            }
            }catch(\Exception $e)
            {
                DB::rollback();
                return Redirect()->back()
                    ->with('error',$e->getMessage() )
                    ->withInput();
            }
            DB::commit();

         return redirect()->route('ViewSeatMaterials')->with('success', 'Seat Material added  Successfully!');

    }
    public function editSeatMaterialForm($id)
    {
        $editSeatMaterial = SeatMaterial::where('id',$id)->first();
        return view('backend.admin.vehicles.editSeatMaterialForm',compact('editSeatMaterial'));
    }
    public function updateSeatMaterial(Request $request, $id)
    {


        $request->validate([
            'title' => 'required'
        ]);

        try{
            $SeatMaterial = SeatMaterial::find($id);


            $SeatMaterial->title = $request->title;
            if( $request->file('image')){

                if(file_exists(public_path("/materials/seat_material_iamges/".$SeatMaterial->image))){
                    unlink(public_path("/materials/seat_material_iamges/".$SeatMaterial->image));
                  }
                $seat_material_images = time() . '_' . $request->file('image')->getClientOriginalName();
                    //            $product_image_first_path = $request->file('product_image_first')->storeAs('products', $product_image_first);
                $request->file('image')->move(public_path() . '/materials/seat_material_iamges/', $seat_material_images);

            $SeatMaterial->image = $seat_material_images;
            }
            $SeatMaterial->update();

        }catch(\Exception $e){
            return $e->getMessage();
    }

    return redirect()->route('ViewSeatMaterials')->with('success', 'Seat Material updated  Successfully!');

    }
    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.title' => 'required'
        ]);
        DB::beginTransaction();
        try{
        foreach ($request->addMoreInputFields as $key => $value) {
            VehicleFeature::create($value);
        }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
        return redirect()->route('ViewVehicleFeatures')->with('success', 'Vehicle Feature added  Successfully!');
        //return back()->with('success', 'New title has been added.');
    }
    public function editVehicleFeatureForm($id)
    {
        $editVehicle = VehicleFeature::where('id',$id)->first();
        return view('backend.admin.vehicles.editVehicleFeatureForm',compact('editVehicle'));

    }
    public function editVehicleFeature(Request $request,$id)
    {
        $data = [
            'title'=>$request->title
        ];
        VehicleFeature::where('id',$id)->update($data);

        return redirect()->route('ViewVehicleFeatures')->with('success', 'Vehicle Feature Updated  Successfully!');

    }

    public function deleteVehicle($id)
    {
        VehicleFeature::where('id',$id)->delete();
        return redirect()->route('ViewVehicleFeatures')->with('error', 'Vehicle Feature Deleted  Successfully!');
    }
    public function deleteSeatMaterial($id)
    {
        $SeatMaterial = SeatMaterial::where('id',$id)->first();
        if(isset($SeatMaterial))
        {
        try{
          if(file_exists(public_path("materials/seat_material_iamges/".$SeatMaterial->image))){
              unlink(public_path("materials/seat_material_iamges/".$SeatMaterial->image));
            }
               }catch(\Exception $e){
                return $e->getMessage();
          }

          SeatMaterial::where('id',$id)->delete();

        }

        return redirect()->route('ViewSeatMaterials')->with('error', 'Seat Material Deleted  Successfully!');
    }


}
