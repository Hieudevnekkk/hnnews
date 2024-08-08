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
            'email' => 'required|max:255',
            'password' => 'required|min:8',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Mật khẩu',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute!',
            'max' => ':attribute tối đa 255 ký tự!',
            'min' => ':attribute ít nhất 8 ký tự!'
        ];
    }
}
