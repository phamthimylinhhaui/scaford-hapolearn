<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCourseFormRequest;
use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{
    public function store(RegisterCourseFormRequest $request)
    {
        $course = Course::find($request['course_id']);
        $course->users()->attach(Auth::id());

        return redirect()->back()->with('success', config('courses.register_course_success'));
    }

    public function destroy($id)
    {
        UserCourse::where([
            'course_id' => $id,
            'user_id' => auth()->id()
        ])->delete();

        return redirect()->back()->with('success', config('courses.success_soft_delete'));
    }
}
