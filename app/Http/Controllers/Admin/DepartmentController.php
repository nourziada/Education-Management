<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Management;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function index()
    {
        $datas = Department::get();
        return view('admin.department-menu.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managements = Management::get();
        return view('admin.department-menu.create',compact('managements'));
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
            'name' => 'required|max:255',
            'management_id' => 'required|max:255',
        ]);

        $data = new Department;
        $data->name = $request->name;
        $data->management_id = $request->management_id;
        $data->save();

        Session::flash('success' , 'تمت اضافة القسم بنجاح');
        return redirect()->route('department-menus.index');
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
        $managements = Management::get();
        $data = Department::findOrFail($id);
        return view('admin.department-menu.edit',compact('managements','data'));
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
        $this->validate($request,[
            'name' => 'required|max:255',
            'management_id' => 'required|max:255',
        ]);

        $data = Department::find($id);
        $data->name = $request->name;
        $data->management_id = $request->management_id;
        $data->save();

        Session::flash('success' , 'تم تعديل بيانات القسم بنجاح');
        return redirect()->route('department-menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Department::find($id);
        $data->delete();

        Session::flash('success' , 'تمت حذف القسم بنجاح');
        return redirect()->route('department-menus.index');
    }
}
