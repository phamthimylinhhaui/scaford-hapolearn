<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileFormRequest;
use App\Http\Services\UserService;
use App\Models\Course;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        $myCourses = Course::myCourses()->get();

        return view('profile', compact('myCourses'));
    }

    public function update(ProfileFormRequest $request)
    {
        if ($request->has('image')) {
            $request['avatar'] = UserService::uploadAvatar(request('image'));
        }

        auth()->user()->update(array_filter($request->all()));
        return redirect()->route('profile.index')->with('success', __('profile.success_update_profile'));
    }
}
