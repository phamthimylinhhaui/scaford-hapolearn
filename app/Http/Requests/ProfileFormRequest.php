<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
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
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'full_name' => 'nullable|min:6',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string',
            'email' => 'nullable|email|unique:users',
            'phone' => 'nullable|digits:10|regex:/[0-9]{9,}/',
            'about_me' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'string' => __('message.string'),
            'image' => __('message.image'),
            'mimes' => __('message.mimes'),
            'email' => __('message.email'),
            'max' => __('message.max'),
            'min' => __('message.min'),
            'date' => __('message.date'),
            'email.unique' => __('message.email_unique'),
            'phone.digits' => __('message.digits_phone'),
            'phone.regex' => __('message.regex_phone'),
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => __('attribute.full_name'),
            'avatar' => __('attribute.avatar'),
            'phone' => __('attribute.phone'),
            'date_of_birth' => __('attribute.birthday'),
            'address' => __('attribute.address'),
            'email' => __('attribute.email'),
            'about_me' => __('attribute.about_me'),
        ];
    }
}
