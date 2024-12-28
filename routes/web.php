<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleStockController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\SaleProductController;
use App\Http\Controllers\CostCategoryController;
use App\Http\Controllers\DueCollectionController;
use App\Http\Controllers\PurchasePartyController;
use App\Http\Controllers\PurchaseStockController;
use App\Http\Controllers\DailyProductionController;
use App\Http\Controllers\PurchaseProductController;
use App\Http\Controllers\DailyExpenditureController;
use App\Http\Controllers\AdvanceCollectionController;
use App\Http\Controllers\PartyConsiderationController;

Route::get("/",[FrontendController::class,'index'])->name('index');
Route::get("/admin_signup",[FrontendController::class,"adminSignUp"])->name('admin_signup');
Route::get("/admin_signin",[FrontendController::class,"adminSignIn"])->name('admin_signin')->middleware(['guest']);
Route::get("/farmer_signup",[FrontendController::class,"farmerSignUp"])->name('farmer_signup');
Route::get("/farmer_signin",[FrontendController::class,"farmerSignIn"])->name('farmer_signin');


Route::post("/getDistrict",[FrontendController::class,"getDistrict"])->name('getDistrict');
Route::post("/getUpazila",[FrontendController::class,"getUpazila"])->name('getUpazila');
Route::post("/getUnion",[FrontendController::class,"getUnion"])->name('getUnion');

Route::post("/admin_signup_store",[FrontendController::class,"admin_signup_store"])->name('admin_signup_store');
Route::post("/login_store",[FrontendController::class,"login"])->name('login_store');
// Route::post("/farmer_signup_store",[FrontendController::class,"farmerSignUp"])->name('farmer_signup_store');
// Route::post("/",[FrontendController::class,"farmerSignIn"])->name('farmer_signin');
// Route::get('/', function () {
//     return view('auth.login');
// })->middleware(['guest']);

Route::get('/dashboard', function () {
    return view('admin.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'web'],
],function(){
    Route::get('report',function(){
        return view('allreport.salary_report');
    });
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product_type', ProductTypeController::class);
    Route::get('/profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('delect', [AdminController::class, "delete"])->name('delete');
    Route::get('home', [AdminController::class, "home"])->name('home');
    Route::get('send', [AdminController::class, "send"])->name('send');
    Route::post('send', [AdminController::class, "send"])->name('send');


    Route::get("category_size",[CategoryController::class,"size"])->name('category_size');
    Route::get("category_size/create",[CategoryController::class,"sizeCreate"])->name('category_size.create');
    Route::post("category_size",[CategoryController::class,"sizeStore"])->name('category_size.store');
    Route::get("category_size/{id}/edit",[CategoryController::class,"sizeEdit"])->name('category_size.edit');
    Route::post("category_size/{id}",[CategoryController::class,"sizeUpdate"])->name('category_size.update');

    Route::get("category_gsm",[CategoryController::class,"gsm"])->name('category_gsm');
    Route::get("category_gsm/create",[CategoryController::class,"gsmCreate"])->name('category_gsm.create');
    Route::post("category_gsm",[CategoryController::class,"gsmStore"])->name('category_gsm.store');
    Route::get("category_gsm/{id}/edit",[CategoryController::class,"gsmEdit"])->name('category_gsm.edit');
    Route::post("category_gsm/{id}",[CategoryController::class,"gsmUpdate"])->name('category_gsm.update');

    Route::get("category_color",[CategoryController::class,"color"])->name('category_color');
    Route::get("category_color/create",[CategoryController::class,"colorCreate"])->name('category_color.create');
    Route::post("category_color",[CategoryController::class,"colorStore"])->name('category_color.store');
    Route::get("category_color/{id}/edit",[CategoryController::class,"colorEdit"])->name('category_color.edit');
    Route::post("category_color/{id}",[CategoryController::class,"colorUpdate"])->name('category_color.update');

    Route::get("category_unit",[CategoryController::class,"unit"])->name('category_unit');
    Route::get("category_unit/create",[CategoryController::class,"unitCreate"])->name('category_unit.create');
    Route::post("category_unit",[CategoryController::class,"unitStore"])->name('category_unit.store');
    Route::get("category_unit/{id}/edit",[CategoryController::class,"unitEdit"])->name('category_unit.edit');
    Route::post("category_unit/{id}",[CategoryController::class,"unitUpdate"])->name('category_unit.update');




    Route::resource('employe', EmployeeController::class)->except(['destroy']);
    Route::match(['get','post'],"employe-salary/{id}",[EmployeeController::class,"employe_salary"])->name('employe.employe_salary');
    Route::match(['get','post'],"employe-addvance-salary/{id}",[EmployeeController::class,"addvance_salary"])->name('employe.addvance_salary');
    Route::get("employe-salary-list/{id?}",[EmployeeController::class,"employeSalaryList"])->name('employeSalaryList');
    Route::post("getProductPrice",[AdminController::class,"getProductPrice"])->name('getProductPrice');
    Route::post("getCostCategoryPrice",[AdminController::class,"getCostCategoryPrice"])->name('getCostCategoryPrice');
    Route::post("getPurchaseProductPrice",[AdminController::class,"getPurchaseProductPrice"])->name('getPurchaseProductPrice');
    Route::post("getSaleProductPrice",[AdminController::class,"getSaleProductPrice"])->name('getSaleProductPrice');
    Route::post("getPartyInfo",[AdminController::class,"getPartyInfo"])->name('getPartyInfo');
    Route::post("getProductName",[AdminController::class,"getProductName"])->name('getProductName');


});

require __DIR__.'/auth.php';
