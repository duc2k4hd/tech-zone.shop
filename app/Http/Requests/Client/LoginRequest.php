<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
    public function rules(): array {
        return [
            'email-login' => 'required|email',
            'password-login'=> 'required|min:5|max:20',
        ];
    }

    public function messages() {
        return [
            'email-login.required'=> 'Vui lòng không để trống email',
            'email-login.email'=> 'Vui lòng nhập đúng định dạng email',

            'password-login.required'=> 'Vui lòng không để trống mật khẩu',
            'password-login.min' => 'Mật khẩu phải trên 5 ký tự',
            'password-login.max'=> 'Mật khẩu phải dưới 20 ký tự',
        ];
    }
}
