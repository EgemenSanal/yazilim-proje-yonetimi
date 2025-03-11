<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(MemberController::class)->group(function () {
    Route::get('/user', 'index')->middleware('auth:api');
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::get('/user/{id}', [MemberController::class, 'show'])->middleware('auth:api');
    Route::put('/user/{member}', [MemberController::class, 'update'])->middleware('auth:api');
    Route::delete('/user/{member}', [MemberController::class, 'destroy'])->middleware('auth:api');
    Route::patch('/user/{member}', [MemberController::class, 'update'])->middleware('auth:api');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index');
    Route::post('/books', 'store');
});
