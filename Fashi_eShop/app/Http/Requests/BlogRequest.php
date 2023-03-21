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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=650, max_height=650',
            'title' => 'required|max:200',
            'subtitle' => 'required|max:255',
            'content' => 'required',
            'blog_category_id' => 'required|not_in:-1',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'The image field is required',
            'blog_category_id.required' => 'The selected blog category is invalid',
        ];
    }
}
