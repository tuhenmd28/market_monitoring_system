<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Party;
use App\Models\Farmer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Employee;
use App\Models\CategoryGsm;
use App\Models\ProductType;
use App\Models\SaleProduct;
use App\Models\CategorySize;
use App\Models\CategoryUnit;
use App\Models\CostCategory;
use App\Models\Product_cost;
use Illuminate\Http\Request;
use App\Models\CategoryColor;
use App\Models\PurchaseProduct;
use App\Http\Traits\SmsSendTrait;
use App\Models\GovernmentStorage;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    use SmsSendTrait;
    public function Delete(Request $request)
    {
        // dd($request->all());
        switch ($request->table) {
            case 'category':
                $package =  Category::find($request->id);
                $package->delete();
                $route = 'admin.category.index';
                break;
            case 'ProductType':
                $package =  ProductType::find($request->id);
                $package->delete();
                $route = 'admin.product_type.index';
                break;
            case 'government_storage':
                $package =  GovernmentStorage::find($request->id);
                $package->delete();
                $route = 'admin.government_storage.index';
                break;
            case 'product_cost':
                $package =  Product_cost::find($request->id);
                $package->delete();
                $route = 'admin.product_cost.index';
                break;

            case 'employe':
                $analytic = Employee::find($request->id)->delete();
                $route = 'admin.employe.index';
                break;
            default:
                # code...
                break;
        }
        // dd($route);
        // return redirect()->route($route)->with('success',"Deleted Successfully");
    }

    public function home(){
        return view("admin.home");
    }
    public function getProductPrice(Request $request)
    {
        $sale_product_id = $request->sale_product_id;
        $product = SaleProduct::find($sale_product_id);
        if($request->production){
            $productDetials['color'] = CategoryColor::find($product->category_color_id)?->name;
            $productDetials['size'] = CategorySize::find($product->category_size_id)?->name;
            $productDetials['gsm'] = CategoryGsm::find($product->category_gsm_id)?->name;
            $productDetials['unit'] = CategoryUnit::find($product->category_unit_id)?->name;
            return response()->json(['data' => $productDetials]);
        }
        $category_color_id = $product->category_color_id;
        $category_size_id = $product->category_size_id;
        $category_gsm_id = $product->category_gsm_id;

        $productDetials = SaleProduct::where([['id','=',$sale_product_id],['category_color_id','=',$category_color_id],['category_size_id','=',$category_size_id],['category_gsm_id','=',$category_gsm_id]])->select('price','category_color_id','category_size_id','category_gsm_id','qty')->first();
        return response()->json(['data' => $productDetials]);
    }
    public function getPurchaseProductPrice(Request $request)
    {
        $product_id = $request->product_id;
        $product = PurchaseProduct::find($product_id);
        // dd($product);
        return response()->json(['data' => $product]);
    }
    public function getCostCategoryPrice(Request $request)
    {
        $id = $request->cost_category_id;
        $cost = CostCategory::find($id);
        // dd($cost);
        return response()->json(['data' => $cost]);
    }
    public function getSaleProductPrice(Request $request)
    {
        $product_id = $request->product_id;
        $product = SaleProduct::find($product_id);
        // dd($product);
        return response()->json(['data' => $product]);
    }
    // public function getProductCategory(Request $request)
    // {
    //     $sale_product_id = $request->sale_product_id;
    //     $size = CategorySize::where('')->select('price')->first();
    //     // echo $price?->price;
    // }
 
    public function send(Request $request)
    {
        if($request->method() == 'GET'){
            return view('message');
        }
        // dd($request->all());
       $message =  $request->message;
       $number =  $request->name;
       $staus =  $this->sms_send($message,$number);
    //    dd($staus);

       session()->flash('success',$staus);
       return redirect()->back();
    }
    public function users(Request $request, $farmer_status = "all")
    {
        if($farmer_status == "all"){
            $farmer = User::with('division','district','upazila','union','farmer1')->get();
        }else{

            $farmer = User::with('division','district','upazila','union','farmer1')->where('type',$farmer_status)->get();
        }
        // dd($farmer);
        return view('user.list',compact('farmer'));
    }

}
