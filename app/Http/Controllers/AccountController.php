<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->get('jwt_user');
        if (! $user) {
            try {
                $user =JWTAuth::parseToken()->authenticate();

            } catch (\Exception $e) {
                return redirect()->route('login');
            }
        }
        return view('account.index', compact('user'));
    }
    
}
