<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // middleware buatan sendiri, kalo udah bikin
    // kita harus daftarin middleware ini ke kernel. di bawah protected $routemiddleware
    // biar langsung bisa dipake ->middleware('namaMiddleware');
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->check() || !auth()->user()->is_admin){
            abort(403);
        }

        return $next($request);
    }
}
