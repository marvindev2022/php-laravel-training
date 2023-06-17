<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserVerifyExistence extends Controller
{
    public function checkUser(Request $request)
    {
        $useremail = $request->input('email');

        $user = DB::table('users')->where('email', $useremail)->first();

        if ($user) {
            return 'Usuário existe no cadastro';
        } else {
            return redirect()->route('register');
        }
    }
}
