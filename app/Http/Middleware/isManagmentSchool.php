<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isManagmentSchool
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
        if (Auth::user() &&  Auth::user()->status == 1 && (Auth::user()->account_type == 1 || Auth::user()->account_type == 3)) {
            return $next($request);
        }else {
            Session::flash('error','عذراً ، ولكن لا يمكنك الدخول الى لوحة التحكم لانك لا تملك تصريح ذلك أو ان حسابك غير موثق من قبل مدير النظام.');
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('index');
    }
}
