<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\MessageController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/topics', [TopicController::class, 'index']);
Route::post('/topics', [TopicController::class, 'store']);
Route::get('/topics/{id}', [TopicController::class, 'show']);
Route::put('/topics/{id}', [TopicController::class, 'update']);
Route::delete('/topics/{id}', [TopicController::class, 'destroy']);

Route::get('/topics/{id}/messages', [MessageController::class, 'index']);
Route::post('/topics/{id}/messages', [MessageController::class, 'store']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
