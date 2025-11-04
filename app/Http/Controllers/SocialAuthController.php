<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        $allowed = ['google', 'facebook', 'github'];
        if (!in_array($provider, $allowed)) {
            abort(404);
        }
        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request, $provider)
    {
        $allowed = ['google', 'facebook', 'github'];
        if (!in_array($provider, $allowed)) {
            abort(404);
        }

        try{
            $socialUser = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->route('login')->with('Error', 'Social login failed');
        }

        $user = User::where('provider', $provider)
                    ->where('provider_id', $socialUser->getId())
                    ->first();

        if (! $user && $socialUser->getEmail()) {
            $user = User::where('email', $socialUser->getEmail())->first();
        }

        if (! $user) {
            $user = User::create([
                'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User',
                'email' => $socialUser->getEmail() ?? 'no-email-'.$provider.'-'.Str::random(6).'@example.com',
                'password' => Hash::make(Str::random(16)),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
            ]);

        } else {
            if (! $user->provider || ! $user->provider_id) {
                $user->update([
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                ]);
            }
        }

        // create JWT tokken for the user
        $token = JWTAuth::fromUser($user);

        $redirectUrl = route('social.handle') . '?token=' . $token;

        return redirect($redirectUrl);


    }
}
