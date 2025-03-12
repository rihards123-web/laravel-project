<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
    {

        //Common resource routes:
        // index - Show all products/items
        // show - Show a single product/item
        // create - Show form to create a new product/item
        // store - Store a new product/item
        // edit - Show form to edit listing
        // update - Update product/item
        // destroy - Delete product/item


    public function index() { // returns all products
        return view('products', [
            'products' => Product::all()
        ]);
    }

    public function show(Product $product) { // returns sinngle products
        return view('product', [
            'product' => $product 
        ]);
    }
}

// savest kārtībā produkts daļu, lai smuki var parādīt visus produktus + bildes , kurām var loopot cauri.