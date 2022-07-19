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
            'user_name' => 'required|min:6|alpha_dash|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => __('message.user_name_required'),
            'user_name.min' => __('message.user_name_min'),
            'user_name.unique' => __('message.user_name_unique'),
            'user_name.alpha_dash' => __('message.user_name_alpha_dash'),
            'email.required' => __('message.email_required'),
            'email.unique' => __('message.email_unique'),
            'email.email' => __('message.email_email'),
            'password.required' => __('message.password_required'),
            'password.min' => __('message.password_min'),
            'password_confirmation.required' => __('message.password_confirmation_required'),
            'password_confirmation.min' => __('message.password_confirmation_min'),
            'password_confirmation.same' => __('message.password_confirmation_same'),
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'Tên tài khoản',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Nhập lại mật khẩu',
        ];
    }
}
