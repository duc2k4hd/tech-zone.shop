<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckOutController extends Controller
{
    public function index() {
        $check = false;
        $categories = Category::all();
        $products = Product::all();
        $provinces = DB::table('province')->get();
        return view('client.checkout.checkout', compact(
            'check',
            'categories',
            'products',
            'provinces'
        ));
    }
}
