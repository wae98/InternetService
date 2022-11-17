<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBanned
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
        if(auth()->check() && (auth()->user()->status == 0)){
            
            // Auth::logout();
  
             $request->session()->invalidate();
          
             $request->session()->regenerateToken();
             return redirect()->route('login')->with('error', 'Tu usuario ha sido bloqueado contáctate con el administrador del sistema.');
         }

        return $next($request);
    }
}
