<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;  

class SellerDashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $user = Auth::user();
        $products = $user->products; 

        return view('seller.dashboard', compact('products'));
    }
}
