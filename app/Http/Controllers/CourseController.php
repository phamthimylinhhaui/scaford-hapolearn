<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseService;
    public function __construct(
        CourseService $courseService
    ) {
        $this->courseService = $courseService;
    }

    public function testRepository()
    {
        return $this->courseService->testRepository();
    }
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
        if (!is_numeric($id) || $id > Course::count()) {
            abort(404, 'Not Found.');
        }

        $course = Course::find($id);
        $otherCourses = Course::otherCourse()->take(config('courses.show_other_course'))->get();
        $tags = $course->tags;
        $lessons = $course->lessons()->search($request->all())->orderBy('order')->paginate(config('courses.paginate_course_show_lesson'));
        $teachers = $course->teachers;
        $numberOfStars = $course->getNumberOfStars();
        $reviews = $course->reviews()->orderBy('created_at', config('config.desc'))
            ->paginate(config('courses.paginate_course_show_review'), ['*'], 'review');

        return view('courses.show.main', compact(
            'course',
            'lessons',
            'otherCourses',
            'tags',
            'teachers',
            'numberOfStars',
            'reviews'
        ));
    }
}
