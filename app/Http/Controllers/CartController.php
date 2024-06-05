<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id(); 

        $cartItems = CartItem::where('user_id', $userId)->with('product')->get();
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart', compact('cartItems', 'totalPrice'));
    }

    public function addToCart(Request $request, $productId)
{
    $userId = auth()->id();

    $cart = $request->session()->get('cart', []);
    if (array_key_exists($productId, $cart)) {
        $cart[$productId]['quantity']++;
    } else {

        $cart[$productId] = [
            'quantity' => 1,

        ];
    }

    $request->session()->put('cart', $cart);

    return redirect()->route('cart.index');
}


    public function removeFromCart(Request $request, $productId)
    {
        $userId = auth()->id(); 

        $cartItem = CartItem::where('user_id', $userId)->where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index');
    }
}
