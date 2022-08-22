<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordFormRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token)
    {
        $user = User::find($request['user_id']);
        if ($user['remember_token'] == $token) {
            return view('auth.passwords.reset', compact('user'))->with(
                ['token' => $token, 'email' => $request->email]
            );
        }

        return abort(404, "No found page.");
    }

    public function reset(ResetPasswordFormRequest $request)
    {
        $user = User::find($request['user_id']);
        $request['password'] = bcrypt($request->password);
        $request['token'] = null;
        $user->update($request->all());

        Auth::login($user);
        return redirect('/')->with('success', __('message.success_forgot_password'));
    }
}
