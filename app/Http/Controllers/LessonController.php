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
        $lesson = Lesson::find($id);
        $course = $lesson->course;
        $tags = $course->tags;
        $otherCourses = Course::otherCourse()->take(config('courses.show_other_course'))->get();
        $programs = $lesson->programs()->paginate(config('lessons.paginate_program'));
        $programLearns = 0;
        foreach ($lesson->programs as $program) {
            if ($program->isLearned()) {
                $programLearns++;
            }
        }

        return view('lessons.show', compact(
            'lesson',
            'course',
            'tags',
            'otherCourses',
            'programs',
            'programLearns'
        ));
    }
}
