<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordFormRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => __('message.required'),
            'user_id.integer' => __('message.integer'),
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
            'password' => __('attribute.password'),
            'password_confirmation' => __('attribute.password_confirm'),
        ];
    }
}
