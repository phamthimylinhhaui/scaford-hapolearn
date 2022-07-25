<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\UserCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::main();
        $otherCourses = Course::otherCourse();
        $feedbacks = Review::feedback();
        $totalCourse = Course::count();
        $totalLesson = Lesson::count();
        $totalLearner = UserCourse::learner();

        return view('home', compact('courses', 'otherCourses', 'feedbacks', 'totalCourse', 'totalLesson', 'totalLearner'));
    }
}
