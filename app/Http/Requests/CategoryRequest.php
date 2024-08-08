<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|max:255|unique:categories',
            'slug' => 'required|max:255|unique:categories',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
            'slug' => 'Đường dẫn',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng điền :attribute',
            'unique' => 'Đã có :attribute này',
            'max' => ':attribute tối đa 255 ký tự'
        ];
    }
}
