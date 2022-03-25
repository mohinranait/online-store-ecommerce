<?php

use Illuminate\Support\Facades\Route;


use  App\Http\Controllers\Backend\pageController;
use  App\Http\Controllers\Backend\categoryController;
use  App\Http\Controllers\Backend\brandController;
use  App\Http\Controllers\Backend\colorController;
use  App\Http\Controllers\Backend\divisionController;
use  App\Http\Controllers\Backend\districtController;
use  App\Http\Controllers\Backend\userController;
use  App\Http\Controllers\Backend\productController;
use  App\Http\Controllers\Backend\cuntryController;
use  App\Http\Controllers\Backend\orderController;


// Frontend Controller add
use App\Http\Controllers\Frontend\frontendController;
use App\Http\Controllers\Frontend\frontUserController;
use App\Http\Controllers\Frontend\cardController;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// Frontend all controller 
Route::get('/' , [frontendController::class , 'homepage'])->name('home');
Route::get('/shop-two' , [frontendController::class , 'shop2'])->name('shop-two');
Route::get('/shop' , [frontendController::class , 'shop3'])->name('shop-three');
Route::get('/shop-fore' , [frontendController::class , 'shop4'])->name('shop-fore');
Route::get('/category-list/{slug}' , [frontendController::class , 'primaryCategory'])->name('primary.category');
Route::get('/category-items/{slug}' , [frontendController::class , 'subCategory'])->name('sub.category');
Route::get('/offer-sell' , [frontendController::class , 'offerSell'])->name('offer.product');
Route::get('/search' , [frontendController::class , 'search']);
Route::get('/details/{slug}' , [frontendController::class , 'detailsProduct'])->name('productdetails');

// check out page Route 
Route::get('/checkout' , [frontendController::class , 'checkout'])->name('checkout');

// login and register page
// Route::get('/loginpage' , [frontendController::class,'login'])->name('loginpage');

// user Route
Route::group(['prefix' => '/user'],function(){
    Route::get('/dashboard' , [frontUserController::class , 'dashboard'])->name('user.dashboard')->middleware('auth','verified');
    Route::post('/update/{id}' , [frontUserController::class , 'update'])->name('user.dash.update')->middleware('auth','verified');
});

// Card Route
Route::group(['prefix' => 'card'],function(){
    Route::get('/' , [cardController::class,'card'])->name('card.items');
    Route::post('/card-store' , [cardController::class , 'store'])->name('card.store');
    Route::post('/card-update' , [cardController::class , 'update'])->name('card.update');
    Route::post('/card-destroy/{id}' , [cardController::class , 'destroy'])->name('card.destroy');
});

// SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('make_payment');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END







