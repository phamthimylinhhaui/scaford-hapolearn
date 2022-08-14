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
//dd(array_filter($request->all()));

    public function update(ProfileFormRequest $request, $id)
    {
        if ($request->has('image')) {
            $fileName = time() .'-'. 'user-avatar'. '.' . $request->file('image')->extension();
            $path = $request->file('image')->storeAs('public/profile', $fileName);
            $request['avatar'] = 'storage/'. substr($path, strlen('public/'));
//            dd($path);
        }
//                dd($request->all());

        auth()->user()->update($request->all());
        return redirect()->route('profile.index');

//       dd($request->file('avatar'));
//       dd($request->file('avatar')->store('profiles'));
//        $path = $request->file('avatar')->store('public/profile');
//        dd(asset(substr($path, strlen('public/'))));
    }
}
