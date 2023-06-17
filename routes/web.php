<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserVerifyExistence;

Route::get('/', function (Request $request, $email) {
    $user = User::where('email', $email)->first();

    if ($user) {
        return response()->json(['message' => 'Usuário já cadastrado'], 200);
    }

    return response()->json(['message' => 'Usuário não cadastrado'], 200);
})->name('check.user.exists');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/userverifyexistence', [UserVerifyExistence::class, 'checkUser'])
    ->middleware('user.exists')
    ->name('userverifyexistence');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');
