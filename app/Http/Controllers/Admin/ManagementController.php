<?php

namespace App\Http\Controllers\Admin;

use App\Management;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function index()
    {
        $datas = Management::get();
        return view('admin.management-menu.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.management-menu.create');
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
            'name' => 'required|max:255'
        ]);

        $data = new Management;
        $data->name = $request->name;
        $data->save();

        Session::flash('success' , 'تمت اضافة الادارة بنجاح');
        return redirect()->route('management-menus.index');
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
        $data = Management::findOrFail($id);
        return view('admin.management-menu.edit',compact('data'));
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
            'name' => 'required|max:255'
        ]);

        $data = Management::find($id);
        $data->name = $request->name;
        $data->save();

        Session::flash('success' , 'تمت تعديل بيانات الادارة بنجاح');
        return redirect()->route('management-menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Management::find($id);
        $data->delete();

        Session::flash('success' , 'تمت حذف الادارة بنجاح');
        return redirect()->route('management-menus.index');
    }
}
