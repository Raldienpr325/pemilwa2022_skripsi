<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Pemilih
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
        if(auth()->guard('user')->user() == null){
            Alert::error('Kamu tidak punya akses!','Silahkan login ulang');
            return redirect()->route('home');
            
        } else if(auth()->guard('user')->user()->NIM != null){
            return $next($request);
        } else {
            Alert::error('Kamu tidak punya akses!','Silahkan login ulang');
            return redirect()->route('home');
        }
    }
}
