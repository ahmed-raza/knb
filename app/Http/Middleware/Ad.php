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
        $id = explode("/", Request::url())[4];
        $ad = \App\Ad::findOrFail($id);
        if (Auth::check()) {
            if (Auth::user()->id === $ad->user_id) {
                return $next($request);
            }
            return redirect('ads/'.$id)->with('error', 'You don\'t own that ad.');
        }
        return redirect('login')->with('error', 'You need to login first.');
    }
}