// Backend Route Group
Route::middleware('auth','role','verified')->group(function () {
    Route::group(['prefix' => 'admin'], function(){
        Route::get('dashboard' , [pageController::class , 'dashboard'])->name('admin.dashboard');

        // Category Route
        Route::group(['prefix' => '/product'],function(){
            Route::get('/manage' , [productController::class , 'index'])->name('product.manage');
            Route::get('/create' , [productController::class , 'create'])->name('product.create');
            Route::post('/store' , [productController::class , 'store'])->name('product.store');
            Route::get('/edit/{id}' , [productController::class , 'edit'])->name('product.edit');
            Route::post('/update/{id}' , [productController::class , 'update'])->name('product.update');
            Route::post('/delete/{id}' , [productController::class , 'destroy'])->name('product.delete');
        });

        // Category Route
        Route::group(['prefix' => '/orders'],function(){
            Route::get('/manage' , [orderController::class , 'index'])->name('order.manage');
            Route::get('/order-details/{id}' , [orderController::class , 'show'])->name('order.show');
            Route::get('/create' , [orderController::class , 'create'])->name('order.create');
            Route::post('/store' , [orderController::class , 'store'])->name('order.store');
            Route::get('/edit/{id}' , [orderController::class , 'edit'])->name('order.edit');
            Route::post('/update/{id}' , [orderController::class , 'update'])->name('order.update');
            Route::post('/delete/{id}' , [orderController::class , 'destroy'])->name('order.delete');
        });

        // Category Route
        Route::group(['prefix' => '/category'],function(){
            Route::get('/manage' , [categoryController::class , 'index'])->name('category.manage');
            Route::get('/create' , [categoryController::class , 'create'])->name('category.create');
            Route::post('/store' , [categoryController::class , 'store'])->name('category.store');
            Route::get('/edit/{id}' , [categoryController::class , 'edit'])->name('category.edit');
            Route::post('/update/{id}' , [categoryController::class , 'update'])->name('category.update');
            Route::post('/delete/{id}' , [categoryController::class , 'destroy'])->name('category.delete');
        });



        // Brand Route
        Route::group(['prefix' => '/brand'],function(){
            Route::get('/manage' , [brandController::class , 'index'])->name('brand.manage');
            Route::get('/create' , [brandController::class , 'create'])->name('brand.create');
            Route::post('/store' , [brandController::class , 'store'])->name('brand.store');
            Route::get('/edit/{id}' , [brandController::class , 'edit'])->name('brand.edit');
            Route::post('/update/{id}' , [brandController::class , 'update'])->name('brand.update');
            Route::post('/delete/{id}' , [brandController::class , 'destroy'])->name('brand.delete');
        });

        // Color Route
        Route::group(['prefix' => '/color'],function(){
            Route::get('/manage' , [colorController::class , 'index'])->name('color.manage');
            Route::get('/create' , [colorController::class , 'create'])->name('color.create');
            Route::post('/store' , [colorController::class , 'store'])->name('color.store');
            Route::get('/edit/{id}' , [colorController::class , 'edit'])->name('color.edit');
            Route::post('/update/{id}' , [colorController::class , 'update'])->name('color.update');
            Route::post('/delete/{id}' , [colorController::class , 'destroy'])->name('color.delete');
        });

        // Color Route
        Route::group(['prefix' => '/division'],function(){
            Route::get('/manage' , [divisionController::class , 'index'])->name('division.manage');
            Route::get('/create' , [divisionController::class , 'create'])->name('division.create');
            Route::post('/store' , [divisionController::class , 'store'])->name('division.store');
            Route::get('/edit/{id}' , [divisionController::class , 'edit'])->name('division.edit');
            Route::post('/update/{id}' , [divisionController::class , 'update'])->name('division.update');
            Route::post('/delete/{id}' , [divisionController::class , 'destroy'])->name('division.delete');
        });

        // Color Route
        Route::group(['prefix' => '/district'],function(){
            Route::get('/manage' , [districtController::class , 'index'])->name('district.manage');
            Route::get('/create' , [districtController::class , 'create'])->name('district.create');
            Route::post('/store' , [districtController::class , 'store'])->name('district.store');
            Route::get('/edit/{id}' , [districtController::class , 'edit'])->name('district.edit');
            Route::post('/update/{id}' , [districtController::class , 'update'])->name('district.update');
            Route::post('/delete/{id}' , [districtController::class , 'destroy'])->name('district.delete');
        });

        // Color Route
        Route::group(['prefix' => '/cuntry'],function(){
            Route::get('/manage' , [cuntryController::class , 'index'])->name('cuntry.manage');
            Route::get('/create' , [cuntryController::class , 'create'])->name('cuntry.create');
            Route::post('/store' , [cuntryController::class , 'store'])->name('cuntry.store');
            Route::get('/edit/{id}' , [cuntryController::class , 'edit'])->name('cuntry.edit');
            Route::post('/update/{id}' , [cuntryController::class , 'update'])->name('cuntry.update');
            Route::post('/delete/{id}' , [cuntryController::class , 'destroy'])->name('cuntry.delete');
        });

        // Color Route
        Route::group(['prefix' => '/user'],function(){
            Route::get('/manage' , [userController::class , 'index'])->name('user.manage');
            Route::get('/create' , [userController::class , 'create'])->name('user.create');
            Route::post('/store' , [userController::class , 'store'])->name('user.store');
            Route::get('/edit/{id}' , [userController::class , 'edit'])->name('user.edit');
            Route::post('/update/{id}' , [userController::class , 'update'])->name('user.update');
            Route::post('/delete/{id}' , [userController::class , 'destroy'])->name('user.delete');
        });
    });
});




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
