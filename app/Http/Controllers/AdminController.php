<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product_list', compact('products'));
    }
    public function showUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function approveProduct($id)
{
    $product = Product::findOrFail($id);
    $product->status = 'approved';
    $product->save();

    return redirect()->back()->with('success', 'Товар успешно подтвержден.');
}

}
