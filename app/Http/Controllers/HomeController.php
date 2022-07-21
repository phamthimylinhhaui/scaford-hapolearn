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
        $courses = Course::ShowCourse();
        $otherCourses = Course::OtherCourse();
        $feedbacks = Review::Feedback();
        $totalCourse = Course::all()->count();
        $totalLesson = Lesson::all()->count();
        $totalLearner = UserCourse::TotalLearner();

        return view('home', compact('courses', 'otherCourses', 'feedbacks', 'totalCourse', 'totalLesson', 'totalLearner'));
    }
}
