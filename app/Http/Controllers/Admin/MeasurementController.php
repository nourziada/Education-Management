<?php

namespace App\Http\Controllers\Admin;

use App\Measurement;
use App\StrategicGoal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class MeasurementController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function index()
    {
        $datas = Measurement::orderBy('created_at','desc')->get();
        return view('admin.Measurement.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stratigices = StrategicGoal::get();
        return view('admin.Measurement.create',compact('stratigices'));
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

        $data = new Measurement;
        $data->name = $request->name;
        $data->strategic_goals_id = $request->strategic_goals_id;
        $data->save();

        Session::flash('success' , 'تمت اضافة مؤشر القياس بنجاح');
        return redirect()->route('measurement-menus.index');
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
        $data = Measurement::findOrFail($id);
        $stratigices = StrategicGoal::get();
        return view('admin.Measurement.edit',compact('stratigices','data'));
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

        $data = Measurement::find($id);
        $data->name = $request->name;
        $data->strategic_goals_id = $request->strategic_goals_id;
        $data->save();

        Session::flash('success' , 'تمت تحديث بيانات مؤشر القياس بنجاح');
        return redirect()->route('measurement-menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Measurement::find($id);
        $data->delete();

        Session::flash('success' , 'تمت حذف مؤشر الفياس بنجاح');
        return redirect()->route('measurement-menus.index');
    }
}
