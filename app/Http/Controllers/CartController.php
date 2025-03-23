<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        $quantity = $request->quantity ?? 1;

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        if(auth()->check()){
            // Find existing cart item
            $existingCartItem = auth()->user()->cartItems()->where('product_id', $product->id)->first();
            
            if($existingCartItem) {
                // Update existing item
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
            } else {
                // Create new cart item with all needed product details
                auth()->user()->cartItems()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity
                ]);
            }
        
            return response()->json(['message' => 'Product added to cart']);
        }

        else{
            // guest using session for storing cart
             
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
    
        session()->put('cart', $cart);
    
        return response()->json(['message' => 'Product added to cart!', 'cart' => $cart]);
        }
    }

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

        if (auth()->check()) {
            auth()->user()->cartItems()->where('product_id', $productId)->delete();
            return response()->json(['success' => true]);
        } else {
            $cart = session()->get('cart', []);
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'cart' => $cart]);
        }
}
}