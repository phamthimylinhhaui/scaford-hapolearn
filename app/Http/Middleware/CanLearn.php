<?php

namespace App\Http\Middleware;

use App\Models\Program;
use Closure;
use Illuminate\Http\Request;

class CanLearn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $program = Program::find($request['program_id']);
        $course = $program->lesson->course;

        if (!$course->isJoined()) {
            return redirect()->back()->with('error', __('lesson_show.cannot_learn'))->with('program', 'show');
        }

        if ($program->isLearned()) {
            return redirect()->back()->with('error', __('lesson_show.learned'))->with('program', 'show');
        }

        return $next($request);
    }
}
