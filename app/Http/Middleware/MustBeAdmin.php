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
//        $userRole =;

        if ( Auth::check() &&  $user->is('admin') == true )
        {
            return $next($request);
        }

        return redirect('/');
//        abort(404, 'Access denied!');
    }

}
