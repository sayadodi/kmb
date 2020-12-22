<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekLogin2
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
        if (!empty($request->session('idvendor')) && !empty($request->session('namavendor'))) {
            return redirect('berandavendor');
        }
        return $next($request);
    }
}
