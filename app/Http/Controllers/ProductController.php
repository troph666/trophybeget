<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'product-name' => 'required|string|max:255',
            'product-description' => 'required|string',
            'product-price' => 'required|numeric',
            'product-category' => 'required|string',
        ]);

        $product = new Product();
        $product->name = $validatedData['product-name'];
        $product->description = $validatedData['product-description'];
        $product->price = $validatedData['product-price'];
        $product->category = $validatedData['product-category'];
        $product->status = 'pending'; // Установим статус "на рассмотрении"
        $product->seller_id = Auth::id(); // Устанавливаем ID продавца

        $product->save();

        return redirect()->route('seller.products')->with('success', 'Товар успешно добавлен.');
    }
    
}
