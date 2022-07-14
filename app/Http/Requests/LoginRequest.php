<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'user_name' => 'required|min:6|alpha_dash',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => ':attribute  không được để trống!',
            'user_name.min' => ':attribute không được ít hơn :min ký tự',
            'user_name.alpha_dash' => ':attribute không được chứa các ký tự đặc biệt và khoảng trắng',
            'password.required' => ':attribute không được để trống!',
            'password.min' => ':attribute không được ít hơn :min ký tự ',
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'Tên tài khoản',
            'password' => 'Mật khẩu',
        ];
    }
}
