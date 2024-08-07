<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index() {
        if (Auth::check() ) {
            return view('admin.dashboard.products.product', [
                'baseUrl' => env("BASE_URL") .'resources/views/admin/dashboard/',
                'user' => User::find(Auth::id()),
                'products' => DB::table('products')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->select('products.*', 'products.name as product_name', 'categories.name as category_name', 'products.id as product_id', 'categories.id as category_id', 'brands.name as brand_name', 'brands.id as brand_id')
                    ->get()
            ]);
        } else {
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập để sử dụng chức năng này!');
        }
    }

    public function CreateProduct() {
        if (Auth::check() ) {
            return view('admin.dashboard.products.createProduct', [
                'baseUrl' => env("BASE_URL") .'resources/views/admin/dashboard/',
                'user' => User::find(Auth::id()),
                'categories' => DB::table('categories')->get(),
                'brands' => DB::table('brands')->get()
            ]);
        } else {
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập để sử dụng chức năng này!');
        }
    }

    public function PostProduct(CreateProductRequest $request) {
        // try {
            if (Auth::check() ) {
                $nameProduct = $request->input('name-product');
                $codeProduct = $request->input('code-product');
                $massProduct = $request->input('mass-product');
                $unitProduct = $request->input('unit-product');
                $stockProduct = $request->input('stock-product');
                $priceProduct = $request->input('price-product');
                $discountPriceProduct = $request->input('discount-price-product');
                $descriptionProduct = $request->input('description-product');
                
                $materialProduct = $request->input('material-product');
                $categoryProduct = $request->input('category-product');
                $brandProduct = $request->input('brand-product');
    
                // Biến check
                $check = false;
    
                // Handel image
                $file = $request->file('image-product');
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $filePath = $file->getRealPath();
                    
                    if (file_exists($filePath)) {
                        if($file) {
                            $check = true;
                            $destinationPath = '/resources/views/admin/dashboard/assets/img/clothes/';
                            $fileName = $file->getClientOriginalName();
                            $file->move($destinationPath, $fileName);
                            $imageProduct = $fileName;
                        } else {
                            $check = false;
                        }
                    } else {
                        // Tệp không tồn tại
                        return redirect()->back()->with('error','Tệp không tồn tại!');
                    }
                } else {
                    return redirect()->back()->with('error','Không có tệp nào được tải lên!');
                }
                
    
                // Handel size
                $sizeProduct = $request->input('size-product');
                $size = explode(',', $sizeProduct);
                $sizeArr = [];
                foreach ($size as $item) {
                    $items = trim($item);
                    array_push($sizeArr, $items);
                }
                if (count($sizeArr) > 0) {
                    $check = true;
                    $sizeArr = json_encode($sizeArr, true);
                } else {
                    $check = false;
                }
    
                // Handle color
                $colorProduct = $request->input('color-product');
                $color = explode(',', $colorProduct);
                $colorArr = [];
                foreach ($color as $item) {
                    $items = trim($item);
                    array_push($colorArr, $items);
                }
                if (count($colorArr) > 0) {
                    $colorArr = json_encode($colorArr, true);
                    $check = true;
                } else {
                    $check = false;
                }
                
                if ($check) {
                    DB::table('products')->insert([
                        'name'=> $nameProduct,
                        'code'=> $codeProduct,
                        'unit'=> $massProduct. ' '. $unitProduct,
                        'price'=> $priceProduct,
                        'stock'=> $stockProduct,
                        'discounted_price'=> $discountPriceProduct,
                        'image_path'=> $imageProduct,
                        'description'=> $descriptionProduct,
                        'size'=> $sizeArr,
                        'color'=> $colorArr,
                        'material'=> $materialProduct,
                        'category_id'=> $categoryProduct,
                        'brand_id'=> $brandProduct,
                        'created_at'=> Carbon::now(),
                        'updated_at'=> Carbon::now()
                    ]);
                    return redirect()->route('admin.dashboard.product')->with('success','Thêm sản phẩm thành công!');
                } else {
                    return redirect()->back()->with('error','Không thể thêm sản phẩm! Vui lòng nhập lại dữ liệu!');
                }
            }
        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', $th->getMessage());
        // }
    }

    public function view($id) {
        if (Auth::check() ) {
            if (DB::table('products')->where('id', $id)->exists()) {
                return view('admin.dashboard.products.viewProduct', [
                    'baseUrl' => env("BASE_URL") .'resources/views/admin/dashboard/',
                    'user' => User::find(Auth::id()),
                    'product' => Product::join('categories', 'products.category_id', '=', 'categories.id')
                                ->join('brands', 'products.brand_id', '=', 'brands.id')
                                ->select(
                                    'products.*',
                                    'products.name as product_name',
                                    'categories.name as category_name',
                                    'categories.id as category_id',
                                    'brands.name as brand_name',
                                    'brands.id as brand_id'
                                )
                                ->where('products.id', $id)
                                ->first()
                ]);
            } else {
                return redirect()->route('admin.dashboard.product')->with('error','Không tồn tại sản phẩm!');
            }
        } else {
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập để sử dụng chức năng này!');
        }
    }

    public function delete($id) {
        if (Auth::check() ) {
            if(DB::table('products')->count() > 1) {
                if (DB::table('products')->where('id', $id)->exists()) {
                    DB::table('products')->where('id', $id)->delete();
                    return redirect()->route('admin.dashboard.product')->with('success','Xóa này sản phẩm thành công!');
                } else {
                    return redirect()->route('admin.dashboard.product')->with('error','Không tồn tại này sản phẩm!');
                }
            } {
                return redirect()->route('admin.dashboard.product')->with('error','Vui lòng giữ lại ít nhất 1 sản phẩm');
            }
        } else {
            return redirect()->route('admin.login')->with('error', 'Vui này đăng nhập để sử dụng chức năng nhập!');
        }
    }
}
