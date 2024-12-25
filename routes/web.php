<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleStockController;
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

Route::get('/', function () {
    return view('auth.login');
})->middleware(['guest']);

Route::get('/dashboard', function () {
    return view('dashboard');
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


    Route::resource('daily_expenditure', DailyExpenditureController::class)->except(['destroy','show']);
    Route::resource('daily_production', DailyProductionController::class)->except(['show','store']);
    Route::post('daily_production', [DailyProductionController::class,"store"])->middleware('BlockFormSubmission')->name('daily_production.store');
    Route::get('single-production', [DailyProductionController::class,"oneEmployeProduction"])->name('oneEmployeProduction');
    Route::post('daily_production_report', [DailyProductionController::class,"daily_production_report"])->name('daily_production_report');
    Route::post('salary_report', [SalaryController::class,"salary_report"])->name('salary_report');
    Route::resource('cost_category', CostCategoryController::class)->except(['destroy','show']);
    Route::resource('party', PartyController::class)->except(['destroy']);
    Route::resource('purchase_party', PurchasePartyController::class)->except(['destroy']);

    Route::resource('sale_product', SaleProductController::class)->except(['show','destroy']);
    Route::get("sale_product_list",[SaleProductController::class,"productList"])->name('productList');
    Route::post("search_product",[SaleProductController::class,"search_product"])->name('search_product');
    Route::resource('purchase_product', PurchaseProductController::class)->except(['show','destroy']);
    Route::resource('sale', SaleController::class)->except(['destroy']);
    Route::resource('salary', SalaryController::class)->except(['destroy']);
    Route::resource('purchase', PurchaseController::class)->except(['destroy']);
    Route::resource('sale_stock', SaleStockController::class)->except(['show','destroy','update','edit']);
    Route::get("sale_stock_adjust",[SaleStockController::class,"saleStockAdjust"])->name('saleStockAdjust');
    Route::get("purchase_stock_adjust",[PurchaseStockController::class,"purchaseStockAdjust"])->name('purchaseStockAdjust');
    Route::resource('purchase_stock', PurchaseStockController::class)->except(['show','destroy']);
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
    Route::post("addItem",[PurchaseController::class,"addItem"])->name('addItem');
    Route::post("removeItem",[PurchaseController::class,"removeItem"])->name('removeItem');
    Route::post("qtyChange",[PurchaseController::class,"qtyChange"])->name('qtyChange');
    Route::get("sale/print/{id}",[SaleController::class,"print"])->name('sale.print');
    Route::post("saleAddItem",[SaleController::class,"addItem"])->name('saleAddItem');
    Route::post("saleRemoveItem",[SaleController::class,"removeItem"])->name('saleRemoveItem');
    Route::post("saleQtyChange",[SaleController::class,"qtyChange"])->name('saleQtyChange');
    Route::post("saleStockAddItem",[SaleStockController::class,"addItem"])->name('saleStockAddItem');
    Route::post("saleStockRemoveItem",[SaleStockController::class,"removeItem"])->name('saleStockRemoveItem');
    Route::post("saleStockQtyChange",[SaleStockController::class,"qtyChange"])->name('saleStockQtyChange');
    Route::post("purchaseStockAddItem",[PurchaseStockController::class,"addItem"])->name('purchaseStockAddItem');
    Route::post("purchaseStockRemoveItem",[PurchaseStockController::class,"removeItem"])->name('purchaseStockRemoveItem');
    Route::post("purchaseStockQtyChange",[PurchaseStockController::class,"qtyChange"])->name('purchaseStockQtyChange');
    Route::post("adjustStockAddItem",[PurchaseStockController::class,"addItemAdjust"])->name('adjustStockAddItem');
    Route::post("adjustStockRemoveItem",[PurchaseStockController::class,"removeItemAdjust"])->name('adjustStockRemoveItem');
    Route::post("adjustStockQtyChange",[PurchaseStockController::class,"qtyChangeAdjust"])->name('adjustStockQtyChange');
    Route::get("subtract_stock",[PurchaseStockController::class,"purchaseStockAdjustMultiple"])->name('purchaseStockAdjustMultiple');
    Route::resource("due_collection",DueCollectionController::class);
    Route::resource("advance_collection",AdvanceCollectionController::class);
    Route::resource("consideration",PartyConsiderationController::class);

});

require __DIR__.'/auth.php';
