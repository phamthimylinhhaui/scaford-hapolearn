<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function edit($id)
    {
        $myCourses = Course::myCourses()->get();
        if (auth()->id() <> $id) {
            return 'khong phai user dang dang nhap';
        }

        return view('profile', compact('myCourses'));
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = $request->all();
        dd($dataUpdate);
    }
}
