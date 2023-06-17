<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
/**
* Processa o login do usuário.
*/
public function login(Request $request)
{
$request->validate([
'email' => 'required|email',
'password' => 'required',
]);

$credentials = $request->only('email', 'password');

if (Auth::attempt($credentials)) {
$user = User::where('email', $request->email)->first();
$token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 200);
        }

return response()->json(['message' => 'Credenciais inválidas'], 401);
}
}
