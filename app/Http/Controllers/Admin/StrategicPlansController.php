<?php

namespace App\Http\Controllers\Admin;

use App\Strategic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class StrategicPlansController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
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

        return view('admin.strategic-plans.index',compact('projects','type'));
    }
}
