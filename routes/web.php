<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CartController;

// landing page
Route::get('/', function(){
    return view('landing', [
        'products' => Product::limit(8)->get() // gets just 8 products for landing pages display section
    ]);
});

// vajag route, kas ies uz produktiem visiem, tad uz single. 

Route::get('/products', [ProductsController::class, 'index'] ); // visi produkti

Route::get('/products/{product}', [ProductsController::class, 'show'] ); // viens produkts

// cart sekcija 

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');


Route::get('cart/check-out', function(){
    return view('check-out');
});