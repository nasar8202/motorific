<?php

namespace App\Http\Controllers\backend\admin\userdetails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function viewUsers()
    {
        $viewUsers = User::whereIn('status', array(1, 2))->where('role_id',2)->orderBy('id', 'DESC')->get();

        return view('backend.admin.userDetails.userDetails',compact('viewUsers'));
    }

    public function deleteUser($id)
    {
        $deleteUser = User::where('id',$id)->first();

        $deleteUser->status = 2;
        $deleteUser->save();
        return redirect()->route('viewUsers')->with('error', 'User Disabled Successfully!');

    }
    public function enableUser($id)
    {
        $deleteUser = User::where('id',$id)->first();

        $deleteUser->status = 1;
        $deleteUser->save();
        return redirect()->route('viewUsers')->with('success', 'User Enabled Successfully!');

    }
    public function markAsContacted($id)
    {
        $deleteUser = User::where('id',$id)->first();

        $deleteUser->contact_status = 1;
        $deleteUser->save();
        return redirect()->route('viewUsers')->with('success', 'User Marked As Contact Successfully ✔');

    }
    public function editUserForm($id)
    {
        $editUserForm = User::where('id',$id)->first();

        return view('backend.admin.userDetails.editUserForm',compact('editUserForm'));
    }

    public function updateUser(Request $request,$id)
    {
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->number,
            'post_code'=>$request->code,
        ];
        User::where('id',$id)->update($data);

        return redirect()->route('viewUsers')->with('success', 'Users Updated  Successfully!');

    }

}
