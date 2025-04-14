<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ItemImage;
use App\Models\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category','images')->get();
        return view('product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        return view('product.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
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
        $product->description = $request->description;
        $product->start_price = $request->price;
        $product->seller_id = auth()->user()->id;
        $product->image = $image_name;
        $product->save();
        if ($request->hasFile('multiple')) {
            foreach ($request->file('multiple') as $img) {
                $imageName = date('YmdHis') . uniqid() . '.' . $img->getClientOriginalExtension();

                $img->move(public_path('product'), $imageName);

                $itemImage = new ItemImage();
                $itemImage->item_id = $product->id;
                $itemImage->image = $imageName;
                $itemImage->save();
            }
        }
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
        return view('product.edit',compact('category','product'));
    }
    public function set_product_auction(Request $request)
    {
        $this->validate($request, [
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        $product = Product::find($request->id);
        $product->start_time = $request->start_time;
        $product->end_time = $request->end_time;
        $product->status = 'active';
        $product->save();
        return redirect()->route('admin.product.index')->with('success','Product auction time set successfully');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $image_name = "";
        if($request->hasFile('image')){
            $imagePath = public_path('product/' . $product->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('product'),$image_name);
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->start_price = $request->price;
        $product->seller_id = auth()->user()->id;
        $product->image = $image_name? $image_name : $product->image;
        $product->save();
        if ($request->hasFile('multiple')) {
            foreach($product->images as $ima1){
                $imagePath = public_path('product/' . $ima1->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
            ItemImage::where('item_id',$product->id)->delete();
            foreach ($request->file('multiple') as $img) {

                $imageName = date('YmdHis') . uniqid() . '.' . $img->getClientOriginalExtension();

                $img->move(public_path('product'), $imageName);

                $itemImage = new ItemImage();
                $itemImage->item_id = $product->id;
                $itemImage->image = $imageName;
                $itemImage->save();
            }
        }
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
