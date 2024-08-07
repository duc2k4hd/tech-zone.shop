<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller {
    public function index() {
        $check = false;
        $categories = Category::all();
        $products = Product::all();
        if (Auth::check()) {
            $carts = DB::table('carts')
            ->select(
                'carts.*',
                'carts.id as cart_id',
                'carts.size as cart_size',
                'carts.color as cart_color',
                'products.*',
                'products.id as product_id',
                'categories.name as category_name'
            )
            ->where('carts.user_id', '=', Auth::user()->id)
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->join('categories', 'categories.id', '=', 'products.category_id') // Thêm join với bảng categories
            ->get();
            $check = true;
        } else {
            return redirect()->route("home.index")->with("error","Bạn cần đăng nhập để sử dụng tính năng này!");
        }
        return view('client.cart.cart', compact(
            'check',
            'categories',
            'products',
            'carts'
        ));
    }

    public function UpdateCart(Request $request) {
        $product = Product::find($request->id_product);
        if ($request->quantity > $product->stock) {
            return redirect()->back()->with('error', 'Trong kho còn lại '. $product->stock .' sản phẩm');
        } else {
            $cart = Cart::findOrFail($request->id_cart)
            ->update([
                'quantity' => $request->quantity,
                'size' => $request->size,
                'color' => $request->color
            ]);
            return redirect()->back()->with('success', 'Cập nhật thành công!');
        }
    }
}
