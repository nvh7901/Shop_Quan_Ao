<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Vui lòng nhập tên bài viết',
            'subtitle.required' => 'Vui lòng nhập tiêu đề bài viết',
            'content.required' => 'Vui lòng nhập mô tả bài viết', 
        ];
    }
}
