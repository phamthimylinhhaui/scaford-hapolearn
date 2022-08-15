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
            'full_name' => 'required|min:6',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable',
            'email' => 'nullable|email|unique:users',
            'phone' => 'nullable|digits:10|regex:/[0-9]{9,}/',
            'about_me' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'max' => __('validation.max'),
            'min' => __('validation.min'),
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => __('artribute.full_name'),
            'avatar' => __('artribute.avatar'),
            'phone' => __('artribute.phone'),
            'date_of_birth' => __('artribute.birthday'),
            'address' => __('artribute.address'),
            'email' => __('artribute.email'),
            'about_me' => __('artribute.about'),
        ];
    }
}
