<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProgramRequest;
use App\Models\Program;
use Illuminate\Http\Request;

class UserProgramController extends Controller
{
    public function store(StoreUserProgramRequest $request)
    {
        $program = Program::find($request['program_id']);
        $program->users()->attach(auth()->id());

        return redirect()->back()->with('success', __('lesson_show.add_user_program_success'))->with('program', 'show');
    }
}
