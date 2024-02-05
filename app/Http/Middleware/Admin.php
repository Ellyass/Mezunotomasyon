<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!\Auth::guest() && \Auth::user()->role=='admin'){
            return $next($request);
        }

        elseif (!\Auth::guest() && \Auth::user()->role=='employer'){
            return $next($request);
        }

        elseif (!\Auth::guest() && \Auth::user()->role=='user'){
            return redirect(route('home.Index'));
        }

        else{
            return redirect(route('admin.Login'))->with('error','Erişim yetkiniz Yok');
        }
        return redirect(route('admin.Login'));
    }

}
