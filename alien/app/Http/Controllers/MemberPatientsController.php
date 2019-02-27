<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
use DB;

class MemberPatientsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    if(empty($request->txtSearchName))
    {
      $qItems=DB::table('users')->where('user_type','6MeMber9')->orderBy('id', 'desc')->paginate(10);
    }
    if(!empty($request->txtSearchName))
    {
      $qItems=DB::table('users')->where('user_type','6MeMber9')->where('name','LIKE', "%$request->txtSearchName%")->orderBy('id', 'desc')->paginate(10);
    }

    return view('admin-dashboard.members-patients.all-member', compact('qItems'));
  }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
