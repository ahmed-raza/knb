<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Request;

class Ad
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
        $id = $request->route()->parameters();
        $ad = \App\Ad::findOrFail($id['ad']);
        if ((Auth::check() && Auth::user()->id === $ad->user->id) || (Auth::check() && Auth::user()->isAdmin())) {
            return $next($request);
        }
        return response()->view('errors.403');
    }
}
