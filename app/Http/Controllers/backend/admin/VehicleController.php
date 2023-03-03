<?php

namespace App\Http\Controllers\backend\admin;

use App\Models\Finance;
use App\Models\Smoking;
use App\Models\ToolPack;
use App\Models\VCLogBook;
use App\Models\NumberOfKey;
use App\Models\PrivatePlate;
use App\Models\SeatMaterial;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;
use App\Models\VehicleFeature;
use App\Models\LockingWheelNut;
use App\Models\vehicleInformation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\VehicleHistory;

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
    public function ViewNumberOfkeys()
    {
        $ViewNumberOfkeys = NumberOfKey::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewNumberOfKeys',compact('ViewNumberOfkeys'));
    }
    public function ViewToolPack()
    {
        $ViewToolPacks = ToolPack::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewToolPack',compact('ViewToolPacks'));
    }
    public function viewWheelNut()
    {
        $viewLockingWheelNuts = LockingWheelNut::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewWheelNut',compact('viewLockingWheelNuts'));
    }
    public function viewSmooking()
    {
        $viewSmokings = Smoking::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewSmooking',compact('viewSmokings'));
    }

        public function viewlogbook()
    {
        $viewLoogBooks = VCLogBook::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewLogBooks',compact('viewLoogBooks'));
    }

    public function viewVehicalOwner()
    {
        $viewVehicleOwners = VehicleOwner::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewVehicleOwner',compact('viewVehicleOwners'));
    }
    public function viewPrivatePlate()
    {
        $viewPrivatePlates = PrivatePlate::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewPrivatePlate',compact('viewPrivatePlates'));
    }
    public function viewFinance()
    {
        $viewFinances = Finance::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewFinance',compact('viewFinances'));
    }
    public function viewVehicleHistory()
    {
        $viewVehicleHistories = VehicleHistory::where('status',1)->orderBy('id', 'DESC')->get();

        return view('backend.admin.vehicles.viewVehicleHistory',compact('viewVehicleHistories'));
    }
    public function createVehicleFeatureForm()
    {

        return view('backend.admin.vehicles.createVehicleFeatureForm');
    }
    public function createVehicleHistoryForm()
    {

        return view('backend.admin.vehicles.createVehicleHistoryForm');
    }
    public function createNumberOfkeysForm()
    {

        return view('backend.admin.vehicles.createNumberOfKeys');
    }
    public function createToolPackForm()
    {

        return view('backend.admin.vehicles.createToolPack');
    }

    public function createSeatMaterialForm()
    {

        return view('backend.admin.vehicles.createSeatMaterial');
    }

    public function createWheelNutForm()
    {

        return view('backend.admin.vehicles.createWheelNut');
    }
    public function createLogBookForm()
    {

        return view('backend.admin.vehicles.createLogBook');
    }
    public function createSmookingForm()
    {

        return view('backend.admin.vehicles.createSmooking');
    }
    public function createVehicleOwnerForm()
    {

        return view('backend.admin.vehicles.createVehicleOwner');
    }
    public function createPrivatePlateForm()
    {

        return view('backend.admin.vehicles.createPrivatePlate');
    }

    public function createFinanceForm()
    {
        return view('backend.admin.vehicles.createFinanceForm');
    }
    public function storeSeatMaterial(Request $request)
    {
            $request->validate([
                'addMoreInputFields.*.title' => 'required|max:256'
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

    public function storePrivatePlate(Request $request)
    {
            $request->validate([
                'addMoreInputFields.*.title' => 'required|max:256'
            ]);
            DB::beginTransaction();
            try{
            foreach($request->addMoreInputFields as $data) {


                    $seat_material_iamges = time() . '_' . $data['image']->getClientOriginalName();

                    $data['image']->move(public_path() . '/plates/private_plate_iamges/', $seat_material_iamges);

                    $seatMaterial = new PrivatePlate();
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

         return redirect()->route('viewPrivatePlate')->with('success', 'Private Plate added  Successfully!');

    }
    public function storeFinance(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.title' => 'required|max:256'
        ]);
        DB::beginTransaction();
        try{
        foreach ($request->addMoreInputFields as $key => $value) {
            Finance::create($value);
        }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
        return redirect()->route('viewFinance')->with('success', 'Finance added  Successfully!');

    }
    
    public function storeVehicleHistory(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.title' => 'required|max:256'
        ]);
        DB::beginTransaction();
        try{
        foreach ($request->addMoreInputFields as $key => $value) {
            VehicleHistory::create($value);
        }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
        return redirect()->route('viewVehicleHistory')->with('success', 'Vehicle History added  Successfully!');

    }

    public function storeNumberOfKeys(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.number_of_key' => 'required|max:256'
        ]);
        DB::beginTransaction();
        try{
        foreach ($request->addMoreInputFields as $key => $value) {
            NumberOfKey::create($value);
        }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
        return redirect()->route('ViewNumberOfkeys')->with('success', 'Keys added  Successfully!');
        //return back()->with('success', 'New title has been added.');
    }
    public function storeToolPack(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'addMoreInputFields.*.title' => 'required|max:256'
        ]);
        DB::beginTransaction();
        try{
        foreach ($request->addMoreInputFields as $key => $value) {
            ToolPack::create($value);
        }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
        return redirect()->route('ViewToolPack')->with('success', 'Tool Pack added  Successfully!');
        //return back()->with('success', 'New title has been added.');
    }
    public function storeWheelNut(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'addMoreInputFields.*.title' => 'required|max:256'
        ]);
        DB::beginTransaction();
        try{
        foreach ($request->addMoreInputFields as $key => $value) {
            LockingWheelNut::create($value);
        }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
        return redirect()->route('viewWheelNut')->with('success', 'Wheel Nut added  Successfully!');
        //return back()->with('success', 'New title has been added.');
    }
    public function storeSmooking(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'addMoreInputFields.*.title' => 'required|max:256'
        ]);
        DB::beginTransaction();
        try{
        foreach ($request->addMoreInputFields as $key => $value) {
            Smoking::create($value);
        }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
        return redirect()->route('viewSmooking')->with('success', 'Smoking Question added  Successfully!');
        //return back()->with('success', 'New title has been added.');
    }
    public function storeLogBook(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'addMoreInputFields.*.title' => 'required|max:256'
        ]);
        DB::beginTransaction();
        try{
        foreach ($request->addMoreInputFields as $key => $value) {
            VCLogBook::create($value);
        }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
        return redirect()->route('viewlogbook')->with('success', 'LogBook Question added  Successfully!');
        //return back()->with('success', 'New title has been added.');
    }
    public function storeVehicleOwner(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'addMoreInputFields.*.title' => 'required|max:256'
        ]);
        DB::beginTransaction();
        try{
        foreach ($request->addMoreInputFields as $key => $value) {
            VehicleOwner::create($value);
        }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
        return redirect()->route('viewVehicalOwner')->with('success', 'Vehcile Owner Question added  Successfully!');
        //return back()->with('success', 'New title has been added.');
    }

    public function editSeatMaterialForm($id)
    {
        $editSeatMaterial = SeatMaterial::where('id',$id)->first();
        return view('backend.admin.vehicles.editSeatMaterialForm',compact('editSeatMaterial'));
    }
    public function editFinanceForm($id)
    {
        $editFinance = Finance::where('id',$id)->first();
        return view('backend.admin.vehicles.editFinanceForm',compact('editFinance'));
    }
    public function editPrivatePlateForm($id)
    {
        $editPrivatePlate = PrivatePlate::where('id',$id)->first();
        return view('backend.admin.vehicles.editPrivatePlateForm',compact('editPrivatePlate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.title' => 'required|max:256'
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
    public function editKeysForm($id)
    {
        $editKeys = NumberOfKey::where('id',$id)->first();
        return view('backend.admin.vehicles.editNumberOfKeysForm',compact('editKeys'));

    }

    public function editToolPackForm($id)
    {
        $editToolPack = ToolPack::where('id',$id)->first();

        return view('backend.admin.vehicles.editToolPackForm',compact('editToolPack'));

    }
    public function editWheelNutForm($id)
    {
        $editLockingWheelNut = LockingWheelNut::where('id',$id)->first();

        return view('backend.admin.vehicles.editWheelNutForm',compact('editLockingWheelNut'));

    }
    public function editSmookingForm($id)
    {
        $editSmoking = Smoking::where('id',$id)->first();

        return view('backend.admin.vehicles.editSmookingForm',compact('editSmoking'));

    }
    public function editLogBookForm($id)
    {
        $editLogBook = VCLogBook::where('id',$id)->first();

        return view('backend.admin.vehicles.editLogBookForm',compact('editLogBook'));

    }
    public function editVehicalOwnerForm($id)
    {
        $editVehicleOwner = VehicleOwner::where('id',$id)->first();

        return view('backend.admin.vehicles.editVehicleOwnerForm',compact('editVehicleOwner'));

    }

    public function editVehicleFeature(Request $request,$id)
    {
        $data = [
            'title'=>$request->title
        ];
        VehicleFeature::where('id',$id)->update($data);

        return redirect()->route('ViewVehicleFeatures')->with('success', 'Vehicle Feature Updated  Successfully!');

    }
    public function updateKey(Request $request,$id)
    {
        $data = [
            'number_of_key'=>$request->number_of_key
        ];
        NumberOfKey::where('id',$id)->update($data);

        return redirect()->route('ViewNumberOfkeys')->with('success', 'Key Updated  Successfully!');

    }
    public function updateToolPack(Request $request,$id)
    {

        $data = [
            'title'=>$request->title
        ];
        ToolPack::where('id',$id)->update($data);

        return redirect()->route('ViewToolPack')->with('success', 'ToolPack Updated  Successfully!');

    }
    public function updateWheelNut(Request $request,$id)
    {

        $data = [
            'title'=>$request->title
        ];
        LockingWheelNut::where('id',$id)->update($data);

        return redirect()->route('viewWheelNut')->with('success', 'Wheel Nut Updated  Successfully!');

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

    public function updatePrivatePlate(Request $request, $id)
    {


        $request->validate([
            'title' => 'required'
        ]);

        try{
            $PrivatePlate = PrivatePlate::find($id);


            $PrivatePlate->title = $request->title;
            if( $request->file('image')){

                if(file_exists(public_path("/plates/private_plate_iamges/".$PrivatePlate->image))){
                    unlink(public_path("/plates/private_plate_iamges/".$PrivatePlate->image));
                  }
                $private_plate_images = time() . '_' . $request->file('image')->getClientOriginalName();
                    //            $product_image_first_path = $request->file('product_image_first')->storeAs('products', $product_image_first);
                $request->file('image')->move(public_path() . '/plates/private_plate_iamges/', $private_plate_images);

            $PrivatePlate->image = $private_plate_images;
            }
            $PrivatePlate->update();

        }catch(\Exception $e){
            return $e->getMessage();
    }

    return redirect()->route('viewPrivatePlate')->with('success', 'Private Plated updated  Successfully!');

    }
    public function updateFinance(Request $request,$id)
    {

        $data = [
            'title'=>$request->title
        ];
        Finance::where('id',$id)->update($data);

        return redirect()->route('viewFinance')->with('success', 'Finance Updated  Successfully!');

    }
    public function updateSmooking(Request $request,$id)
    {

        $data = [
            'title'=>$request->title
        ];
        Smoking::where('id',$id)->update($data);

        return redirect()->route('viewSmooking')->with('success', 'Smooking Question Updated  Successfully!');

    }
    public function updateLogBook(Request $request,$id)
    {

        $data = [
            'title'=>$request->title
        ];
        VCLogBook::where('id',$id)->update($data);

        return redirect()->route('viewlogbook')->with('success', 'LogBook Question Updated  Successfully!');

    }
    public function updateVehicleOwner(Request $request,$id)
    {


        $data = [
            'title'=>$request->title
        ];
        VehicleOwner::where('id',$id)->update($data);

        return redirect()->route('viewVehicalOwner')->with('success', 'Vehicle Owner Question Updated  Successfully!');

    }

    public function deleteVehicleFeature($id)
    {
        $vehicleInformation = vehicleInformation::whereRaw('FIND_IN_SET(?, vehicle_feature_id)', $id)->first();
        if($vehicleInformation){

            return redirect()->route('ViewVehicleFeatures')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{

            VehicleFeature::where('id',$id)->delete();
            return redirect()->route('ViewVehicleFeatures')->with('error', 'Vehicle Feature Deleted  Successfully!');
        }

    }
    public function deleteKey($id)
    {
        $vehicleInformation = vehicleInformation::where('number_of_keys_id', $id)->first();
        if($vehicleInformation){

            return redirect()->route('ViewNumberOfkeys')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{
        NumberOfKey::where('id',$id)->delete();
        return redirect()->route('ViewNumberOfkeys')->with('error', 'Key  Deleted  Successfully!');
        }
    }
    public function deleteToolPack($id)
    {
        $vehicleInformation = vehicleInformation::where('tool_pack_id', $id)->first();
        if($vehicleInformation){

            return redirect()->route('ViewToolPack')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{
        ToolPack::where('id',$id)->delete();
        return redirect()->route('ViewToolPack')->with('error', 'Tool Kit  Deleted  Successfully!');
        }
    }
    public function deleteWheelNut($id)
    {
        $vehicleInformation = vehicleInformation::where('looking_wheel_nut_id', $id)->first();
        if($vehicleInformation){

            return redirect()->route('viewWheelNut')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{
        LockingWheelNut::where('id',$id)->delete();
        return redirect()->route('viewWheelNut')->with('error', 'Wheel Nut Question  Deleted  Successfully!');
        }
    }
    public function deleteSmooking($id)
    {
        $vehicleInformation = vehicleInformation::where('smooking_id', $id)->first();
        if($vehicleInformation){

            return redirect()->route('viewSmooking')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{
        Smoking::where('id',$id)->delete();
        return redirect()->route('viewSmooking')->with('error', 'Smooking Question  Deleted  Successfully!');
        }
    }
    public function deleteLogBook($id)
    {
        $vehicleInformation = vehicleInformation::where('logbook_id', $id)->first();
        if($vehicleInformation){

            return redirect()->route('viewlogbook')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{
        VCLogBook::where('id',$id)->delete();
        return redirect()->route('viewlogbook')->with('error', 'LogBook Question  Deleted  Successfully!');
        }
    }
    public function deleteFinance($id)
    {
        $vehicleInformation = vehicleInformation::where('finance_id', $id)->first();
        if($vehicleInformation){

            return redirect()->route('viewFinance')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{
        Finance::where('id',$id)->delete();
        return redirect()->route('viewFinance')->with('error', 'Finance  Deleted  Successfully!');
        }
    }
    public function deleteVehcileOwner($id)
    {
        $vehicleInformation = vehicleInformation::where('vehicle_owner_id', $id)->first();
        if($vehicleInformation){

            return redirect()->route('viewVehicalOwner')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{
        VehicleOwner::where('id',$id)->delete();
        return redirect()->route('viewVehicalOwner')->with('error', 'Vehical Owner Question  Deleted  Successfully!');
        }
    }
    public function deletePrivatePlate($id)
    {
        $vehicleInformation = vehicleInformation::where('private_plate_id', $id)->first();
        if($vehicleInformation){

            return redirect()->route('viewPrivatePlate')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{
        $SeatMaterial = PrivatePlate::where('id',$id)->first();
        if(isset($SeatMaterial))
        {
        try{
          if(file_exists(public_path("/plates/private_plate_iamges/".$SeatMaterial->image))){
              unlink(public_path("/plates/private_plate_iamges/".$SeatMaterial->image));
            }
               }catch(\Exception $e){
                return $e->getMessage();
          }

          PrivatePlate::where('id',$id)->delete();

        }

        return redirect()->route('viewPrivatePlate')->with('error', 'Private Plate Deleted  Successfully!');
    }
    }
    public function deleteSeatMaterial($id)
    {
        $vehicleInformation = vehicleInformation::where('seat_material_id', $id)->first();
        if($vehicleInformation){

            return redirect()->route('ViewSeatMaterials')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{
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


}
