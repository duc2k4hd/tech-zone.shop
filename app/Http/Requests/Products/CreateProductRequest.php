<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name-product' => 'required|min:3|max:255',
            'mass-product'=> 'required|numeric',
            'price-product'=> 'required|numeric|min:0|max:1000000000',
            // 'discount-price-product'=> 'required|numeric|min:0|max:1000000000',
            'stock-product'=> 'required|numeric|min:0|max:1000',
            'image-product'=> 'required|image|mimes:jpg,jpeg,png,tiff,webp|max:2048',
            'description-product'=> 'required|min:3|max:10000',
            'size-product'=> 'required',
            'color-product'=> 'required',
            'material-product'=> 'required',
            'category-product'=> 'required',
            'brand-product'=> 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name-product.required' => 'Vui lòng nhập tên sản phẩm',
            'name-product.min' => 'Tên sản phẩm phải có độ dài từ 3 đến 255 ký tự',
            'name-product.max' => 'Tên sản phẩm phải có độ dài từ 3 đến 255 ký tự',

            'mass-product.required'=> 'Vui lòng nhập khối lượng',
            'mass-product.numeric'=> 'Khối lượng phải là 1 số',

            'price-product.required'=> 'Vui lòng nhập giá sản phẩm',
            'price-product.numeric'=> 'Giá sản phẩm phải là một số',
            'price-product.min'=> 'Giá sản phẩm phải lớn hơn hoặc bằng 0',
            'price-product.max'=> 'Giá sản phẩm phải nhỏ hơn hoặc bằng 1,000,000,000',

            // 'discount-price-product.required'=> 'Vui lòng nhập giá khuyến mãi',
            // 'discount-price-product.numeric'=> 'Giá khuyến mãi phải là một số',
            // 'discount-price-product.min'=> 'Giá khuyến mãi phải lớn hơn hoặc bằng 0',
            // 'discount-price-product.max'=> 'Giá khuyến mãi phải nhỏ hơn hoặc bằng 1,000,000,000',

            'stock-product.required'=> 'Vui lòng nhập số lượng sản phẩm',
            'stock-product.numeric'=> 'Số lượng phải là 1 số',
            'stock-product.min'=> 'Số lượng sản phẩm phải lớn hơn hoặc bằng 0',
            'stock-product.max'=> 'Số lần mua sản phẩm phải nhỏ hơn hoặc bằng 1,000',

            'image-product.required'=> 'Vui lòng tải lên hình ảnh sản phẩm',
            'image-product.image'=> 'Hình ảnh sản phẩm phải là một hình ảnh hợp lệ',
            'image-product.mimes'=> 'Hình ảnh sản phẩm phải đúng định dạng: jpg, jpeg, png, bmp, tiff, webp, avif',
            'image-product.max'=> 'Hình ảnh sản phẩm phải có dữ liệu nhỏ hơn 2MB',

            'description-product.required'=> 'Vui lòng nhập mô tả sản phẩm',
            'description-product.min'=> 'Mô tả sản phẩm phải có độ dài từ 3 đến 10,000 ký tự',
            'description-product.max'=> 'Mô tả sản phẩm phải có độ dài từ 3 đến 10,000 ký tự',

            'size-product.required'=> 'Vui lòng chọn kích thước sản phẩm',
            'color-product.required'=> 'Vui lòng chọn màu sản phẩm',
            'material-product.required'=> 'Vui lòng chọn chất liệu sản phẩm',

            'category-product.required'=> 'Vui lòng chọn danh mục sản phẩm',
            'brand-product.required'=> 'Vui lòng chọn thương hiệu sản phẩm',
        ];
    }
}
