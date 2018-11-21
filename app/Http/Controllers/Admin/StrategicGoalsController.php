<?php

namespace App\Http\Controllers\Admin;

use App\StrategicGoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class StrategicGoalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function index()
    {
        $datas = StrategicGoal::orderBy('created_at','desc')->get();
        return view('admin.StrategicGoals.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.StrategicGoals.create');
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
            'name' => 'required|max:500',
        ]);

        $data = new StrategicGoal;
        $data->name = $request->name;
        $data->save();

        Session::flash('success' , 'تمت اضافة الهدف الاستراتيجي بنجاح');
        return redirect()->route('strategic-goals-menus.index');
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
        $data = StrategicGoal::findOrFail($id);
        return view('admin.StrategicGoals.edit',compact('data'));

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
            'name' => 'required|max:500',
        ]);

        $data = StrategicGoal::find($id);
        $data->name = $request->name;
        $data->save();

        Session::flash('success' , 'تمت تعديل الهدف الاستراتيجي بنجاح');
        return redirect()->route('strategic-goals-menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StrategicGoal::find($id);
        $data->delete();

        Session::flash('success' , 'تمت حذف الهدف الاستراتيجي بنجاح');
        return redirect()->route('strategic-goals-menus.index');
    }
}
