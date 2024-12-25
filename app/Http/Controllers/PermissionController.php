<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index()
    {
       $permissions = Permission::orderBy('id',"DESC")->get();
       return view("permission.add",compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $permissions = Permission::orderBy('id',"DESC")->get();
       return view("permission.add",compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = Permission::create(['name' => $request->name]);
        return redirect()->back()->with("success","Permission Added Successfully");
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
        $permissions = Permission::orderBy('id',"DESC")->get();
        $editPermission = Permission::find($id);
        return view("permission.add",compact('editPermission','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::find($id);
        $permission->update(['name'=>$request->name]);
        return redirect()->route('admin.permission.index')->with('success',"Permission Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   
}
