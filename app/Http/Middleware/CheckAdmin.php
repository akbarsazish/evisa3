<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Http\Request;
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
        if(Session::get('userSession')==1 or Session::get('userSession')==1 ){
        return $next($request);
        }else{
            return redirect("/loginAdmin");
        }
    }
}
