<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;


Route::get('/', function(){
    return view('landing');
});

// vajag route, kas ies uz produktiem visiem, tad uz single. 

Route::get('/products', [ProductsController::class, 'index'] ); // visi produkti

Route::get('/products/{product}', [ProductsController::class, 'show'] ); // viens produkts

