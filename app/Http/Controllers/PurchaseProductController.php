<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\Product;
use App\Models\Storage;
use Illuminate\Http\Request;
use App\Models\GovernmentStorage;
use App\Http\Controllers\Controller;

class PurchaseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Purchase = Storage::with('farmer','governmentStorage','product')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $governmentStorage = GovernmentStorage::get();
        $farmer = Farmer::get();
        $product = Product::get();
        return view('purchase_product.add',compact('governmentStorage','farmer','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
