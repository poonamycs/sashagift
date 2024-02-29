<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Models\Admin;

class Adminlogin
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
        $auth = Admin::where('email',session('adminSession'))->first();
        if(empty(Session::has('adminSession'))){
            return redirect('/admin')->with('flash_message_error','Session expired! Please login again');
        }
        return $next($request);
    }
}
