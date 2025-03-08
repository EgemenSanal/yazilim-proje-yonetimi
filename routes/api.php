<?php

use App\Http\Controllers\MembersController;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(MembersController::class)->group(function () {

    Route::get('/user', 'index');

});
