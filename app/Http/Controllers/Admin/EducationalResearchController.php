<?php

namespace App\Http\Controllers\Admin;

use App\EducationalResearch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class EducationalResearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /*
    * Get Plan Details
    */

    public function getFormDetails($id)
    {
        $data = EducationalResearch::findOrFail($id);
        return view('admin.educational-research.details',compact('data'));
    }


    /*
     * Accept Form that is_confirm == 0
     */
    public function acceptForm($id)
    {
        $plan = EducationalResearch::find($id);
        $plan->is_confirmed = 1;
        $plan->save();

        Session::flash('success' , 'تمت الموافقة على النموذج بالاجراء');
        return redirect()->back();
    }


    /*
     * Get All Educational Research Forms With Type
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

        return view('admin.educational-research.index',compact('projects','type'));
    }
}
