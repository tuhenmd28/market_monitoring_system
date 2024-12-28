<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $categories = ProductType::all();
        return view("sale_category.product_type", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductType::all();
        return view("sale_category.product_type", compact("categories"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $category = ProductType::create($request->all());
        return redirect()->route('admin.product_type.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = ProductType::all();
        // dd($id);
        $category = ProductType::find($id);
        return view("sale_category.product_type", compact("categories",'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        // dd($request->all());
        $category = ProductType::find($id);
        $category->name = $request->name;
        $category->status = $request->status;

        $category->save();
        return redirect()->route('admin.product_type.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $category)
    {
        // dd($category);
        $category->delete();
        return redirect()->route('admin.product_type.index')->with('success', 'Category deleted successfully');
    }

}
