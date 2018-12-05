<?php

namespace App\Http\Controllers\User;

use App\OperationalPlan;
use App\Swat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;



class SwatController extends Controller
{
    public function __construct()
    {
        $this->middleware('isManagmentSchool');
    }

    /*
   * Get All SWAT Forms With Type
   * type == 1 , is Confirmed == 1 , is deleted == 0
   * type == 2 , is Not Confirmed == 0
   * type == 3 , is Confirmed == 1 , is Deleted == 1
   */
    public function getFormsWithType($type)
    {
        // Confirmed , and Not Deleted
        if($type == 1)
        {
            $projects = Swat::where('is_confirmed',1)->where('is_deleted',0)->orderBy('created_at','desc')->get();
        }


        // Not Confirmed
        if($type == 2)
        {
            $projects = Swat::where('is_confirmed',0)->orderBy('created_at','desc')->get();
        }


        // Confirmed , Deleted
        if($type == 3)
        {
            $projects = Swat::where('is_confirmed',1)->where('is_deleted',1)->orderBy('created_at','desc')->get();
        }

        return view('user.swat.index',compact('projects','type'));
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
        $operationals = OperationalPlan::get();
        return view('user.swat.create',compact('operationals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Swat;
        $data->user_id = Auth::user()->id;
        $data->operational_plan_id = $request->operational_plan_id;
        $data->strong = $request->strong;
        $data->week = $request->week;
        $data->opportunities = $request->opportunities;
        $data->threats = $request->threats;

        $data->management = Auth::user()->management;
        $data->department = Auth::user()->department;

        $data->save();

        Session::flash('success' , 'تمت اضافة نموذج SWAT بنجاح ، وبإنتظار تفعيل مدير الموقع');
        return redirect()->route('dashboard.swat.type',2);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = Swat::findOrFail($id);
        return view('user.swat.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operationals = OperationalPlan::get();
        $data = Swat::findOrFail($id);
        return view('user.swat.edit',compact('operationals','data'));
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
        $data = Swat::find($id);
        $data->operational_plan_id = $request->operational_plan_id;
        $data->strong = $request->strong;
        $data->week = $request->week;
        $data->opportunities = $request->opportunities;
        $data->threats = $request->threats;

        $data->status = 2;
        $data->is_confirmed = 0;

        $data->save();

        Session::flash('success' , 'تمت تعديل بيانات نموذج SWAT بنجاح ، وبإنتظار تفعيل مدير الموقع');
        return redirect()->route('dashboard.swat.type',2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Swat::find($id);
        $data->status = 3;
        $data->is_confirmed = 0;
        $data->is_deleted = 1;
        $data->save();

        Session::flash('success' , 'تمت حذف النموذج بنجاح ، وبإنتظار تأكيد مدير الموقع');
        return redirect()->back();
    }
}
