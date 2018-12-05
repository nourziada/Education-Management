<?php

namespace App\Http\Controllers\Admin;

use App\AdminRole;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class AdminRolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
        $this->middleware('isRolesRole');
    }


    public function index()
    {
        $users = User::where('admin',1)->orderBy('created_at','desc')->get();
        return view('admin.roles.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_name' => 'required|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'required',
        ]);

        $user = new User;
        $user->name = $request->user_name;
        $user->email = $request->user_name;
        $user->password = bcrypt($request->password);
        $user->account_type = $request->user_name;
        $user->user_name = $request->user_name;
        $user->sefa = $request->user_name;
        $user->mobile = $request->user_name;
        $user->phone = $request->user_name;
        $user->mail = $request->user_name;
        $user->civil_registry = $request->user_name;
        $user->admin = 1;
        $user->save();


        foreach($request->roles as $role)
        {
            $newRole = new AdminRole;
            $newRole->user_id = $user->id;

            if($role == 1)
            {
                if($request->management_id == 0)
                {
                    $newRole->role_id = 1;
                }else
                {
                    $newRole->role_id = 2;
                    $newRole->management_id = $request->management_id;
                }

            }


            if($role == 2)
            {
                if($request->management_id == 0)
                {
                    $newRole->role_id = 3;
                }else
                {
                    $newRole->role_id = 3;
                    $newRole->management_id = $request->management_id;
                }
            }

            if($role == 3)
            {
                $newRole->role_id = 4;
            }

            if($role == 4)
            {
                $newRole->role_id = 5;
            }

            if($role == 5)
            {
                $newRole->role_id = 6;
            }


            $newRole->save();

        }



        Session::flash('success' , 'تمت اضافة المستخدم والصلاحيات بنجاح');
        return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $roles = AdminRole::where('user_id',$user->id)->get();
        foreach($roles as $role)
        {
            $role->delete();
        }


        $user->delete();



        Session::flash('success' , 'تم حذف العضوية بنجاح');
        return redirect()->route('roles.index');
    }
}
