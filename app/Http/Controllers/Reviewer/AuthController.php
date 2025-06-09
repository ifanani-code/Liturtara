<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\StrongPassword;

class AuthController extends Controller
{
    public function login()
    {
        return view('reviewer.auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role !== 'reviewer') {
                Auth::logout();
                return redirect()->route('reviewer.login')->with('error', 'Unauthorized role');
            }
            event(new Registered($user));
            return redirect()->route('reviewer.dashboard');
        }

        return redirect()->route('reviewer.login')->with('error', 'Invalid credentials');
    }

    public function register()
    {
        return view('reviewer.auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            "email" => "required|email|unique:users,email",
            "phone_number" => "required|numeric",
            "password" => [
                "required",
                "min:6",
                "confirmed",
                new StrongPassword()
            ],
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->role = 'reviewer';

        if ($user->save()) {
            event(new Registered($user));
            Auth::login($user);
            return redirect()->route('reviewer.dashboard');
        }

        return redirect()->route('reviewer.register')->with('error', 'Failed to register');
    }
}
