<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();

        $teachers = User::teachers()->get();
        $tags = Tag::all();
        $courses = Course::search($data)->paginate(config('courses.paginate'));

        return view('courses.index', compact('teachers', 'tags', 'courses', 'data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!is_numeric($id)) {
            return redirect('/courses')->with('error', config('config.404_course_show'));
        }

        $course = Course::find($id);
        $otherCourses = Course::otherCourse()->take(config('courses.show_other_course'))->get();
        $tags = $course->tags;
        $lessons = $course->lessons()->search($request->all())->paginate(config('courses.paginate_course_show_lesson'));
        $teachers = $course->teachers()->get();
        $checkJoined = $course->isJoined();
        $checkFinishCourse = $course->isSoftDelete();
        $countStar = $course->getCountStars();
        $reviews = $course->reviews()->orderBy('created_at', config('config.desc'))->get();

        return view('courses.show.show', compact(
            'course',
            'lessons',
            'otherCourses',
            'tags',
            'teachers',
            'checkJoined',
            'checkFinishCourse',
            'countStar',
            'reviews'
        ));
    }
}
