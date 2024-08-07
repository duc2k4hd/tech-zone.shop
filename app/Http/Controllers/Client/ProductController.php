<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index() {
        
        $check = false;
        $products = Product::all();
        $categories = Category::all();

        if (Auth::check()) {
            $check = true;
        }
        
        return view('client.product.product', [
            'check' => $check,
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
