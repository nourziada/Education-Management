<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('isUserActive',['except' => ['index','showPassword','changePassword']]);
    }

    /*
     * Change Admin Password Methods
     */

    public function showPassword(){
        return view('admin.password.update');
    }
    public function changePassword(Request $request){
        $this->validate($request , [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed|different:old_password',
            'password_confirmation' => 'required',
        ],[
            'old_password.required' => 'يجب أن تقوم بإخال كلمة المرور القديمة',
            'password.required' => 'يجب أن تقوم بإدخال كلمة المرور الجديدة',
            'password.min' => 'يجب أن لا تقل كلمة المرور عن 6 أحرف وأرقام',
            'password.confirmed' => 'يجب أن تتطابق كلمة المرور الجديدة مع إعادة كلمة المرور',
            'password.different' => 'يجب أن تختلف كلمة المرور الجديدة عن كلمة المرور القديمة',
            'retype_new_password.required' => 'يجب أن تقوم بإعادة كلمة المرور الجديدة',
        ]);


        $user = Auth::user();

        $u_user = User::find(Auth::id());

        if(Hash::check($request->old_password, $user->password)){
            $u_user->password =  Hash::make($request->password);
            $u_user->save();

            Session::flash('success' , 'تم تحديث كلمة المرور بنجاح');
            return redirect()->back();
        }else {
            Session::flash('error' , 'كلمة المرور القديمة لا تتطابق مع كلمة المرور في سجلاتنا');
            return redirect()->back();
        }
    }

    public function index()
    {
        return view('user.index');
    }
}
