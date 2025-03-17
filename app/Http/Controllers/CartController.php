<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    
        $cart = session()->get('cart', []);
    
        // Add product to cart (or increase quantity if exists)
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                "title" => $product->title,
                "price" => $product->price,
                "quantity" => $request->quantity,
                "image" => $product->image
            ];
        }
    
        session()->put('cart', $cart);
    
        return response()->json(['message' => 'Product added to cart!', 'cart' => $cart]);
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->input('product_id'); // Get product ID from JSON body
    
        if (isset($cart[$productId])) {
            unset($cart[$productId]); // Remove item from cart
            session()->put('cart', $cart);
        }
    
        return response()->json(['success' => true, 'cart' => $cart]);
    }
}
