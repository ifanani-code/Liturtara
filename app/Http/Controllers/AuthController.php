<?php

namespace App\Http\Controllers;

use App\Rules\StrongPassword;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // EMAIL VERIFICATION
    public function VerifyNotice()
    {
        return view('auth.email-verification');
    }

    public function VerifyEmail(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectToDashboard($request->user()));
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect($this->redirectToDashboard($request->user()))
            ->with('verified', true);
    }

    // resending email verification
    public function VerifyHandler(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectToDashboard($request->user()));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    protected function redirectToDashboard($user)
    {
        return match ($user->role) {
            'case owner' => route('caseowner.dashboard'),
            'talent' => route('talent.dashboard'),
            'reviewer' => route('reviewer.dashboard'),
            default => '/',
        };
    }

    // RESET PASSWORD
    public function PasswordEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function PasswordReset(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function PasswordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                'confirmed',
                new StrongPassword()
            ],
        ]);

        $redirect = null;

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) use (&$redirect) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));

                // Tentukan redirect berdasarkan role
                $redirect = match ($user->role) {
                    'case owner' => route('caseowner.login'),
                    'talent' => route('talent.login'),
                    'reviewer' => route('reviewer.login'),
                    default => '/',
                };
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect($redirect)->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    // GOOGLE AUTH
    public function RedirectToGoogle(Request $request)
    {
        session(['role' => $request->role]);
        return Socialite::driver('google')->redirect();
    }
    public function HandleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $role = session('role'); // Ambil role dari session

            // Cek apakah user sudah ada berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Jika user sudah ada, cek apakah role-nya cocok
                if ($user->role !== $role) {
                    return redirect()->to(match ($user->role) {
                        'case owner' => route('caseowner.login'),
                        'talent' => route('talent.login'),
                        'reviewer' => route('reviewer.login'),
                    })->with('error', "This email already registered as $user->role");
                }
            } else {
                // Buat akun baru
                $user = User::create([
                    'email' => $googleUser->getEmail(),
                    'phone_number' => $googleUser->user['phoneNumber'] ?? null,
                    'password' => bcrypt(Str::random(16)),
                    'role' => $role,
                    'email_verified_at' => now(),
                    'is_verified' => false
                ]);
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
                }
            Auth::login($user);

            // Redirect sesuai role
            return redirect()->to(match ($user->role) {
                'case owner' => route('caseowner.dashboard'),
                'talent' => route('talent.dashboard'),
                'reviewer' => route('reviewer.dashboard'),
            });

        } catch (\Exception $role) {
            $role = session('role');
            return redirect()->to(match ($role) {
                'case owner' => route('caseowner.login'),
                'talent' => route('talent.login'),
                'reviewer' => route('reviewer.login'),
                default => '/',
            })->with('error', "Failed to login as a $role");
        }
    }


}
