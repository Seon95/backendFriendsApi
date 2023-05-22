<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FriendsController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/friends', [FriendsController::class, 'index']);
Route::get('/friends/{id}', [FriendsController::class, 'show']);
Route::post('/friends', [FriendsController::class, 'store']);
Route::put('/friends/{id}', [FriendsController::class, 'update']);
Route::delete('/friends/{id}', [FriendsController::class, 'destroy']);
