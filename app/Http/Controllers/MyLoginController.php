<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class MyLoginController extends Controller
{
    public function authenticate(Request $request)
    {
        Log::info('Authenticate');
        $credentials = $request->only('email', 'password');
        //echo('hello world');
        //var_dump($credentials);

        if (Auth::attempt($credentials)) {
            Log::info('Logging in succeeded');
            return redirect()->intended('/articles/create');
        } else {
            Log::info('login failed');
            abort(403);
        }
    }

    public function logout() {
        Auth::logout();
    }

    public function showLogin() {
        Log::info('loginshow');
        return view('login');
    }
}
