<?php

namespace App\Http\Middleware;

use App\AdminRole;
use Closure;
use Auth;
use Session;

class isUsersRole
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

        if (Auth::user() &&  Auth::user()->admin == 1) {
            $roles = AdminRole::where('user_id',Auth::user()->id)->get();
            if($roles->contains('role_id', 6) || Auth::user()->email == 'admin@admin.com')
            {
                return $next($request);
            }else
            {
                Session::flash('success' , 'ليس لديك صلاحية لدخول هذه الصفحة');
                return redirect()->route('admin.index');
            }

        }else {
            return redirect()->route('index');
        }

        return redirect()->route('admin.index');
    }
}
