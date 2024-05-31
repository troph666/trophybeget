<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $products = $user->products; // Убедитесь, что связь 'products' определена в модели User
        $orders = $user->orders; // Убедитесь, что связь 'orders' определена в модели User

        return view('seller.dashboard', compact('products', 'orders'));
    }
}
