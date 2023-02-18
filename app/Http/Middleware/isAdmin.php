<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    //  public function handle(Request $request, Closure $next)
    // {
    //     if(Auth::user()){
    //         return $next($request);
    //     } 
    //     return redirect('/login');
        
    // }

    // code to make sure only admin can log in 
     
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()&&Auth::user()->is_admin==1){
            return $next($request);
        } 
        return redirect('/login');
        
    }
}
