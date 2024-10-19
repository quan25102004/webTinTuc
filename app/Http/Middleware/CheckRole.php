<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$types): Response
    {
        if(!Auth::check()){
            return redirect('login');
        }
        $typeUser = Auth::user()->type;
        $access = [
            'admin'=>['admin'],
            'member'=>['member','admin'],

        ];
        if(!in_array($typeUser,$access[$types[0]])){
            return redirect('/client/home')->withErrors(['error'=> 'ban khong co quyen']);

        }
        return $next($request);
    }
}
