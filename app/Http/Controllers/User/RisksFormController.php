<?php

namespace App\Http\Controllers\User;

use App\RiskForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class RisksFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('isManagment');
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
            $projects = RiskForm::where('is_confirmed',1)->where('is_deleted',0)->orderBy('created_at','desc')->get();
        }


        // Not Confirmed
        if($type == 2)
        {
            $projects = RiskForm::where('is_confirmed',0)->orderBy('created_at','desc')->get();
        }


        // Confirmed , Deleted
        if($type == 3)
        {
            $projects = RiskForm::where('is_confirmed',1)->where('is_deleted',1)->orderBy('created_at','desc')->get();
        }

        return view('user.risks.index',compact('projects','type'));
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
        return view('user.risks.create');
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
        ]);

        $data = new RiskForm;
        $data->user_id = Auth::user()->id;
        $data->type = $request->type;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->level = $request->level;
        $data->protection = $request->protection;
        $data->effect = $request->effect;
        $data->responsible = $request->responsible;
        $data->treatment = $request->treatment;
        $data->end = $request->end;

        $data->management = Auth::user()->management;
        $data->department = Auth::user()->department;

        $data->save();

        Session::flash('success' , 'تمت اضافة النموذج بنجاح ، وبإنتظار تفعيل مدير الموقع');
        return redirect()->route('dashboard.risks-forms.type',2);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = RiskForm::findOrFail($id);
        return view('user.risks.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RiskForm::findOrFail($id);
        return view('user.risks.edit',compact('data'));
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
        ]);

        $data = RiskForm::find($id);
        $data->type = $request->type;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->level = $request->level;
        $data->protection = $request->protection;
        $data->effect = $request->effect;
        $data->responsible = $request->responsible;
        $data->treatment = $request->treatment;
        $data->end = $request->end;

        $data->status = 2;
        $data->is_confirmed = 0;

        $data->save();

        Session::flash('success' , 'تمت تعديل بيانات النموذج بنجاح ، وبإنتظار تفعيل مدير الموقع');
        return redirect()->route('dashboard.risks-forms.type',2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RiskForm::find($id);
        $data->status = 3;
        $data->is_confirmed = 0;
        $data->is_deleted = 1;
        $data->save();

        Session::flash('success' , 'تمت حذف النموذج بنجاح ، وبإنتظار تأكيد مدير الموقع');
        return redirect()->back();
    }
}
