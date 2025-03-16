<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StripeController;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(MemberController::class)->group(function () {
    Route::get('/user', 'index')->middleware('auth:api');
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::get('/user/{id}', [MemberController::class, 'show'])->middleware('auth:api');
    Route::put('/user/{member}', [MemberController::class, 'update'])->middleware('auth:api');
    Route::delete('/user/{member}', [MemberController::class, 'destroy'])->middleware('auth:api');
    Route::patch('/user/{member}', [MemberController::class, 'update'])->middleware('auth:api');
});

Route::controller(AdvertController::class)->group(function () {
    Route::get('/adverts', 'index');
    Route::post('/adverts', 'store');
    Route::get('/adverts/{id}', 'show');
});

Route::post('/upload', [FileUploadController::class, 'upload']);
Route::post('/books', [BookController::class, 'store'])->middleware('auth:api');

Route::post('/checkout', [StripeController::class, 'checkout']);
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'index'])->name('cancel');

