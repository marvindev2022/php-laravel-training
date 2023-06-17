<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class RedirectIfUserNotExists
{
public function handle($request, Closure $next)
{
$useremail = $request->input('email');

$user = DB::table('users')->where('email', $useremail)->first();

if (!$user) {
return redirect()->route('register');
}

return $next($request);
}
}
