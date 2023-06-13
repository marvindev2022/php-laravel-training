<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasApiTokens;

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $user->createToken('authToken')->plainTextToken
            ]);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
