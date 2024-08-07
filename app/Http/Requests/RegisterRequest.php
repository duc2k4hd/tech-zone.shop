<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            // Validate Register
            'email' => 'required|email|unique:users,email',
            'password'=> 'required|min:6|max:15',
            're-password'=> 'required|same:register.password',
        ];
    }

    public function messages(): array {
        return [
            // Validate Register
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Vui lòng nhập đúng định dạng email!',
            'email.unique' => 'Email đã tồn tại!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự!',
            'password.max' => 'Mật khẩu không chứa quá 15 kí tự!',
            're-password.required' => 'Vui lòng nhập lại mật khẩu!',
            're-password.same' => 'Mật khẩu không khớp! Vui lòng nhập lại!',
        ];
    }
}
