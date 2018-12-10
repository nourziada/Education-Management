<?php

namespace App\Http\Controllers\Admin;

use App\PlansModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class PlansModelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function index()
    {
        $datas = PlansModel::get();
        return view('admin.plans-models.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plans-models.create');
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
            'file' => 'required',
        ]);

        $data = new PlansModel;
        $data->name = $request->name;


        if($request->hasFile('file') && $request->file != null){
            $featured = $request->file;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/plans_models' , $featured_new_name);

            $data->file = $featured_new_name;
        }


        $data->save();

        Session::flash('success' , 'تمت اضافة النموذج بنجاح');
        return redirect()->route('plans-models.index');
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
        $data = PlansModel::findOrFail($id);
        return view('admin.plans-models.edit',compact('data'));
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

        $data = PlansModel::find($id);
        $data->name = $request->name;


        if($request->hasFile('file') && $request->file != null){
            $featured = $request->file;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/plans_models' , $featured_new_name);

            $data->file = $featured_new_name;
        }


        $data->save();

        Session::flash('success' , 'تمت تعديل بيانات النموذج بنجاح');
        return redirect()->route('plans-models.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PlansModel::find($id);
        $data->delete();

        Session::flash('success' , 'تم حذف النموذج بنجاح');
        return redirect()->route('plans-models.index');
    }
}
