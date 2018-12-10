<?php

namespace App\Http\Controllers\Web;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{

    /*
     * Get the Departments By Management Id
     */

    public function getDepartmentById($manag_id)
    {
        $departments = Department::where('management_id',$manag_id)->get();
        return response()->json($departments);
    }
}
