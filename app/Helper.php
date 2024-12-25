<?php

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use App\Models\District;
use App\Models\Division;
use App\Models\Purchase;
use App\Models\Upazilla;
use App\Models\AdsSetting;
use App\Models\PackageOrder;
use App\Models\DueCollection;
use App\Models\DelivaryCharge;
use App\Models\PaymentHistory;
use Illuminate\Support\Number;
use App\Models\DailyProduction;
use App\Models\DailyExpenditure;
use App\Models\GenerationPayment;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

if (!function_exists('encodeNumberToString')) {

function encodeNumberToString($number) {
    $base = 62;  // You can choose a different base if needed
    $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $encodedString = '';

    while ($number > 0) {
        $remainder = $number % $base;
        // dd($remainder);
        $encodedString = $charset[$remainder] . $encodedString;
        $number = intdiv($number, $base);
    }

    return $encodedString;
}

}

if (!function_exists('decodeStringToNumber')) {


    function decodeStringToNumber($encodedString) {
        $base = 62;  // Should match the base used during encoding
        $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        $decodedNumber = 0;
        $length = strlen($encodedString);

        for ($i = 0; $i < $length; $i++) {
            $decodedNumber = $decodedNumber * $base + strpos($charset, $encodedString[$i]);
        }

        return $decodedNumber;
    }

}

if (!function_exists('role')) {
    function role() {
      return  $role =  Role::get();
    }

}

if (!function_exists('permission')) {
    function permission() {
      return  $permission =  Permission::get();
    }

}
if (!function_exists('dateTime')) {
    function dateTime($date) {

      return  $date->format('Y-m-d h:i A');
    }

}
if (!function_exists('dateFormateTime')) {
    function dateFormateTime($date) {

      return  $date->format('d/m/Y h:i A');
    }

}
if (!function_exists('dateformate')) {
    function dateformate($date) {

      return  $date->format('d/m/Y');
    }

}
if (!function_exists('checkAdminAndSuperAdmon')) {
    function checkAdminAndSuperAdmon($role) {
      return auth()->user()->hasAnyRole($role);
    }

}

if (!function_exists('wallet')) {
    function wallet() {
      $amount = auth()->user()->wallet + auth()->user()->login?->wallet;
      return  number_format($amount, 0, '.', ',');
    }

}


if (!function_exists('sellerRequest')) {
    function sellerRequest() {
     $user = User::where("seller_status",0)->count();
     return $user;
    }

}

// if (!function_exists('company')) {
//     function company() {
//      $company = Company::find(1);
//      return $company;
//     }

// }

if (!function_exists('todayExpenditure')) {
    function todayExpenditure() {
     $todayExpenditure = DailyExpenditure::whereDate('created_at',Carbon::today())->get();
     return Number::format($todayExpenditure->sum('amount'));
    }

}
if (!function_exists('monthlyExpenditure')) {
    function monthlyExpenditure() {
     $monthlyExpenditure = DailyExpenditure::whereMonth('created_at', Carbon::now()->format('m'))->get();
     return Number::format($monthlyExpenditure->sum('amount'));
    }

}
if (!function_exists('numberFormate')) {
    function numberFormate($number) {
     return Number::format($number);
    }

}

if (!function_exists('todaySale')) {
    function todaySale() {
     $todaySale = Sale::whereDate('created_at',Carbon::today())->get();
     return Number::format($todaySale->sum('total_amount'));
    }

}
if (!function_exists('todayProfit')) {
    function todayProfit() {
     $sales = Sale::with('product')->whereDate('created_at',Carbon::today())->get();
     $cost = 0;
     foreach($sales as $sale){
        $cost += $sale->product?->production_cost * $sale->qty;
     }
    $profit = $sales->sum('total_amount') - $cost;
     return Number::format($profit);
    }

}
if (!function_exists('monthlyProfit')) {
    function monthlyProfit() {
     $sales = Sale::with('product')->whereMonth('created_at',Carbon::now()->format('m'))->get();
     $cost = 0;
     foreach($sales as $sale){
        $cost += $sale->product?->production_cost * $sale->qty;
     }
    $profit = $sales->sum('total_amount') - $cost;
     return Number::format($profit);
    }

}
if (!function_exists('currentMonthSale')) {
    function currentMonthSale() {
     $currentMonthSale = Sale::whereMonth('created_at', Carbon::now()->format('m'))->get();
     return Number::format($currentMonthSale->sum('total_amount'));
    }

}
if (!function_exists('currentMonthProduction')) {
    function currentMonthProduction() {
     $currentMonthProduction = DailyProduction::whereMonth('production_date', Carbon::now()->format('m'))->get();
     return Number::format($currentMonthProduction->sum('total_cost'));
    }

}
if (!function_exists('todayProduction')) {
    function todayProduction() {
     $todayProduction = DailyProduction::whereDate('production_date', Carbon::today())->get();
     return Number::format($todayProduction->sum('total_cost'));
    }

}
if (!function_exists('currentMonthDueCollection')) {
    function currentMonthDueCollection() {
     $currentMonthCollection = DueCollection::whereMonth('created_at', Carbon::now()->format('m'))->where('status',1)->get();
     return Number::format($currentMonthCollection->sum('amount'));
    }

}
if (!function_exists('currentMonthPurchase')) {
    function currentMonthPurchase() {
     $purchase = Purchase::whereMonth('created_at', Carbon::now()->format('m'))->get();
     return Number::format($purchase->sum('total_price'));
    }

}
if (!function_exists('todayPurchase')) {
    function todayPurchase() {
     $purchase = Purchase::whereDate('created_at', Carbon::today())->get();
     return Number::format($purchase->sum('total_price'));
    }

}
if (!function_exists('todayCollection')) {
    function todayCollection() {
     $todayCollection = DueCollection::whereDate('created_at', Carbon::today())->where('status',1)->get();
     return Number::format($todayCollection->sum('amount'));
    }

}
if (!function_exists('takeFormat')) {
    function takeFormat($taka) {
     return Number::format($taka);
    }

}
if (!function_exists('takeFormatforHumans')) {
    function takeFormatforHumans($taka) {
        // dd($taka);
     return Number::spell($taka);
    }

}
if (!function_exists('TotalAmount')) {
    function TotalAmount($employe_id, $date) {
        $previousDate = Carbon::parse($date)->subMonth();
        // dd($date->format('m'),$previousDate->format('m'));
        $production = DailyProduction::whereMonth('production_date', $previousDate->format('m'))->where('employee_id',$employe_id)->get();
        // dd($production);
     return Number::format($production->sum('total_cost'));
    }

}

