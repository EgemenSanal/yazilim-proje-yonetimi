<?php

use App\Http\Controllers\MemberController;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(MemberController::class)->group(function () {
    Route::get('/user', 'index');
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});
