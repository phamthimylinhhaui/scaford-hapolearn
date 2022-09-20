<?php

namespace App\Http\Controllers\Api;
use App\Enums\StatusCode;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginGoogleController
{
    public function getUrl($driver)
    {
//        return Socialite::driver('google')->stateless()
//            ->redirect()->getTargetUrl();
        return Socialite::driver($driver)->redirect();
    }

    public function callback(Request $request)
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
//        dd($googleUser);
//        $isRegistered = User::where('email', $googleUser->getEmail())->get();
        $isRegistered = User::where('email', $googleUser->getEmail())->first();
        dd($isRegistered);

        if ($isRegistered) {
            auth()->login($isRegistered, );
        } else {
            return 1;
        }
    }
}
