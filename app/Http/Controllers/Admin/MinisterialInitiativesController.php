<?php

namespace App\Http\Controllers\Admin;

use App\Measurement;
use App\MinisterialInitiatives;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class MinisterialInitiativesController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function index()
    {
        $datas = MinisterialInitiatives::orderBy('created_at','desc')->get();
        return view('admin.ministerial-initiatives.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $measurments = Measurement::get();
        return view('admin.ministerial-initiatives.create',compact('measurments'));
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
            'measurement_id' => 'required',
        ]);

        $data = new MinisterialInitiatives;
        $data->name = $request->name;
        $data->measurement_id = $request->measurement_id;
        $data->save();

        Session::flash('success' , 'تمت اضافة المبادرة الوزارية بنجاح');
        return redirect()->route('ministerial-initiatives-menus.index');
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
        $data = MinisterialInitiatives::findOrFail($id);
        $measurments = Measurement::get();
        return view('admin.ministerial-initiatives.edit',compact('measurments','data'));
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
            'measurement_id' => 'required',
        ]);

        $data = MinisterialInitiatives::find($id);
        $data->name = $request->name;
        $data->measurement_id = $request->measurement_id;
        $data->save();

        Session::flash('success' , 'تم تعديل بيانات المبادرة الوزارية بنجاح');
        return redirect()->route('ministerial-initiatives-menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MinisterialInitiatives::find($id);
        $data->delete();

        Session::flash('success' , 'تمت حذف المبادرة الوزارية بنجاح');
        return redirect()->route('ministerial-initiatives-menus.index');
    }
}
