<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_cost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmerId = auth()->user()->farmer1?->id;;
        if($farmerId){
            $product_cost = Product_cost::with('product','farmer')->where('farmer_id',$farmerId)->get();
        }
        $product_cost = Product_cost::with('product','farmer')->get();
        return view('product_cost.list',compact('product_cost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();
        return view('product_cost.add',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            "product_id" => "required",
            "land" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "cost" => "required",
            "parpose" => "required",
        ]);
        $farmerId = auth()->user()->farmer1?->id;
        $productCost = new Product_cost();
        $productCost->product_id = $request->product_id;
        $productCost->farmer_id = $farmerId;
        $productCost->land = $request->land;
        $productCost->start_date = $request->start_date;
        $productCost->end_date = $request->end_date;
        $productCost->perpose = $request->parpose;
        $productCost->cost = $request->cost;
        $productCost->save();

        return redirect()->route('admin.product_cost.index')->with('success','Production Cost added successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Product_cost $product_cost)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productCost = Product_cost::with('product',"farmer")->find($id);
        $products = Product::get();
        return view('product_cost.edit',compact('productCost','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            "product_id" => "required",
            "land" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "cost" => "required",
            "parpose" => "required",
        ]);

        $productCost =  Product_cost::find($id);
        $productCost->product_id = $request->product_id;
        $productCost->land = $request->land;
        $productCost->start_date = $request->start_date;
        $productCost->end_date = $request->end_date;
        $productCost->perpose = $request->parpose;
        $productCost->cost = $request->cost;
        $productCost->save();
        return redirect()->route('admin.product_cost.index')->with('success','Production Cost Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product_cost $product_cost)
    {
        //
    }
}
