<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCourseFormRequest;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function store(RegisterCourseFormRequest $request)
    {
        $course = Course::find($request['course_id']);
        $course->users()->attach(Auth::id());

        return redirect()->back()->with('success', __('course_show.register_course_success'));
    }

    public function destroy($id)
    {
        UserCourse::where([
            'course_id' => $id,
            'user_id' => auth()->id()
        ])->delete();

        return redirect()->back()->with('success', __('course_show.success_soft_delete'));
    }

    public function update(RegisterCourseFormRequest $request)
    {
        UserCourse::withTrashed()
            ->where('course_id', $request['course_id'])->where('user_id', auth()->id())
            ->restore();

        return redirect()->back()->with('success', __('Tham gia lại thành công'));
    }
}
