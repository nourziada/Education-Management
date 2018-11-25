<?php

namespace App\Http\Controllers\Admin;

use App\OperationalPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class OperationalPlanesController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /*
     * Get Plan Details
     */

    public function getPlanDetails($id)
    {
        $data = OperationalPlan::findOrFail($id);
        return view('admin.operational-plans.details',compact('data'));
    }

    /*
     * Accept Plan that is_confirm == 0
     */
    public function acceptPlan($id)
    {
        $plan = OperationalPlan::find($id);
        $plan->is_confirmed = 1;
        $plan->save();

        Session::flash('success' , 'تمت الموافقة على الخطة بالاجراء');
        return redirect()->back();
    }


    /*
     * Get All Operational Planes With Type
     * type == 1 , is Confirmed == 1 , is deleted == 0
     * type == 2 , is Not Confirmed == 0
     * type == 3 , is Confirmed == 1 , is Deleted == 1
     */

    public function getPlansWithType($type)
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

        return view('admin.operational-plans.index',compact('projects','type'));
    }
}
