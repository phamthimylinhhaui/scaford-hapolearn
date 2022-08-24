<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserProgramRequest;
use App\Models\Program;

class UserProgramController extends Controller
{
    public function store(StoreUserProgramRequest $request)
    {
        $program = Program::find($request['program_id']);

        if (!$program->isCompleteProgram()) {
            $program->users()->attach(auth()->id());
        }

        return redirect()->back();
    }
}
