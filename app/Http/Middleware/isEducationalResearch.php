<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class isEducationalResearch
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
        if (Auth::user() && Auth::user()->account_type == 2 &&  Auth::user()->status == 1) {
            return $next($request);
        }else {
            Session::flash('error','عذراً ، ولكن حسابك غير موثق حتى الآن من قبل مدير النظام ، يرجى الانتظار الى حين توثيق حسابك من خلال مدير النظام');
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('index');
    }
}
