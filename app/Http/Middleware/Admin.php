<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next){
        if(!auth()->guard('admin')->user()){

            Alert::error('Gagal Masuk', 'Kamu Ngga Punya Akses!!!');
            return redirect()->back();
        
        }else{
            if(auth()->guard('admin')->user()->is_admin == 1){

                return $next($request);
            }else{
                Alert::error('Gagal','Kamu Ngga Punya Akses!!!');
                return redirect()->back();
            }
        }
    }
}
