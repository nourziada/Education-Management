<?php

namespace App\Http\Controllers\User;

use App\Initiative;
use App\Measurement;
use App\Strategic;
use App\StrategicGoal;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use PDF;

class StrategicController extends Controller
{

    public function __construct()
    {
        $this->middleware('isManagment');
    }


    /*
     * Get All Strategic With Type
     * type == 1 , is Confirmed == 1 , is deleted == 0
     * type == 2 , is Not Confirmed == 0
     * type == 3 , is Confirmed == 1 , is Deleted == 1
     */

    public function getStrategicType($type)
    {
        // Confirmed , and Not Deleted
        if($type == 1)
        {
            $projects = Strategic::where('is_confirmed',1)->where('is_deleted',0)->orderBy('created_at','desc')->get();
        }


        // Not Confirmed
        if($type == 2)
        {
            $projects = Strategic::where('is_confirmed',0)->orderBy('created_at','desc')->get();
        }


        // Confirmed , Deleted
        if($type == 3)
        {
            $projects = Strategic::where('is_confirmed',1)->where('is_deleted',1)->orderBy('created_at','desc')->get();
        }

        return view('user.strategic.index',compact('projects','type'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $strategic_goals = StrategicGoal::get();
        // Get All Initiatives المبادرات for the First Stratigec Goal
        if($strategic_goals->count() > 0)
        {
            $initiatives = Initiative::where('strategic_goals_id',$strategic_goals[0]->id)->get();
        }

        // Get All Measurements مؤشرات قياس الأداء for the First Stratigec Goal
        if($strategic_goals->count() > 0)
        {
            $measurements = Measurement::where('strategic_goals_id',$strategic_goals[0]->id)->get();
        }

        return view('user.strategic.create',compact('strategic_goals','initiatives','measurements'));
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
            'target' => 'required|max:500',
            'department_initiatives' => 'required|max:500',
            'performance_index' => 'required|max:500',
        ]);

        $data = new Strategic;
        $data->user_id = Auth::user()->id;
        $data->strategic_goal = $request->strategic_goal;
        $data->initiatives = $request->initiatives;
        $data->target = $request->target;
        $data->responsible_management = Auth::user()->management;
        $data->responsible_department = Auth::user()->department;
        $data->measurement = $request->measurement;
        $data->management = Auth::user()->management;
        $data->department = Auth::user()->department;
        $data->department_initiatives = $request->department_initiatives;
        $data->performance_index = $request->performance_index;
        $data->executing_agency = $request->executing_agency;
        $data->supporting_body = $request->supporting_body;
        $data->save();

        Session::flash('success' , 'تمت اضافة الخطة الاستراتيجية بنجاح ، وبإنتظار تفعيل مدير الموقع');
        return redirect()->route('dashboard.strategic.type',2);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Strategic::findOrFail($id);
        $user = User::find($data->user_id);
        return view('user.strategic.details',compact('data','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Strategic::findOrFail($id);

        $strategic_goals = StrategicGoal::get();
        // Get All Initiatives المبادرات for the First Stratigec Goal
        if($strategic_goals->count() > 0)
        {
            $initiatives = Initiative::where('strategic_goals_id',$data->strategic_goal)->get();
        }

        // Get All Measurements مؤشرات قياس الأداء for the First Stratigec Goal
        if($strategic_goals->count() > 0)
        {
            $measurements = Measurement::where('strategic_goals_id',$data->strategic_goal)->get();
        }


        return view('user.strategic.edit',compact('strategic_goals','initiatives','measurements','data'));
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
            'target' => 'required|max:500',
            'department_initiatives' => 'required|max:500',
            'performance_index' => 'required|max:500',
        ]);

        $data = Strategic::find($id);
        $data->strategic_goal = $request->strategic_goal;
        $data->initiatives = $request->initiatives;
        $data->target = $request->target;
        $data->responsible_management = Auth::user()->management;
        $data->responsible_department = Auth::user()->department;
        $data->measurement = $request->measurement;
        $data->management = Auth::user()->management;
        $data->department = Auth::user()->department;
        $data->department_initiatives = $request->department_initiatives;
        $data->performance_index = $request->performance_index;
        $data->executing_agency = $request->executing_agency;
        $data->supporting_body = $request->supporting_body;
        $data->status = 2;
        $data->is_confirmed = 0;
        $data->save();

        Session::flash('success' , 'تمت تعديل بيانات الخطة الاستراتيجية بنجاح ، وبإنتظار تأكيد مدير الموقع');
        return redirect()->route('dashboard.strategic.type',2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Strategic::find($id);
        $data->status = 3;
        $data->is_confirmed = 0;
        $data->is_deleted = 1;
        $data->save();

        Session::flash('success' , 'تمت حذف الخطة الاستراتيجية بنجاح ، وبإنتظار تأكيد مدير الموقع');
        return redirect()->back();

    }
}
