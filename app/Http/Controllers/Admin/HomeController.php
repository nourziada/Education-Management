<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\OperationalPlan;
use App\RiskForm;
use App\Strategic;
use App\Swat;
use Auth;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }


    public function index()
    {
        $strategice_plans = Strategic::get();
        $operational_plans = OperationalPlan::get();
        $swat_plans = Swat::get();
        $risks_forms = RiskForm::get();
        
        return view('admin.index',compact('strategice_plans','operational_plans','swat_plans','risks_forms'));
    }
}
