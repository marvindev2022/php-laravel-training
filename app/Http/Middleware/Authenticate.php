namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
public function handle($request, Closure $next)
{
if (!$request->expectsJson() && !$request->is('login')) {
return redirect()->route('login');
}

return $next($request);
}
}
