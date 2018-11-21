<?php

namespace App\Http\Controllers\Admin;

use App\StrategicGoal;
use App\StrategicInitiatives;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class StrategicInitiativesController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function index()
    {
        $datas = StrategicInitiatives::orderBy('created_at','desc')->get();
        return view('admin.strategic-initiatives.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stratigices = StrategicGoal::get();
        return view('admin.strategic-initiatives.create',compact('stratigices'));
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
            'strategic_goals_id' => 'required',
        ]);

        $data = new StrategicInitiatives;
        $data->name = $request->name;
        $data->strategic_goals_id = $request->strategic_goals_id;
        $data->save();

        Session::flash('success' , 'تمت اضافة المبادرة الادارية بنجاح');
        return redirect()->route('strategic-initiatives-menus.index');
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
        $data = StrategicInitiatives::findOrFail($id);
        $stratigices = StrategicGoal::get();
        return view('admin.strategic-initiatives.edit',compact('stratigices','data'));
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
            'strategic_goals_id' => 'required',
        ]);

        $data = StrategicInitiatives::find($id);
        $data->name = $request->name;
        $data->strategic_goals_id = $request->strategic_goals_id;
        $data->save();

        Session::flash('success' , 'تمت تحديث بيانات المبادرة بنجاح');
        return redirect()->route('strategic-initiatives-menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StrategicInitiatives::find($id);
        $data->delete();

        Session::flash('success' , 'تمت حذف المبادرة بنجاح');
        return redirect()->route('strategic-initiatives-menus.index');
    }
}
