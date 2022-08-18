<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProgramRequest;
use App\Models\Program;

class UserProgramController extends Controller
{
    public function store(StoreUserProgramRequest $request)
    {
        $program = Program::find($request['program_id']);
        $program->users()->attach(auth()->id());

        return redirect()->back()->with('success', __('lesson_show.complete_program'))->with('program', 'show');
    }
}
