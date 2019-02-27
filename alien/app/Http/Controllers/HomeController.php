<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sUserType=Auth::user()->user_type;
        if($sUserType=='9JaPaN9')
        {
         return view('admin-dashboard.home');
        }
        elseif($sUserType=='8adMin9')
        {
         return view('admin-dashboard.home');
        }
        elseif($sUserType=='7ediTor9')
        {
         return view('admin-dashboard.home');
        }
        elseif($sUserType=='7docTor9')
        {
         return view('doctor-dashboard.doctor-home');
        }
        elseif($sUserType=='6MeMber9')
        {
         return view('patient-dashboard.treatment-info');
        }
        else
        {
          return redirect('/');
        }
        //return view('admin-dashboard/home');
    }
}
