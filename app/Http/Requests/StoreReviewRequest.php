<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
            'content' => 'required',
            'course_id' => 'required|integer',
            'rate' => 'required|integer|between:1,5',
        ];
    }

    public function messages()
    {
        return [
            'course_id.required' => __('courses.course_id_required'),
            'course_id.integer' => __('courses.course_id_integer'),
            'content.required' => __('reviews.content'),
        ];
    }
}
