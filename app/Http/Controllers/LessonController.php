<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\UserProgram;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($id)
    {
        if (!is_numeric($id) || $id > Lesson::count()) {
            abort(404, 'Not Found.');
        }

        $lesson = Lesson::find($id);
        $course = $lesson->course;
        $tags = $course->tags;
        $otherCourses = Course::otherCourse()->take(config('courses.show_other_course'))->get();
        $programs = $lesson->programs()->paginate(config('lessons.paginate_program'));

        return view('lessons.show', compact(
            'lesson',
            'course',
            'tags',
            'otherCourses',
            'programs',
        ));
    }
}
