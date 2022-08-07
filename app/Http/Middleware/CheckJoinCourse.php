<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;
use Illuminate\Http\Request;

class CheckJoinCourse
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
        $course = Course::find($request['course_id']);
        if ($course->IsJoined()) {
            return redirect()->back()->with('error', config('config.cannot_join_course'));
        }

        return $next($request);
    }
}