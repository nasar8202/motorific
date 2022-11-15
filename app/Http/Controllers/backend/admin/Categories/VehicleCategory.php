<?php

namespace App\Http\Controllers\backend\admin\Categories;

use Illuminate\Http\Request;
use App\Models\vehicleCategories;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
            'addMoreInputFields.*.title' => 'required'
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
        vehicleCategories::where('id',$id)->delete();
        return redirect()->route('viewCategories')->with('error', 'Vehicle Category Deleted  Successfully!');
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
