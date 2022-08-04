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


//        $x = $course->users()->whereExists(function ($query) {
//            $query->where('user_id', Auth::id());
//        })->where('user_course.deleted_at', '<>', null)->dd();
//        dd($check);
        //show
        //  review
        //      review co the dung relationship hoac scope de sap xep review moi nhat
        //      reply review dung creat
        //      tinh chung tinh rate cua khoa hoc
        //      -chu y dat tên biến $data ->request
        //      dùng middleware ở route đối với review khi
        //      check nút gửi review nếu ng dùng chưa đăng ký khóa học, chưa đk thì k dc review
        //      dùng carbon để format date, viết lại thành attribute


        // tham gia khoa hoc co
        //      form request
        //      dung laravel attach để create usercourse
        //      dk khi da dang nhap (dung auth() se luu id phien user dang dang nhap)
        //      check đã đăng nhập chưa $this->users()->where('id', auth()->user()->id)->count()
        //      function return true, false thì getIsJoinedAttribute

        // giao diện
        //  https://getbootstrap.com/docs/4.1/components/collapse/




//        foreach ($teachers as $index => $teacher)
//        {
//            echo "<pre>";
//            print_r($teacher->exp);
//            echo "</pre";
//        }
//        dd($x);

        return view('courses.show', compact('course', 'lessons', 'otherCourses', 'tags', 'teachers', 'checkJoined', 'checkFinishCourse'));
    }
}
