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
            // 'brand_id' => 'required|not_in:-1',
            'product_category_id' => 'required|not_in:-1',
            'name' => 'required|regex:/^[\pL\s]+$/u|max:50|unique:products',
            'price' => 'required|numeric|max:50',
            'tag' => 'required|regex:/^[\pL\s]+$/u|max:50',
            'featured' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            // 'brand_id.not_in' => 'The selected brand is invalid',
            'product_category_id.not_in' => 'The selected category is invalid',
            'price.max' => 'The price is not valid'
        ];
    }
}
