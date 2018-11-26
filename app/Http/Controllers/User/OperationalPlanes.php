<?php

namespace App\Http\Controllers\User;

use App\Measurement;
use App\MinisterialInitiatives;
use App\OperationalPlan;
use App\StrategicGoal;
use App\StrategicInitiatives;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class OperationalPlanes extends Controller
{
    public function __construct()
    {
        $this->middleware('isManagmentSchool');
    }

    /*
    * Get All Operational Planes With Type
    * type == 1 , is Confirmed == 1 , is deleted == 0
    * type == 2 , is Not Confirmed == 0
    * type == 3 , is Confirmed == 1 , is Deleted == 1
    */
    public function getPlanesWithType($type)
    {
        // Confirmed , and Not Deleted
        if($type == 1)
        {
            $projects = OperationalPlan::where('is_confirmed',1)->where('is_deleted',0)->orderBy('created_at','desc')->get();
        }


        // Not Confirmed
        if($type == 2)
        {
            $projects = OperationalPlan::where('is_confirmed',0)->orderBy('created_at','desc')->get();
        }


        // Confirmed , Deleted
        if($type == 3)
        {
            $projects = OperationalPlan::where('is_confirmed',1)->where('is_deleted',1)->orderBy('created_at','desc')->get();
        }

        return view('user.operational.index',compact('projects','type'));
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

        // Get All Measurements مؤشرات قياس الأداء for the First Stratigec Goal
        if($strategic_goals->count() > 0)
        {
            $measurements = Measurement::where('strategic_goals_id',$strategic_goals[0]->id)->get();
            $strategicInitiatives = StrategicInitiatives::where('strategic_goals_id',$strategic_goals[0]->id)->get();
        }else
        {
            $measurements = collect();
            $strategicInitiatives = collect();
        }

        // Get All Ministerial Initiatives المبادرات الوزارية for the First Measurement لمؤشر قياس الاداء
        if($measurements->count() > 0)
        {
            $ministerialInitiatives = MinisterialInitiatives::where('measurement_id',$measurements[0]->id)->get();
        }else
        {
            $ministerialInitiatives = collect();
        }

        return view('user.operational.create',compact('strategic_goals','measurements','ministerialInitiatives','strategicInitiatives'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new OperationalPlan;
        if($request->plane_type == 1)
        {
            $data->plane_type = 'إدارة';
        }elseif($request->plane_type == 2)
        {
            $data->plane_type = 'مدرسة';
            $data->school_name = $request->school_name;
        }

        $data->strategic_goal = $request->strategic_goal;
        $data->strategic_indicators = $request->strategic_indicators;
        $data->associated_title = $request->associated_title;
        $data->detailed_objectives = $request->detailed_objectives;
        $data->detailed_indicators = $request->detailed_indicators;
        $data->initiative_title = $request->initiative_title;
        $data->plane_title = $request->plane_title;
        $data->requirements = $request->requirements;
        $data->targeted = $request->targeted;
        $data->ad_execution_time_from = $request->ad_execution_time_from;
        $data->ad_execution_time_to = $request->ad_execution_time_to;

        /* Code For Change Ad Date to Hijri Date */
        $data->hijri_execution_time_from = $request->ad_execution_time_from;
        $data->hijri_execution_time_to = $request->ad_execution_time_to;

        $data->place = $request->place;
        $data->main_implementing = $request->main_implementing;
        $data->sub_implementing = $request->sub_implementing;
        $data->cost = $request->cost;
        $data->ministerial_number = $request->ministerial_number;
        $data->strategic_number = $request->strategic_number;
        $data->detailed_number = $request->detailed_number;

        $data->user_id = Auth::user()->id;
        $data->management = Auth::user()->management;
        $data->department = Auth::user()->department;

        $data->save();

        Session::flash('success' , 'تمت اضافة الخطة التشغيلية بنجاح ، وبإنتظار تفعيل مدير الموقع');
        return redirect()->route('dashboard.operational.type',2);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = OperationalPlan::findOrFail($id);
        return view('user.operational.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = OperationalPlan::findOrFail($id);

        $strategic_goals = StrategicGoal::get();

        // Get All Measurements مؤشرات قياس الأداء for the First Stratigec Goal
        if($strategic_goals->count() > 0)
        {
            $measurements = Measurement::where('strategic_goals_id',$data->strategic_goal)->get();
            $strategicInitiatives = StrategicInitiatives::where('strategic_goals_id',$data->strategic_goal)->get();
        }else
        {
            $measurements = collect();
            $strategicInitiatives = collect();
        }

        // Get All Ministerial Initiatives المبادرات الوزارية for the First Measurement لمؤشر قياس الاداء
        if($measurements->count() > 0)
        {
            $ministerialInitiatives = MinisterialInitiatives::where('measurement_id',$measurements[0]->id)->get();
        }else
        {
            $ministerialInitiatives = collect();
        }

        return view('user.operational.edit',compact('strategic_goals','measurements','ministerialInitiatives','strategicInitiatives','data'));
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
        $data = OperationalPlan::find($id);
        if($request->plane_type == 1)
        {
            $data->plane_type = 'إدارة';
        }elseif($request->plane_type == 2)
        {
            $data->plane_type = 'مدرسة';
            $data->school_name = $request->school_name;
        }

        $data->strategic_goal = $request->strategic_goal;
        $data->strategic_indicators = $request->strategic_indicators;
        $data->associated_title = $request->associated_title;
        $data->detailed_objectives = $request->detailed_objectives;
        $data->detailed_indicators = $request->detailed_indicators;
        $data->initiative_title = $request->initiative_title;
        $data->plane_title = $request->plane_title;
        $data->requirements = $request->requirements;
        $data->targeted = $request->targeted;
        $data->ad_execution_time_from = $request->ad_execution_time_from;
        $data->ad_execution_time_to = $request->ad_execution_time_to;

        /* Code For Change Ad Date to Hijri Date */
        $data->hijri_execution_time_from = $request->ad_execution_time_from;
        $data->hijri_execution_time_to = $request->ad_execution_time_to;

        $data->place = $request->place;
        $data->main_implementing = $request->main_implementing;
        $data->sub_implementing = $request->sub_implementing;
        $data->cost = $request->cost;
        $data->ministerial_number = $request->ministerial_number;
        $data->strategic_number = $request->strategic_number;
        $data->detailed_number = $request->detailed_number;

        $data->status = 2;
        $data->is_confirmed = 0;

        $data->save();

        Session::flash('success' , 'تمت تعديل بيانات الخطة التشغيلية بنجاح ، وبإنتظار تأكيد مدير الموقع');
        return redirect()->route('dashboard.operational.type',2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = OperationalPlan::find($id);
        $data->status = 3;
        $data->is_confirmed = 0;
        $data->is_deleted = 1;
        $data->save();

        Session::flash('success' , 'تمت حذف الخطة التشغيلية بنجاح ، وبإنتظار تأكيد مدير الموقع');
        return redirect()->back();
    }
}
