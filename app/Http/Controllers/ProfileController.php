<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // direct admin profile page
    public function index() {
        $id = Auth::user()->id;

        $role = Role::get();
        $user = User::select('id','name','username', 'role_id', 'phone','address','gender', 'is_active', 'email')->where('id',$id)->first();

        return view('admin.users.profile',compact('role','user'));
    }

    // update admin account
    public function updateAdmin(Request $request) {
        $userData = $this->getUserInfo($request);

        $validator = $this->userValidation($request);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        User::where('id',Auth::user()->id)->update($userData);
        return back()->with(['updateSuccess'=>'Account Updated!']);
    }

    // change password page
    public function changePasswordPage() {
        return view('admin.users.changepassword');
    }

    // change password
    public function changePassword(Request $request) {
        $validator = $this->changePasswordValidation($request);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $dbData = User::where('id',Auth::user()->id)->first();

        $updateData = [
            'password' => Hash::make($request->adminNewPassword) ,
            'updated_at' => Carbon::now()
        ];

        if(Hash::check($request->adminOldPassword, $dbData->password)) {
            User::where('id',Auth::user()->id)->update($updateData);
            return redirect()->route('admin#profile');
        } else {
            return back()->with(['fail'=>'Old Password Do Not Match!']);
        }
    }

    // get user info
    private function getUserInfo($request) {
        return [
            'name' => $request->adminName ,
            'username' => $request->adminUsername ,
            'email' => $request->adminEmail ,
            'role_id' => $request->adminRole ,
            'phone' => $request->adminPhone ,
            'address' => $request->adminAddress ,
            'gender' => $request->adminGender == 'on' ? 1 : 0 ,
            'is_active' => $request->adminIsactive == 'on' ? 1 : 0 ,
            'updated_at' => Carbon::now()
        ];
    }

    // user validation
    private function userValidation($request) {
        return Validator::make($request->all(), [
            'adminName' => 'required',
            'adminEmail' => 'required',
        ]);
    }

    // password validation
    private function changePasswordValidation($request) {
        $validationRules = [
            'adminOldPassword' => 'required',
            'adminNewPassword' => 'required|min:8|max:15',
            'adminConfirmPassword' => 'required|same:adminNewPassword|min:8|max:15',
        ];

        $validationMessages = [
            'adminConfirmPassword.same' => 'New Password & Confirm Password must be same!'
        ];

        return Validator::make($request->all(), $validationRules,$validationMessages);
    }
}
