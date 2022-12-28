<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function handle(Request $request, Closure $next)
    {
//        if(Auth::check())
//        {
//            if(Auth::user()->Status == 'مفعل')  // '1' => 'admin
//            {
//                return $next($request);
//            }
//            else
//            {
//                return redirect()->route('dashboard')->with('status','Access Denied! as you are not as admin');
//            }
//        }
//        else
//        {
//            return redirect()->route('login')->with('status','Please Login First');
//        }
//        return $next($request);

        if(Auth::user()->Status == 'مفعل')  // '1' => 'admin
        {
            return $next($request);
        }
        else
        {
            return  redirect('/');

        }


    }


}
