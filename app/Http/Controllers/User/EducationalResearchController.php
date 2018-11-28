<?php

namespace App\Http\Controllers\User;

use App\EducationalResearch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class EducationalResearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('isEducationalResearch');
    }

    /*
   * Get All Education Research Forms With Type
   * type == 1 , is Confirmed == 1 , is deleted == 0
   * type == 2 , is Not Confirmed == 0
   * type == 3 , is Confirmed == 1 , is Deleted == 1
   */
    public function getFormsWithType($type)
    {
        // Confirmed , and Not Deleted
        if($type == 1)
        {
            $projects = EducationalResearch::where('is_confirmed',1)->where('is_deleted',0)->orderBy('created_at','desc')->get();
        }


        // Not Confirmed
        if($type == 2)
        {
            $projects = EducationalResearch::where('is_confirmed',0)->orderBy('created_at','desc')->get();
        }


        // Confirmed , Deleted
        if($type == 3)
        {
            $projects = EducationalResearch::where('is_confirmed',1)->where('is_deleted',1)->orderBy('created_at','desc')->get();
        }

        return view('user.educational-research.index',compact('projects','type'));
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
        return view('user.educational-research.create');

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
            'id_number' => 'required|max:255',
            'work' => 'required|max:255',
            'uni' => 'required|max:255',
            'college' => 'required|max:255',
            'specialization' => 'required|max:255',
            'search_title' => 'required|max:255',
            'search_goal' => 'required|max:255',
            'targets' => 'required|max:255',
            'authority' => 'required|max:255',
            'authority_address' => 'required|max:255',
        ]);

        $data = new EducationalResearch;
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->id_number = $request->id_number;
        $data->work = $request->work;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->qualification = $request->qualification;
        $data->uni = $request->uni;
        $data->college = $request->college;
        $data->specialization = $request->specialization;
        $data->search_title = $request->search_title;
        $data->search_title = $request->search_title;

        if($request->search_goal == '3')
        {
            $data->search_goal = $request->search_goal_other;
        }else
        {
            $data->search_goal = $request->search_goal;

        }

        $data->chapter_date = $request->chapter_date;
        $data->targets = $request->targets;
        $data->authority = $request->authority;
        $data->authority_address = $request->authority_address;
        $data->target = $request->target;
        $data->search_tool = $request->search_tool;

        if($request->hasFile('search_tools') && $request->search_tools != null){
            $featured = $request->search_tools;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $data->search_tools = $featured_new_name;
        }

        if($request->hasFile('letter_approval') && $request->letter_approval != null){
            $featured = $request->letter_approval;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $data->letter_approval = $featured_new_name;
        }


        $data->save();

        Session::flash('success' , 'تمت اضافة النموذج  بنجاح ، وبإنتظار تفعيل مدير الموقع');
        return redirect()->route('dashboard.educational-research.type',2);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = EducationalResearch::findOrFail($id);
        return view('user.educational-research.details',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = EducationalResearch::findOrFail($id);
        return view('user.educational-research.edit',compact('data'));
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
            'id_number' => 'required|max:255',
            'work' => 'required|max:255',
            'uni' => 'required|max:255',
            'college' => 'required|max:255',
            'specialization' => 'required|max:255',
            'search_title' => 'required|max:255',
            'search_goal' => 'required|max:255',
            'targets' => 'required|max:255',
            'authority' => 'required|max:255',
            'authority_address' => 'required|max:255',
        ]);

        $data = EducationalResearch::find($id);
        $data->name = $request->name;
        $data->id_number = $request->id_number;
        $data->work = $request->work;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->qualification = $request->qualification;
        $data->uni = $request->uni;
        $data->college = $request->college;
        $data->specialization = $request->specialization;
        $data->search_title = $request->search_title;
        $data->search_title = $request->search_title;

        if($request->search_goal == '3')
        {
            $data->search_goal = $request->search_goal_other;
        }else
        {
            $data->search_goal = $request->search_goal;

        }

        $data->chapter_date = $request->chapter_date;
        $data->targets = $request->targets;
        $data->authority = $request->authority;
        $data->authority_address = $request->authority_address;
        $data->target = $request->target;
        $data->search_tool = $request->search_tool;

        if($request->hasFile('search_tools') && $request->search_tools != null){
            $featured = $request->search_tools;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $data->search_tools = $featured_new_name;
        }

        if($request->hasFile('letter_approval') && $request->letter_approval != null){
            $featured = $request->letter_approval;
            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads' , $featured_new_name);

            $data->letter_approval = $featured_new_name;
        }

        $data->status = 2;
        $data->is_confirmed = 0;


        $data->save();

        Session::flash('success' , 'تمت تعديل بيانات النموذج  بنجاح ، وبإنتظار تفعيل مدير الموقع');
        return redirect()->route('dashboard.educational-research.type',2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = EducationalResearch::find($id);
        $data->status = 3;
        $data->is_confirmed = 0;
        $data->is_deleted = 1;
        $data->save();

        Session::flash('success' , 'تمت حذف النموذج بنجاح ، وبإنتظار تأكيد مدير الموقع');
        return redirect()->back();
    }
}
