<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordFormRequest;
use App\Models\User;

class UserController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(ChangePasswordFormRequest $request)
    {
        $user = User::find(auth()->id());
        if (password_verify($request['old_password'], $user->password)) {
            $request['password'] = bcrypt($request['password']);
            $user->update($request->all());
            return redirect()->route('profile.index')->with('success', __('message.success_forgot_password'));
        }
        return redirect()->back()->with('error', __('message.error_old_password'));
    }
}
