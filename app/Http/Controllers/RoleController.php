<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $roles = Role::get();
       return view("role.add",compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $roles = Role::get();
       return view("role.add",compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        return redirect()->back()->with("success","Role Added Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::get();
        $editRole = Role::find($id);
        return view("role.add",compact('editRole','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);
        $role->update(['name'=>$request->name]);
        return redirect()->route('admin.role.index')->with('success',"Role Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function rolePermission($id, Request $request){
        $role = Role::find($id);
        if($request->method() == "POST"){
            $role->syncPermissions($request->permission);
            session()->flash('success', 'Role Permissions Updated Successfully.');
        }
        $rolePermissions = $role->permissions;
        $permissions = Permission::get();
        $permissionArray = [];
        foreach ($permissions as $key => $item) {
            $name = $item->name;
            $status = '';
            foreach ($rolePermissions as $key => $inner) {
                if($status = $inner->name == $name){
                    break;
                }
            }
            $permissionArray[] = ['name'=>$name,'status'=>$status];
        }
        // dd($permissionArray);
        return view("role.role_permission",compact('role','permissions','permissionArray'));
    }
    public function assignUserRole(Request $request){
        // dd("kjfd");
        if($request->method() == "GET"){
            $users = User::where('seller_status','<>',0)->get();
            return view("role.list",compact('users'));

        }
        if($request->method() == "POST"){
            $user = User::find($request->user_id);
            // dd($request->all());
            $user->syncRoles($request->role);
        }
        // $userPermissions = $user->permissions;
        // $permissions = Permission::get();


        return redirect()->back()->with('success',"User Role Added Successfully");

    }
    public function getUserRole(Request $request){
        $user = User::find($request->id);
        $role = $user->getRoleNames();
        return $role;
    }
}
