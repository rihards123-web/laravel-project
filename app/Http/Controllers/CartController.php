<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // finds product by id
        $product = Product::find($request->product_id);
        $quantity = $request->quantity ?? 1; 

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404); // if not found gives a 404
        }

        // for registerd users 
        if(auth()->check()){ 
            //  check if user already has product in cart
            $existingCartItem = auth()->user()->cartItems()->where('product_id', $product->id)->first();
            // if exists then increments quantity
            if($existingCartItem) {
                // updating an existing cart item
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
                // if product doesnt exist create one in the DB
            } else {
                // creating new cart item
                auth()->user()->cartItems()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity
                ]);
            }
        
            return response()->json(['message' => 'Product added to cart']);
        }

        else{
            // guest using sessions as an array for storing cart items
             
        $cart = session()->get('cart', []); // storing data in session
    
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
        // puts item in session
        session()->put('cart', $cart);
    
        return response()->json(['message' => 'Product added to cart!', 'cart' => $cart]);
        }
    }

    // returns cart depending on user. Logged in -> DB , guest -> session
    // cart items get mapped which returns an associative array 
    public function viewCart()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $cartItems = $user->cartItems()->get()->map(function ($item) {
                return [
                    'id' => $item->product->id,
                    'title' => $item->product->title,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'image' => $item->product->image
                ];
            });
    
            return view('cart', compact('cartItems'));
        } else {
            $cart = session()->get('cart', []);
            return view('cart', ['cart' => $cart]);
        }
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id'); // Get product ID from JSON body
        // for users delets a row from DB
        if (auth()->check()) {
            auth()->user()->cartItems()->where('product_id', $productId)->delete();
            return response()->json(['success' => true]);
        } else {
            // for guests removes item from sessions cart
            $cart = session()->get('cart', []);
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'cart' => $cart]);
        }
}
}