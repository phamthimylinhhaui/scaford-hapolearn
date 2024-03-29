<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCourseFormRequest extends FormRequest
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
            'course_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'course_id.required' => __('courses.course_id_required'),
            'course_id.numeric' => __('courses.course_id_numeric')
        ];
    }
}
