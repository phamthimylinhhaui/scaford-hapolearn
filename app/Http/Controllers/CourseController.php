<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $reviews = $course->reviews()->get();
//        $reviews = $course->reviews()->orderBy('created_at', config('config.desc'))->get();

//        $user = $reviews->find(1)->user()->first();

//        dd($reviews->user);
//        foreach ($reviews as $review)
//        {
//           dd($review->user->dd());
//        }

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



//        $reviewsAsc = $course->reviews()->get()->orderby('created_at')->take(2);
//        $review = $reviews->user()->get();


//        $reviews = $course->reviews()->where('rate', 3)->dd();
//        dd($reviews);


//        $x = $course->users()->whereExists(function ($query) {
//            $query->where('user_id', Auth::id());
//        })->where('user_course.deleted_at', '<>', null)->dd();
//        dd($x);
        //show
        //  review
        //      review co the dung relationship hoac scope de sap xep review moi nhat
        //      reply review dung creat
        //      tinh chung tinh rate cua khoa hoc
        //      -chu y dat tên biến $data ->request
        //      dùng middleware ở route đối với review khi
        //      check nút gửi review nếu ng dùng chưa đăng ký khóa học, chưa đk thì k dc review
        //      dùng carbon để format date, viết lại thành attribute
    }
}
