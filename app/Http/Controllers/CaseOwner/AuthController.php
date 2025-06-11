<?php

namespace App\Http\Controllers\CaseOwner;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\StrongPassword;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends \App\Http\Controllers\AuthController
{
    public function login()
    {
        return view('caseowner.auth.sign_in');
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
            if ($user->role !== 'case owner') {
                Auth::logout();
                return redirect()->route('caseowner.login')->with('error', 'Unauthorized role');
            }
            event(new Registered($user));
            return redirect()->route('caseowner.dashboard');
        }

        return redirect()->route('caseowner.login')->with('error', 'Invalid credentials');
    }

    public function register()
    {
        return view('caseowner.auth.regist');
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
        $user->role = 'case owner';

        if ($user->save()) {
            // ✅ Buat data di tabel tokens
            $user->tokens()->create([
                'amount' => 0, // default sesuai struktur tabel
            ]);

            // ✅ Buat data di tabel user_points
            $user->userPoint()->create([
                'points' => 0,
                'level' => 'Beginner', // default sesuai struktur tabel
            ]);

            // ✅ Buat data di tabel profile
            $user->profile()->create([
                'full_name' => '', // atau sesuaikan jika kamu minta input
                'phone_number' => $user->phone_number,
                'birth_date' => null,
                'address' => null,
            ]);

            event(new Registered($user));
            Auth::login($user);
            return redirect()->route('caseowner.dashboard');
        }

        return redirect()->route('caseowner.register')->with('error', 'Failed to register');
    }

}
