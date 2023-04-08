<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'tag' => 'required',
            'featured' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_category_id.required' => 'Vui lòng chọn loại sản phẩm',
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Vui lòng nhập lại giá sản phẩm',
            'tag.required' => 'Vui lòng nhập tag sản phẩm',
            'description.required' => 'Vui lòng nhập mô tả sản phẩm',
            'featured.required' => 'Vui lòng chọn sản phẩm nổi bật',
        ];
    }
}
