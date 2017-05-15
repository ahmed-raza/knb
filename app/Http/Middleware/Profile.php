<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Request;
use App\User;

class Profile
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
        $user = User::findorfail($id);
        if (Auth::check()) {
            if (Auth::user()->email == $user->email) {
                return $next($request);
            }
        }
        return abort(403);
    }
}
