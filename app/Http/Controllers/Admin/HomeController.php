<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
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
        return view('admin.index');
    }
}
