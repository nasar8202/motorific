<?php

namespace App\Http\Controllers\backend\admin\Categories;

use Illuminate\Http\Request;
use App\Models\vehicleCategories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;

class VehicleCategory extends Controller
{
    public function viewCategories()
    {

        $categories = vehicleCategories::all();
        return view('backend.admin.categories.viewCategories',compact('categories'));
    }

    public function createCategoryForm()
    {

        return view('backend.admin.categories.createCategories');
    }



    public function storeCategories(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'addMoreInputFields.*.title' => 'required|max:256'
        ]);
        DB::beginTransaction();
        try{
        foreach ($request->addMoreInputFields as $key => $value) {
            vehicleCategories::create($value);
        }
        }catch(\Exception $e)
        {
            DB::rollback();
            return Redirect()->back()
                ->with('error',$e->getMessage() )
                ->withInput();
        }
        DB::commit();
        return redirect()->route('viewCategories')->with('success', 'Vehicle Category added  Successfully!');
        //return back()->with('success', 'New title has been added.');
    }

    public function deleteCategory($id)
    {
        $vehicleInformation = Vehicle::where('vehicle_category', $id)->first();
        if($vehicleInformation){

            return redirect()->route('viewCategories')->with('error', "You Can't Delete this Item Because It Already Exists in Vehicles !");
        }else{
        vehicleCategories::where('id',$id)->delete();
        return redirect()->route('viewCategories')->with('error', 'Vehicle Category Deleted  Successfully!');
        }
    }

    public function editCategory($id)
    {
        $editCategory = vehicleCategories::where('id',$id)->first();

        return view('backend.admin.categories.editCategoriesForm',compact('editCategory'));

    }

    public function updateCategories(Request $request,$id)
    {

        $data = [
            'title'=>$request->title
        ];
        vehicleCategories::where('id',$id)->update($data);

        return redirect()->route('viewCategories')->with('success', 'Vehicle Updated  Successfully!');

    }
}
