<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|integer',
        'product_name' => 'required|string',
        'product_price' => 'required|numeric',
    ]);

    $order = new Order();
    $order->product_id = $request->input('product_id');
    $order->product_name = $request->input('product_name');
    $order->product_price = $request->input('product_price');
    $order->user_id = auth()->user()->id; 

    $order->save();

    return redirect()->route('product.catalog')->with('success', 'Заказ успешно оформлен!');
}


    public function myOrders()
{
    $orders = Order::where('user_id', auth()->id())->get();
    return view('my_orders', ['orders' => $orders]);
}

}
