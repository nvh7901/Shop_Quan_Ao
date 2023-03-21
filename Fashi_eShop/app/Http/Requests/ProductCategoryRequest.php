<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
            // regex:/^[\pL\s]+$/u cho phép nhập từ a-z A-Z, nhập khoảng trắng, không cho nhập các ký tự khác
            'name' => 'required|regex:/^[\pL\s]+$/u|min:3|max:50|unique:product_categories',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'required' => ' Không được để trống',
    //         'min' => 'Không được nhỏ hơn 5',
    //         'max' => 'Không được lớn hơn 255',
    //     ];
    // }
}
