<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;
use Illuminate\Http\Request;

class ReJoinCourse
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
        if (!$course->isJoined() || !$course->isDeleted()) {
            return redirect()->back()->with('error', __('course_show.cannot_rejoin_course'));
        }
        return $next($request);
    }
}
