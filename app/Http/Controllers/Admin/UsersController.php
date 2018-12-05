<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
        $this->middleware('isUsersRole');
    }


    /*
     * Accept Or Reject User
     * Action == 1 ====> Accept User
     * Action == 2 ====> Reject User
     */

    public function acceptRejectUser($action,$id)
    {
        $user = User::findOrFail($id);

        // Action == 1 ====> Accept User
        if($action == 1)
        {
            $user->status = 1 ;
            $user->save();

            Session::flash('success' , 'تم قبول المستخدم بنجاح');

        }

        // Action == 2 ====> Reject User
        if($action == 2)
        {
            $user->status = 2 ;
            $user->save();

            Session::flash('success' , 'تم رفض قبول المستخدم بنجاح');
        }

        return redirect()->back();
    }

    /*
     * Get User Details
     */

    public function getUserDetails($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.details',compact('user'));
    }
    /*
     * Get Users Registered With Type
     * type == 1 , Users Waiting Confirmation status == 0
     * type == 2 , Users Confirmed status == 1
     * type == 3 , Users Rejected status == 2
     */

    public function getUsers($type)
    {
        // type == 1 , Users Waiting Confirmation status == 0
        if($type == 1)
        {
            $users = User::where('admin',2)->where('status',0)->orderBy('created_at','desc')->get();
        }

        // type == 2 , Users Confirmed status == 1
        if($type == 2)
        {
            $users = User::where('admin',2)->where('status',1)->orderBy('created_at','desc')->get();
        }

        // type == 3 , Users Rejected status == 2
        if($type == 3)
        {
            $users = User::where('admin',2)->where('status',2)->orderBy('created_at','desc')->get();
        }


        return view('admin.users.index',compact('type','users'));
    }
}
