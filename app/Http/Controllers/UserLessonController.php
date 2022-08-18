<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserLessonRequest;
use App\Models\Lesson;

class UserLessonController extends Controller
{
    public function store(StoreUserLessonRequest $request)
    {
        $lesson = Lesson::find($request['lesson_id']);
        if (!$lesson->isLearnedLesson()) {
            $lesson->users()->attach(auth()->id());
        }

        return redirect()->route('lessons.show', [$request['lesson_id']]);
    }
}
