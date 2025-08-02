<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\TopupController;
// Case owner's controllers
use App\Http\Controllers\CaseOwner\AuthController as CaseOwnerAuthController;
use App\Http\Controllers\CaseOwner\CasesController as CaseOwnerCasesController;
use App\Http\Controllers\CaseOwner\DashboardController as CaseOwnerDashboardController;
use App\Http\Controllers\CaseOwner\ReviewController as CaseOwnerReviewController;
// Talent's controllers
use App\Http\Controllers\Talent\CasesController as TalentCasesController;
use App\Http\Controllers\Talent\AuthController as TalentAuthController;
use App\Http\Controllers\Talent\DashboardController as TalentDashboardController;
// Reviewer's controllers
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
        Route::get('/case/{caseId}/proposals', [CaseOwnerCasesController::class, 'viewProposals'])->name('caseowner.proposals');
        Route::post('/proposal/{proposalId}/accept', [CaseOwnerCasesController::class, 'acceptProposal'])->name('caseowner.acceptProposal');
        // review solusi
        Route::get('/cases/{case}/review', [CaseOwnerReviewController::class, 'create'])->name('reviews.create');
        Route::post('/cases/{case}/review', [CaseOwnerReviewController::class, 'store'])->name('reviews.store');
    });

});

// GROUP ROUTE TALENT
Route::prefix('talent')->name('talent.')->group(function() {
    // login
    Route::get('/login', [TalentAuthController::class, 'login'])->name('login');
    Route::post('/login', [TalentAuthController::class, 'loginPost'])->name('login.post');
    // regist
    Route::get('/register', [TalentAuthController::class, 'register'])->name('register');
    Route::post('/register', [TalentAuthController::class, 'registerPost'])->name('register.post');

    Route::middleware(['auth', 'verified'])->group(function() {
        // dasboard
        Route::get('/dashboard', [TalentDashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/dashboard/case-list', [TalentDashboardController::class, 'dashboard'])->name('dashboard.case-list');
        Route::get('/dashboard/explore-case', [TalentDashboardController::class, 'dashboard'])->name('dashboard.explore-case');
        Route::get('/dashboard/solution-status', [TalentDashboardController::class, 'dashboard'])->name('dashboard.solution-status');
        // cases
        Route::get('/cases', [TalentCasesController::class, 'listAvailableCases'])->name('availableCases');
        Route::get('/cases/search', [TalentCasesController::class, 'index'])->name('index');
        Route::post('/cases/{caseId}/proposal', [TalentCasesController::class, 'submitProposal'])->name('submitProposal');
        Route::get('/projects', [TalentCasesController::class, 'myProjects'])->name('myProjects');
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
Route::get('auth/google/{role}', [AuthController::class, 'RedirectToGoogle'])->name('google.login');
Route::get('auth/google-callback/', [AuthController::class, 'HandleGoogleCallback']);

// token top-up
Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/topup', [TopupController::class, 'showForm'])->name('token.topup.form');
    Route::post('/topup', [TopupController::class, 'checkout'])->name('token.topup.checkout');
    Route::get('/payment-success', [TopupController::class, 'success'])->name('token.topup.success');
    // Route::get('/invoice/{id}', [TopupController::class, 'invoice']);
});
