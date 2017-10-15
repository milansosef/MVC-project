<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ( Auth::check() &&  $user->is('admin') == true )
        {
            return $next($request);
        }

        //TODO: Fix the 'You don't have access to this page message'
        return redirect('/');
//        abort(404, 'You don't have access to this page');
    }

}
