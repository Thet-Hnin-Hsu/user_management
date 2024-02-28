<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    // direct user list page
    public function userList() {
        $userData = User::select('id','name','username','role_id','phone','address','gender','is_active','email')->get();
        return view('admin.users.user_list', compact('userData'));
    }

    // delete account
    public function deleteAccount($id) {
        User::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'User Account Deleted!']);
    }

    // user list search
    public function userListSearch(Request $request) {
        $userData = User::orWhere('name', 'LIKE', '%'.$request->userSearch.'%')
        ->orWhere('email', 'LIKE', '%'.$request->userSearch.'%')
        ->orWhere('phone', 'LIKE', '%'.$request->userSearch.'%')
        ->orWhere('address', 'LIKE', '%'.$request->userSearch.'%')
        ->orWhere('gender', 'LIKE', '%'.$request->userSearch.'%')
        ->get();
        return view('admin.users.user_list', compact('userData'));
    }

    // direct admin vew page
    public function adminView($id) {
        $role = Role::get();
        $userData = User::where('id',$id)->first();
        return view('admin.users.view', compact('role','userData'));
    }
}
