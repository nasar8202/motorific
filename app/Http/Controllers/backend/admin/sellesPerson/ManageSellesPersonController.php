<?php

namespace App\Http\Controllers\backend\admin\sellesPerson;
use App\Models\User;
use App\Jobs\SellerDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ManageSellesPersonController extends Controller
{
    public function createSellesPersonForm()
    {
        return view('backend.admin.manageSellesPerson.createSellesPersonForm');
    }

    public function StoreSellesPerson(Request $request)
    {

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50|string|regex:/[a-zA-Z]+$/u',
                'email' => 'required|string|email|max:50|unique:users|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'phone_number' => 'min:9|max:16',
    
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $zip = ($request->post_code);
            $postcode = str_replace(' ', '', $zip);
    
            $password = Str::random(10);
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = 4;
            $user->post_code = $postcode;
         
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($password);
            $user->save();
           
            $details = [
                'greeting' => $user->name,
                'email' => $user->email,
                'body' => $password,
                'body1' => $user->post_code,
                'body2' => $user->name,
                'phone_number' => $user->phone_number,
                'thanks' => 'Thank you for using Motorfic.com ',
                'actionText' => 'Login',
                'actionURL' => url('/dealer-login'),
                'order_id' => 101
            ];
            //   dd($details);
            dispatch(new SellerDetail($details));
            return redirect()->route('viewVehicle')->with('success', 'Register Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
        

    }
    public  function viewSellerPersons()
    {
        $sellesPersons = User::where('role_id',4)->get();
        
       return view('backend.admin.manageSellesPerson.viewSellerPersons',compact('sellesPersons'));
    }

    public function sellesPersonEdit($id){
        $sellePerson  = User::where('id', $id)->first();
        return view('backend.admin.manageSellesPerson.editSellePersonForm', compact('sellePerson'));

    }
    public function updateSellePerson(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|string|regex:/[a-zA-Z]+$/u',
            'phone_number' => 'min:9|max:16',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        DB::beginTransaction();
        try {

            $zip = ($request->post_code);
            $postcode = str_replace(' ', '', $zip);
    
            $data = [
                'email'=>$request->email,
                'name'=>$request->name,
                'post_code'=>$postcode,
                'phone_number'=>$request->phone_number,
            ];
            
            // $user =  User::where('id',$id)->update($data);

            $seller = User::find($request->id);
            $seller->name = $request->name;
           
            $seller->post_code = $postcode;
            $seller->phone_number = $request->phone_number;
            // $seller->password = Hash::make($request->password);
            $seller->save();

                // dd($user);
        //    dd($seller);
            return redirect()->route('viewSellerPersons')->with('success', 'Updated Successfully!');
        } catch (\Exception $e) {
            
            DB::rollback();
            return Redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
        DB::commit();
    }

    public function blockSellesPerson($id)
    {
        $status = ['status'=>2];
        $seller = User::where('id',$id)->update($status);
        return redirect()->route('viewSellerPersons')->with('success', 'Blocked Successfully!');
           
           
    }
    public function unBlockSellesPerson($id)
    {
        
        $status = ['status'=>1];
        $seller = User::where('id',$id)->update($status);
        return redirect()->route('viewSellerPersons')->with('success', 'Unblocked Successfully!');
           
    }
}
?>