<?php

namespace App\Http\Controllers\Admin;

use App\AdminRole;
use App\Strategic;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;

class StrategicPlansController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /*
     * Filter Plans
     */

    public function filterPlans(Request $request)
    {
        $managment_id = $request->management;
        $department_id = $request->department;
        $strategic_goal_id = $request->strategic_goal;
        $type = $request->type;

        if($type == 1)
        {

            $projects = Strategic::where('management',$managment_id)
                                    ->where('department',$department_id)
                                    ->where('strategic_goal',$strategic_goal_id)
                                    ->where('is_confirmed',1)
                                    ->where('is_deleted',0)
                                    ->orderBy('created_at','desc')
                                    ->get();

        }


        // Not Confirmed
        if($type == 2)
        {

            $projects = Strategic::where('management',$managment_id)
                                    ->where('department',$department_id)
                                    ->where('strategic_goal',$strategic_goal_id)
                                    ->where('is_confirmed',0)
                                    ->orderBy('created_at','desc')
                                    ->get();

        }


        // Confirmed , Deleted
        if($type == 3)
        {
            $projects = Strategic::where('management',$managment_id)
                                    ->where('department',$department_id)
                                    ->where('strategic_goal',$strategic_goal_id)
                                    ->where('is_confirmed',1)
                                    ->where('is_deleted',1)
                                    ->orderBy('created_at','desc')
                                    ->get();

        }

        return view('admin.strategic-plans.index',compact('projects','type'));
    }

    /*
     * Get Plans Details
     */

    public function getPlanDetails($id)
    {
        $data = Strategic::findOrFail($id);
        $user = User::find($data->user_id);
        return view('admin.strategic-plans.details',compact('data','user'));
    }

    /*
     * Accept Plan that is_confirm == 0
     */
    public function acceptPlan($id)
    {
        $plan = Strategic::find($id);
        $plan->is_confirmed = 1;
        $plan->save();

        Session::flash('success' , 'تمت الموافقة على الخطة بالاجراء');
        return redirect()->back();
    }

    /*
     * Get All Strategic With Type
     * type == 1 , is Confirmed == 1 , is deleted == 0
     * type == 2 , is Not Confirmed == 0
     * type == 3 , is Confirmed == 1 , is Deleted == 1
     */

    public function getPlansWithType($type)
    {
        //Check the Admin Role

        $roles = AdminRole::where('user_id',Auth::user()->id)->get();
        // Confirmed , and Not Deleted
        if($type == 1)
        {

            if($roles->contains('role_id', 1) || Auth::user()->email == 'admin@admin.com')
            {
                $projects = Strategic::where('is_confirmed',1)->where('is_deleted',0)->orderBy('created_at','desc')->get();

            }elseif($roles->contains('role_id', 2) || Auth::user()->email == 'admin@admin.com')
            {
                $managment = AdminRole::where('user_id',Auth::user()->id)->where('role_id',2)->get()->first();
                $management_id = $managment->management_id;
                $projects = Strategic::where('management',$management_id)->where('is_confirmed',1)->where('is_deleted',0)->orderBy('created_at','desc')->get();
            }
        }


        // Not Confirmed
        if($type == 2)
        {

            if($roles->contains('role_id', 1) || Auth::user()->email == 'admin@admin.com')
            {
                $projects = Strategic::where('is_confirmed',0)->orderBy('created_at','desc')->get();

            }elseif($roles->contains('role_id', 2) || Auth::user()->email == 'admin@admin.com')
            {
                $managment = AdminRole::where('user_id',Auth::user()->id)->where('role_id',2)->get()->first();
                $management_id = $managment->management_id;
                $projects = Strategic::where('management',$management_id)->where('is_confirmed',0)->orderBy('created_at','desc')->get();
            }

        }


        // Confirmed , Deleted
        if($type == 3)
        {
            if($roles->contains('role_id', 1) || Auth::user()->email == 'admin@admin.com')
            {
                $projects = Strategic::where('is_confirmed',1)->where('is_deleted',1)->orderBy('created_at','desc')->get();

            }elseif($roles->contains('role_id', 2) || Auth::user()->email == 'admin@admin.com')
            {
                $managment = AdminRole::where('user_id',Auth::user()->id)->where('role_id',2)->get()->first();
                $management_id = $managment->management_id;
                $projects = Strategic::where('management',$management_id)->where('is_confirmed',1)->where('is_deleted',1)->orderBy('created_at','desc')->get();
            }

        }

        return view('admin.strategic-plans.index',compact('projects','type'));
    }
}
