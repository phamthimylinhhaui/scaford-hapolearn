<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'user_name' => 'required|min:6|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => __('message.user_name_required'),
            'user_name.min' => __('message.user_name_min'),
            'user_name.unique' => __('message.user_name_unique'),
            'email.required' => __('message.email_required'),
            'email.unique' => __('message.email_unique'),
            'password.required' => __('message.password_required'),
            'password.min' => __('message.password_min'),
            'password.confirmed' => __('message.password_confirmed'),
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'Tên tài khoản',
            'email' => 'Email',
            'password' => 'Mật khẩu',
        ];
    }
}
