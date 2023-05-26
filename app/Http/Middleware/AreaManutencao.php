<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaManutencao
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
        {
            if(Auth::user()->role->name == "manutencao_albimaq" || Auth::user()->role->name == "manutencao_centrocar" || Auth::user()->role->name == "manutencao_danmo") { 
                return $next($request);
            }else{
                return redirect()->back();
            }
        }
    }
}
