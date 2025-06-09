<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CaseOwner\AuthController as CaseOwnerAuthController;
use App\Http\Controllers\CaseOwner\DashboardController as CaseOwnerDashboardController;
use App\Http\Controllers\CaseOwner\ReviewController as CaseOwnerReviewController;
use App\Http\Controllers\CaseOwner\TopUpController as CaseOwnerTopUpController;
use App\Http\Controllers\Talent\AuthController as TalentAuthController;
use App\Http\Controllers\Talent\DashboardController as TalentDashboardController;
use App\Http\Controllers\Reviewer\AuthController as ReviewerAuthController;
use App\Http\Controllers\Reviewer\DashboardController as ReviewerDashboardController;


Route::get('/', function(){
    return view('landing-page');
});


// GROUP ROUTE CASEOWNER
Route::prefix('caseowner')->name('caseowner.')->group(function() {
    // login
    Route::get('/login', [CaseOwnerAuthController::class, 'login'])->name('login');
    Route::post('/login', [CaseOwnerAuthController::class, 'loginPost'])->name('login.post');
    // regist
    Route::get('/register', [CaseOwnerAuthController::class, 'register'])->name('register');
    Route::post('/register', [CaseOwnerAuthController::class, 'registerPost'])->name('register.post');

    Route::middleware(['auth', 'verified'])->group(function() {
        // dashboard
        Route::get('/dashboard', [CaseOwnerDashboardController::class, 'dashboard'])->name('dashboard');
        // review solusi
        Route::get('/cases/{case}/review', [CaseOwnerReviewController::class, 'create'])->name('reviews.create');
        Route::post('/cases/{case}/review', [CaseOwnerReviewController::class, 'store'])->name('reviews.store');
        // token top-up
        Route::get('/topup', [CaseOwnerTopUpController::class, 'showForm'])->name('token.topup.form');
        Route::post('/topup', [CaseOwnerTopUpController::class, 'checkout'])->name('token.topup.checkout');
        Route::get('/payment-success', [CaseOwnerTopUpController::class, 'success'])->name('token.topup.success');
    });

});

// GROUP ROUTE TALENT
Route::prefix('talent')->name('talent.')->group(function() {
    Route::get('/login', [TalentAuthController::class, 'login'])->name('login');
    Route::post('/login', [TalentAuthController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [TalentAuthController::class, 'register'])->name('register');
    Route::post('/register', [TalentAuthController::class, 'registerPost'])->name('register.post');

    Route::middleware(['auth', 'verified'])->group(function() {
        Route::get('/dashboard', [TalentDashboardController::class, 'index'])->name('dashboard');
    });
});

// GROUP ROUTE REVIEWER
Route::prefix('reviewer')->name('reviewer.')->group(function() {
    Route::get('/login', [ReviewerAuthController::class, 'login'])->name('login');
    Route::post('/login', [ReviewerAuthController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [ReviewerAuthController::class, 'register'])->name('register');
    Route::post('/register', [ReviewerAuthController::class, 'registerPost'])->name('register.post');

    Route::middleware(['auth', 'verified'])->group(function() {
        Route::get('/dashboard', [ReviewerDashboardController::class, 'index'])->name('dashboard');
    });
});

// Global Logout
Route::post('/logout', function(){
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// email verification
Route::middleware('auth')->group(function(){
    // email verification notice
    Route::get('/email/verify', [AuthController::class, 'VerifyNotice'])
    ->name('verification.notice');
    // email verification handler
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'VerifyEmail'])
    ->middleware(['signed'])->name('verification.verify');
    // resending email verification
    Route::post('/email/verification-notification', [AuthController::class, "VerifyHandler"])
    ->middleware(['throttle:6,1'])->name('verification.send');
});

// forgot password
Route::middleware('guest')->group(function(){
    Route::view('/forgot-password', 'auth.forgot-password')
        ->name('password.request');

    Route::post('/forgot-password', [AuthController::class, "PasswordEmail"])
        ->name('password.email');

    Route::get('/reset-password/{token}', [AuthController::class,"PasswordReset"])
        ->name('password.reset');

    Route::post('/reset-password', [AuthController::class,"PasswordUpdate"])->middleware('guest')->name('password.update');
});

// sign in using google account
Route::get('auth/google', [AuthController::class, 'RedirectToGoogle'])->name('google.login');
Route::get('auth/google-callback', [AuthController::class, 'HandleGoogleCallback']);
