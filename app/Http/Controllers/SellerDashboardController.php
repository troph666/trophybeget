<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class SellerDashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $user = Auth::user();
        $products = Product::where('seller_id', $user->id)->get();

        return view('seller.seller_products', compact('products'));
    }
}
