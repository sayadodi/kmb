<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('idvendor') && !$request->session()->has('namavendor')) {
            return redirect('loginvendor');
        }
        return $next($request);
    }
}
