<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CheckAdmin
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
        // return $next($request);
        if(Auth::check()){
            if(Auth::check() && Auth::user()->role == 1){
                // return redirect()->route('products.list');
                return $next($request);
            }

            else{
                return redirect()->route('client.home')->with('msg', 'Bạn không phải admin, mời đăng nhập lại');
            }
        }
        else{
            return redirect()->route('login.index')->with('msg', 'Bạn không phải admin, mời đăng nhập lại');
        }
    }
}
