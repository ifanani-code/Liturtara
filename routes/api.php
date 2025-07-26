<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaseOwner\Api\ReviewController;
use App\Http\Controllers\TopUpController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/midtrans-callback', [TopupController::class, 'callback'])->name('token.topup.callback');
