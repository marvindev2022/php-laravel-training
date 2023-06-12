<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
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


      public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'User registered successfully'], 201);
    }
}
