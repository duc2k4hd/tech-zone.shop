<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        
        $check = false;
        $products = Product::all();
        $categories = Category::all();
        $carts = DB::table('carts')
            ->select(
                'carts.*',
                'carts.id as cart_id',
                'products.*',
                'products.id as product_id'
            )
            ->where('carts.user_id', '=', Auth::user()->id)
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->get();

        if (Auth::check()) {
            $check = true;
        }
        
        return view('client.home.home', [
            'check' => $check,
            'products' => $products,
            'categories' => $categories,
            'carts' => $carts
        ]);
    }
    public function AddCart(Request $request) {
        $userId = Auth::user()->id;
        $productId = $request->product_id;
        $productQuantity = $request->product_quantity;
        $productSize = $request->product_size;
        $productColor = $request->product_color;
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
        if ($cartItem) {
            if (Product::where('id', $productId)->first()->stock > $productQuantity + $cartItem->quantity) {
                $cartItem->update([
                    'quantity' => $productQuantity + $cartItem->quantity,
                    'size' => $productSize,
                    'color' => $productColor,
                ]);
            } else {
                return redirect()->back()->with('error', 'Trong kho còn lại '. Product::where('id', $productId)->first()->stock .' sản phẩm');
            }
            return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $productQuantity,
                'size' => $productSize,
                'color' => $productColor,
            ]);
            return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
        }
    }

    public function DeleteCart(Request $request) {
        Cart::findOrFail($request->id)->delete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm trong giỏ hàng!');
    }
}
