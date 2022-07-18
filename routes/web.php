<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

                // ؛قخيعؤفس Routes
                Route::resource('/products',ProductController::class);
            }
        );
        require __DIR__.'/auth.php';


});
Route::get("/", function (){
    return redirect(route("login"));
});


//Route::group(
//    [
//        'prefix' => LaravelLocalization::setLocale(),
//        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//    ], function(){ //...
//});



