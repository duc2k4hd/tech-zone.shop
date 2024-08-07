<?php

namespace App\Http\Requests;

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
    public function rules(): array
    {
        return [
            // Validate Login
            'email' => 'required|email',
            'password' => 'required|min:6|max:15',
        ];
    }

    public function messages(): array
    {
        return [
            // Validate Login
            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Vui lòng nhập đúng định dạng email!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự!',
            'password.max' => 'Mật khẩu không chứa quá 15 kí tự!',
        ];
    }
}
