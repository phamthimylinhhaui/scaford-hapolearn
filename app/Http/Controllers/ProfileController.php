<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileFormRequest;
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
            $imageName = time() .config('profile.config_name_avatar') .$request->file('image')->extension();
            $imagePath = request('image')->storeAs(config('profile.store_path'), $imageName);

            $request['avatar'] = config('profile.db_path'). $imagePath;
        }

        auth()->user()->update(array_filter($request->all()));
        return redirect()->route('profile.index')->with('success', __('profile.success_update_profile'));
    }
}
