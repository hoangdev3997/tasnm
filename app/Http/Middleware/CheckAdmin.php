<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class CheckAdmin
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

        if(Auth::guard('admin')->check()){
            return $next($request);
        }else{
            return redirect('/dangnhap')->with(['error' => "Bạn phải bắt buộc đăng nhập để có thể sử dụng"]);
        }
    }
}
