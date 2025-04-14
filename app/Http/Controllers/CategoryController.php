<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("sale_category.category", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("sale_category.category", compact("categories"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);
        $image_name = "";
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('category'),$image_name);
        }
        // $category = Category::create($request->all());
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->image = $image_name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view("sale_category.category", compact("categories",'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'image' => 'required',
            'description' => 'required',
        ]);
        $image_name = "";
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('category'),$image_name);
        }
        // $category = Category::create($request->all());

        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->image = $image_name?$image_name:$category->image;
        $category->description = $request->description;
        $category->status = $request->status;
        try {
            $category->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Category updated failed');
        }
   

        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // dd($category);
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully');
    }
}
