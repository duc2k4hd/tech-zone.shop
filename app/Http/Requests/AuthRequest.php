<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        // Validate Login
        'login.email' => 'required|email',
        'login.password'=> 'required|min:6|max:15',

        // Validate Register
        'register.email' => 'required|email|unique:users,email',
        'register.password'=> 'required|min:6|max:15',
        'register.re-password'=> 'required|same:register.password',
    ];
}

public function messages(): array
{
    return [
        // Validate Login
        'login.email.required' => 'Vui lòng nhập email!',
        'login.email.email' => 'Vui lòng nhập đúng định dạng email!',
        'login.password.required' => 'Vui lòng nhập mật khẩu!',
        'login.password.min' => 'Mật khẩu phải có ít nhất 6 kí tự!',
        'login.password.max' => 'Mật khẩu không chứa quá 15 kí tự!',

        // Validate Register
        'register.email.required' => 'Vui lòng nhập email!',
        'register.email.email' => 'Vui lòng nhập đúng định dạng email!',
        'register.email.unique' => 'Email đã tồn tại!',
        'register.password.required' => 'Vui lòng nhập mật khẩu!',
        'register.password.min' => 'Mật khẩu phải có ít nhất 6 kí tự!',
        'register.password.max' => 'Mật khẩu không chứa quá 15 kí tự!',
        'register.re-password.required' => 'Vui lòng nhập lại mật khẩu!',
        'register.re-password.same' => 'Mật khẩu không khớp! Vui lòng nhập lại!',
    ];
}

}
