<?php

namespace App\Http\Requests;

use App\Rules\User\EmailRule;
use App\Rules\User\RegexPhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => ['required', new EmailRule],
            'password' => 'required',
            'town_city' => 'required',
            'street_address' => 'required',
            'phone'=> ['required', 'numeric', new RegexPhoneRule],
            'level' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'town_city.required' => 'Vui lòng nhập thành phố',
            'street_address.required' => 'Vui lòng nhập địa chỉ',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Vui lòng nhập lại số điện thoại',
            'level.required' => 'Vui lòng nhập vai trò',
        ];
    }
}
