<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $token = strtoupper(Str::random(10));
        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            return redirect()->back()->with('error', __('message.email_dont_exists'));
        }

        $user->update(['remember_token', $token]);

        Mail::send('auth.passwords.mail_send', compact('user'), function ($email) use ($user) {
            $email->subject('HapoLearn - Lấy lại mật khẩu');
            $email->to($user->email);
        });

        return redirect()->back()->with('success', __('message.success_send_mail'))->with(compact('user'));
    }
}
