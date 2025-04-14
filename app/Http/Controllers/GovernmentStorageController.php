<?php

namespace App\Http\Controllers;

use App\Models\Union;
use App\Models\Upazila;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Models\GovernmentStorage;
use App\Http\Controllers\Controller;

class GovernmentStorageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governmentStorage = GovernmentStorage::with('division','district','upazila','union')->get();
        return view('government_storage.list',compact('governmentStorage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $division = Division::get();
        return view('government_storage.add',compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            "division_id" => "required",
            "district_id" => "required",
            "upazila_id" => "required",
            "union_id" => "required",
            "name" => "required",
            "address" => "required",
        ]);
        $governmentStorage = new GovernmentStorage();
        $governmentStorage->division_id = $request->division_id;
        $governmentStorage->district_id = $request->district_id;
        $governmentStorage->upazila_id = $request->upazila_id;
        $governmentStorage->union_id = $request->union_id;
        $governmentStorage->name = $request->name;
        $governmentStorage->address = $request->address;
        $governmentStorage->save();
        return redirect()->route("admin.government_storage.index")->with("success","Storage added successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(GovernmentStorage $governmentStorage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GovernmentStorage $governmentStorage)
    {
        $data["division"] = Division::get();
        $data["governmentStorage"] = $governmentStorage;
        $data["district"] = Division::get();
        $data["upazila"] = Upazila::get();
        $data["union"] = Union::get();
        return view('government_storage.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GovernmentStorage $governmentStorage)
    {
        $this->validate($request, [
            "division_id" => "required",
            "district_id" => "required",
            "upazila_id" => "required",
            "union_id" => "required",
            "name" => "required",
            "address" => "required",
        ]);

        $governmentStorage->division_id = $request->division_id;
        $governmentStorage->district_id = $request->district_id;
        $governmentStorage->upazila_id = $request->upazila_id;
        $governmentStorage->union_id = $request->union_id;
        $governmentStorage->name = $request->name;
        $governmentStorage->address = $request->address;
        $governmentStorage->save();
        return redirect()->route("admin.government_storage.index")->with("success","Storage Updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GovernmentStorage $governmentStorage)
    {
        //
    }
}
