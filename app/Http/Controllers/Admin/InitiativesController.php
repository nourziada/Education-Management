<?php

namespace App\Http\Controllers\Admin;

use App\Initiative;
use App\StrategicGoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class InitiativesController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $datas = Initiative::orderBy('created_at','desc')->get();
        return view('admin.Initiatives.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stratigices = StrategicGoal::get();
        return view('admin.Initiatives.create',compact('stratigices'));
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

        $data = new Initiative;
        $data->name = $request->name;
        $data->strategic_goals_id = $request->strategic_goals_id;
        $data->save();

        Session::flash('success' , 'تمت اضافة المبادرة بنجاح');
        return redirect()->route('initiatives-menus.index');
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
        $data = Initiative::findOrFail($id);
        $stratigices = StrategicGoal::get();
        return view('admin.Initiatives.edit',compact('stratigices','data'));
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

        $data = Initiative::find($id);
        $data->name = $request->name;
        $data->strategic_goals_id = $request->strategic_goals_id;
        $data->save();

        Session::flash('success' , 'تمت تحديث المبادرة بنجاح');
        return redirect()->route('initiatives-menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Initiative::find($id);
        $data->delete();

        Session::flash('success' , 'تمت حذف المبادرة بنجاح');
        return redirect()->route('initiatives-menus.index');
    }
}
