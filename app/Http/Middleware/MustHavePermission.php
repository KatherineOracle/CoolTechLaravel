<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MustHavePermission
{
    /**
     * Handle an incoming request based on logged in user role.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if( Auth::check() )
        {
            /** @var User $user */
            $user = Auth::user();

            // allow admin to proceed with request
            if ( $user->hasRole($role) ) {
                return $next($request);
            }

            // allow admin to proceed with request
            if ( $user->hasRole(0) ) {
                return redirect('dashboard')->withErrors("Access forbidden");
            }
        }

        abort(403);  // permission denied error
    }
}

