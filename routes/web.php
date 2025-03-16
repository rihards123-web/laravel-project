<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

// landing page
Route::get('/', function(){
    return view('landing', [
        'products' => Product::limit(8)->get() // gets just 8 products for landing pages display section
    ]);
});

// vajag route, kas ies uz produktiem visiem, tad uz single. 

Route::get('/products', [ProductsController::class, 'index'] ); // visi produkti

Route::get('/products/{product}', [ProductsController::class, 'show'] ); // viens produkts

