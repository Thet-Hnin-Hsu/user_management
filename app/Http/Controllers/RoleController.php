<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    // direct role list page
    public function index() {
        $role = Role::get();
        return view('admin.users.role',compact('role'));
    }

    // direct add role page
    public function addRole() {
        return view('admin.users.add_role');
    }

    // create role
    public function createRole(Request $request) {
        $validator = $this->roleValidation($request);

        if($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $this->getRoleData($request);
        Role::create($data);
        return redirect()->route('admin#role');
    }

    // delete role
    public function deleteRole($id) {
        Role::where('role_id',$id)->delete();
        return redirect()->route('admin#role');
    }

    // search role
    public function searchRole(Request $request) {
        $role = Role::where('name','LIKE','%'.$request->searchrole.'%')->get();
        return view('admin.users.role',compact('role'));
    }

    // view role page
    public function viewRole($id) {
        $role = Role::where('role_id',$id)->first();
        return view('admin.users.view_role',compact('role'));
    }

    // update role
    public function updateRole($id, Request $request) {
        $validator = $this->roleValidation($request);

        if($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $updateData = $this->getUpdateRole($request);
        Role::where('role_id',$id)->update($updateData);
        return redirect()->route('admin#role');
    }

    // get role data
    private function getRoleData($request) {
        return [
            'name' => $request->roleName ,
        ];
    }

    // get update role data
    private function getUpdateRole($request) {
        return [
            'name' => $request->roleName ,
            'updated_at' => Carbon::now()
        ];
    }

    // role validation check
    private function roleValidation($request) {
        $validationRules = [
            'roleName' => 'required' ,
        ];
        return Validator::make($request->all(),$validationRules);
    }
}
