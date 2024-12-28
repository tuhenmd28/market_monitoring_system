<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category','type')->get();
        return view('product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        $productType = ProductType::where('status',1)->get();
        return view('product.add',compact('category','productType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'product_type_id' => 'required',
            'price' => 'required',
        ]);
        $image_name = "";
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('product'),$image_name);
        }
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->product_type_id = $request->product_type_id;
        $product->price = $request->price;
        $product->image = $image_name;
        $product->save();
        return redirect()->route('admin.product.index')->with('success','Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::where('status',1)->get();
        $productType = ProductType::where('status',1)->get();
        return view('product.edit',compact('category','productType','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'product_type_id' => 'required',
            'price' => 'required',
        ]);
        $image_name = $product->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('product'),$image_name);
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->product_type_id = $request->product_type_id;
        $product->price = $request->price;
        $product->image = $image_name;
        $product->save();
        return redirect()->route('admin.product.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
