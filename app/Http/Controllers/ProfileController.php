<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        $myCourses = Course::myCourses()->get();

        return view('profile', compact('myCourses'));
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = $request->all();
        dd($dataUpdate);
    }
}
