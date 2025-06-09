<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaseOwner\Api\ReviewController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['role:case owner'])->group(function () {
    Route::get('/cases/{case}/review', [ReviewController::class, 'show'])->name('api.reviews.show');
    Route::post('/cases/{case}/review', [ReviewController::class, 'store'])->name('api.reviews.store');
});
