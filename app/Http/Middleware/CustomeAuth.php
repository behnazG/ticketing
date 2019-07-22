<?php

namespace App\Http\Middleware;

use App\UserAuthorise;
use Closure;

class CustomeAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->path());
        $path = $request->path();
        if (strstr($path, 'users/')) {
            $user = $request->route('user');
            if (!is_null($user)) {
                if (auth()->user()->id != $user->id) {
                    $u_a = UserAuthorise::where('field_name', 'admin_users')->where('user_id', auth()->user()->id)->where('field_value', 1)->get();
                    if ($u_a->isEmpty())
                        abort(401, "users");
                }
            }else
            {
                $u_a = UserAuthorise::where('field_name', 'admin_users')->where('user_id', auth()->user()->id)->where('field_value', 1)->get();
                if ($u_a->isEmpty())
                    abort(401, "users");
            }
        }
        return $next($request);
    }
}
