<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyIfModel
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
        if($request->user()==null){
            return redirect('login');
        }else{
            if($request->user()->role != 'user'){
                abort(403, "You don't have access to this website!");
            }
        }

        return $next($request);
    }
}
