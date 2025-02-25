<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
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

        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
            $locale = session()->get('locale');
            if($locale == 'ar'){
                session(['dir' => 'rtl']);
            } else {
                session(['dir' => 'ltr']);
            }
        }


        return $next($request);
    }
}
