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
        $courses = (new Course())->ShowCourse();
        $otherCourses = (new Course())->OtherCourse();
        $feedbacks = (new Review())->Feedback();
        $totalCourse = (new Course())->all()->count();
        $totalLesson = (new Lesson())->all()->count();
        $totalLearner = (new UserCourse())->TotalLearner();

        return view('home', compact('courses', 'otherCourses', 'feedbacks', 'totalCourse', 'totalLesson', 'totalLearner'));
    }
}
