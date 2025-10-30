<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate(
            [
                'email' => $socialUser->getEmail()
            ],
            [
                'name' => $socialUser->getName(),
                'password' => bcrypt('password')
            ]);
        Auth::login($user);
        return redirect()->route('home');


    }
}
