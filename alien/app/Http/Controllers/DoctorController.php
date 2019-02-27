<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Cookie;
use App\User;
use Image;
use Auth;
use DB;

class DoctorController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $qItems=DB::table('doctor_profile')->select('id','user_id','doctor_name','email','mobile','degree','skype','training','imo','gender','available','about','profile_image')->where('user_id',Auth::user()->id)->where('is_active','Y')->first();
    return view('doctor-dashboard.doctor-profile', compact('qItems'));
  }


  public function create(Request $request)
  {
    //
  }


  public function store(Request $request)
  {
      
  }


  public function show($id)
  {
    $qItems=DB::table('patient_request as pare')
    ->join('patient_profile as papr', 'papr.id','=','pare.patient_id')
    ->join('blood_group as blgr', 'blgr.id','=','papr.blood_group')
    ->where('pare.doctor_id', Auth::user()->id)
    ->where('pare.done_it','N')
    ->select('papr.*','blgr.blood_group_name')
    ->get();

    return view('doctor-dashboard.patient-list', compact('qItems'));
  }


  public function edit($id)
  {
    $qItem=DB::table('patient_profile')->where('id',$id)->where('is_active','Y')->first();
    $qBloodGroup=DB::table('blood_group')->pluck('blood_group_name', 'id');
    return view('doctor-dashboard.patient-case-history', compact('qItem','qBloodGroup'));
  }


  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'txtDoctorName' => 'required|max:129',
      'txtEmail' => 'required|email|max:69',
      'txtMobile' => 'required|min:11|numeric',
      'txtDegree' => 'required',
      'rdoGender' => 'required',
      'rdoAvailable' => 'required'
    ]);

    $sImageDirectoryPath=$request->oldImage;

    if(!empty($request->file('fImageFile')))
    {
      $sDirectory=date('Y');
      $sImageDirectoryPath="";

      $fImage = $request->file('fImageFile');
      $sImageName = time().'.'.$fImage->getClientOriginalName();
      $sDirectoryPath='images/'.$sDirectory.'/profile';
      $sImageDirectoryPath=$sDirectoryPath.'/'.$sImageName;
      $sImageThumb = Image::make($fImage->getRealPath())->resize(280, 300);
      $sImageThumb->save($sDirectoryPath.'/'.$sImageName,80);
    }

    DB::table('doctor_profile')->where('id',$id)->update([
      'doctor_name'=>$request->txtDoctorName,
      'degree'=>$request->txtDegree,
      'training'=>$request->txtSpecialTraining,
      'email'=>$request->txtEmail,
      'skype'=>$request->txtSkype,
      'mobile'=>$request->txtMobile,
      'imo'=>$request->txtIMO,
      'gender'=>$request->rdoGender,
      'available'=>$request->rdoAvailable,
      'about'=>$request->txtAbout,
      'profile_image'=>$sImageDirectoryPath,
      'remember_token' => $request->_token,
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-info', 'Doctor information was successfully updated.');
    return redirect('doctor-profile');

  }


    public function destroy($id)
    {
        //
    }
}
