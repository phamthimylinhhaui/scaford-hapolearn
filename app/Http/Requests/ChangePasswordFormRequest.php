<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordFormRequest extends FormRequest
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
            'old_password' => 'required|min:6',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('message.password_required'),
            'min' => __('message.password_min'),
            'password_confirmation.required' => __('message.password_confirmation_required'),
            'password_confirmation.min' => __('message.password_confirmation_min'),
            'password_confirmation.same' => __('message.password_confirmation_same'),
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => __('attribute.old_password'),
            'password' => __('attribute.password'),
            'password_confirmation' => __('attribute.password_confirm'),
        ];
    }
}
