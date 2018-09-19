<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch($guard)
        {
            case 'admin': // you want to access the admin
                if (Auth::guard($guard)->check()) { // and you're looged in as anadmin
                    return redirect()->route('admin.dashboard');
                }
                break;
            case 'teacher': // you want to access the admin
                if (Auth::guard($guard)->check()) { // and you're looged in as anadmin
                    return redirect()->route('teacher.dashboard');
                }
                break;

            default:
            if (Auth::guard($guard)->check()) {
                return redirect()->route('login');
            }

            break;

        }
        
        // return them to the next request if all else fails 

        return $next($request);
    }
}
