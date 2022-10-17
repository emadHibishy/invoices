<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WarehouseTransactionsController;
use App\Http\Controllers\PaymentTermController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => laravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect','localizationRedirect', 'localeViewPath']
    ],
    function()
    {
        Route::group(
            ['middleware' => 'auth'],
            function()
            {
                Route::get('/dashboard', function () {
                    return view('backend.dashboard');
                })->name('dashboard');

                // Categories Routes
                Route::resource('/categories',CategoryController::class);

                // Products Routes
                Route::resource('/products',ProductController::class);

                //Warehouses Routes
                Route::resource('warehouses', WarehouseController::class);

                //transactions Routes
                Route::resource('transactions', WarehouseTransactionsController::class);
                Route::get('transactions/product_on_hand/{warehouse_id}/{product_id}', [WarehouseTransactionsController::class, 'getWarehouseQty'])->name('onhand');

                //payment_terms Routes
                Route::resource('terms', PaymentTermController::class);

                //Territories Routes
                Route::resource('territories', TerritoryController::class);

                //Customers Routes
                Route::resource('customers', CustomerController::class);

                //Invoices Routes
                Route::resource('invoices', InvoiceController::class);
            }
        );
        require __DIR__.'/auth.php';


});
Route::get("/", function (){
    return redirect(route("login"));
});






