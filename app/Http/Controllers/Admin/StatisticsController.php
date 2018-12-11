<?php

namespace App\Http\Controllers\Admin;

use App\OperationalPlan;
use App\Strategic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{

    /*
     * Get Data
     */

    public function SendData(Request $request)
    {
        $managment_id = $request->management;
        $department_id = $request->department;
        $report_type = $request->report_type;

        if($report_type == 1)
        {
            return view('admin.statistics.first',compact('managment_id','department_id'));
        }

        if($report_type == 2)
        {
            return view('admin.statistics.second',compact('managment_id','department_id'));
        }

        if($report_type == 3)
        {
            return view('admin.statistics.third',compact('managment_id','department_id'));
        }

        if($report_type == 4)
        {
            return view('admin.statistics.fourth',compact('managment_id','department_id'));
        }


    }

    /*
     * Get the Page Layouts
     */

    public function getPage()
    {
        return view('admin.statistics.index');
    }
}
