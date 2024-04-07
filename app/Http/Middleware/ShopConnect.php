<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ShopConnect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return string
     */
    public function handle(Request $request, Closure $next)
    {
        if( !auth()->check() ){
            abort(ResponseAlias::HTTP_FORBIDDEN);
        }

        if(auth()->user()->company_id === NULL){
            abort(ResponseAlias::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
