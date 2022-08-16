<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileFormRequest;
use App\Http\Services\UserService;
use App\Models\Course;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $myCourses = Course::myCourses()->get();

        return view('profile', compact('myCourses'));
    }

    public function update(ProfileFormRequest $request)
    {
        if ($request->has('image')) {
            $request['avatar'] = $this->user->uploadAvatar(request('image'));
        }

        auth()->user()->update(array_filter($request->all()));
        return redirect()->route('profile.index')->with('success', __('profile.success_update_profile'));
    }
}
