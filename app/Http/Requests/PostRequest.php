<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_id' => 'required',
            'title' => ['required','max:255'],
            'slug' => ['required','unique:posts','max:255'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            'name_author' => ['required','max:255'],
        ];
    }
    
    public function attributes()
    {
        return [
            'category_id' => 'Danh mục',
            'title' => 'Tên bài viết',
            'slug' => 'Đường dẫn',
            'image' => 'Hình ảnh',
            'content' => 'Nội dung',
            'name_author' => 'Tên tác giả',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được để trống :attribute',
            'unique' => 'Đã có :attribute này',
            'title.max' => 'Tên bài viết tối đa 255 ký tự',
            'slug.max' => 'Đường dẫn tối đa 255 ký tự',
            'image.max' => 'Ảnh phải từ 2MB trở xuống',
            'name_author.max' => 'Tên tác giả tối đa 255 ký tự',
        ];
    }
}
