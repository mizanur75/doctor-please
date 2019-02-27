<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
use DB;
use PDF;

class PatientController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $qItems=DB::table('patient_profile')->where('member_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
    return view('patient-dashboard.all-patient-profile', compact('qItems'));
  }


  public function create()
  {
    $qBloodGroup=DB::table('blood_group')->pluck('blood_group_name', 'id');
    return view('patient-dashboard.new-patient-profile', compact('qBloodGroup'));
  }


  public function store(Request $request)
  {
    $this->validate($request,[
      'txtPatientName' => 'required|max:69',
      'txtAge' => 'required|max:7',
      'rdoGender' => 'required',
      'rdoDiabetus' => 'required',
      'fImageFile' => 'mimes:jpg,jpeg,png'
    ]);

    $sDirectory=date('Y');

    $fImage = $request->file('fImageFile');
    $sImageName = time().'-'.$fImage->getClientOriginalName();
    //Big Image
    $sDirectoryPath='images/'.$sDirectory.'/profile';
    $sImageDirectoryPath=$sDirectoryPath.'/'.$sImageName;
    $sImageThumb = Image::make($fImage->getRealPath())->resize(200, 200);
    $sImageThumb->save($sDirectoryPath.'/'.$sImageName,80);

    DB::table('patient_profile')->insert([
      'member_id'=>Auth::user()->id,
      'patient_name'=>$request->txtPatientName,
      'age'=>$request->txtAge,
      'weight'=>$request->txtWeight,
      'gender'=>$request->rdoGender,
      'pulse'=>$request->txtPulse,
      'blood_pressure'=>$request->rdoBloodPressure,
      'blood_group'=>$request->cmbBloodGroup,
      'diabetus'=>$request->rdoDiabetus,
      'temperature'=>$request->txtTemperature,
      'urination'=>$request->txtUrination,
      'temperament'=>$request->txtTemperament,
      'problem'=>$request->txtProblem,
      'profile_image'=>$sImageDirectoryPath,
      'is_active'=>'Y',
      'create_user_id'=>Auth::user()->id,
      'update_user_id'=>Auth::user()->id,
      'create_user_ip'=>$request->ip(),
      'update_user_ip'=>$request->ip(),
      'remember_token' => $request->_token,
      'created_at' =>  date('Y-m-d H:i:s'),
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-success', 'Patient profile information is successfully create.');
    return redirect('patient-profile');

  }


  public function show($id)
  {
    $qItems=DB::table('doctor_profile')->where('available','Y')->where('is_active','Y')->get();

    return view('patient-dashboard.available-doctor', compact('qItems','id'));
  }


  public function edit($id)
  {
    $sItem=DB::table('patient_profile')->where('member_id', Auth::user()->id)->where('id',$id)->first();
    $qBloodGroup=DB::table('blood_group')->pluck('blood_group_name', 'id');
    $iUpdateRecord=DB::table('edit_patient_profile')->where('member_id', Auth::user()->id)->where('patient_id',$id)->count();
    return view('patient-dashboard.edit-patient-profile', compact('sItem','qBloodGroup','iUpdateRecord'));
  }


  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'txtPatientName' => 'required|max:69',
      'txtAge' => 'required|max:7',
      'rdoGender' => 'required',
      'rdoDiabetus' => 'required',
      'fImageFile' => 'mimes:jpg,jpeg,png',
      'txtGoogle' => 'max:69',
      'txtSkype' => 'max:69'
    ]);

    if(!empty($request->txtMobile))
    {
      $this->validate($request,[
        'txtMobile' => 'digits:11|numeric'
      ]);
    }

    if(!empty($request->txtIMO))
    {
      $this->validate($request,[
        'txtIMO' => 'digits:11|numeric'
      ]);
    }

    // Record edited item
    $sItem=DB::table('patient_profile')->where('member_id',Auth::user()->id)->where('id',$id)->first();

    DB::table('edit_patient_profile')->insert([
      'member_id'=>$sItem->member_id,
      'patient_id'=>$sItem->id,
      'patient_name'=>$sItem->patient_name,
      'age'=>$sItem->age,
      'weight'=>$sItem->weight,
      'gender'=>$sItem->gender,
      'pulse'=>$sItem->pulse,
      'blood_pressure'=>$sItem->blood_pressure,
      'blood_group'=>$sItem->blood_group,
      'diabetus'=>$sItem->diabetus,
      'temperature'=>$sItem->temperature,
      'urination'=>$sItem->urination,
      'temperament'=>$sItem->temperament,
      'problem'=>$sItem->problem,
      'profile_image'=>$sItem->profile_image,
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'remember_token' => $request->_token,
      'created_at' =>  date('Y-m-d H:i:s'),
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);
    // Record edited item close

    $sDirectory=date('Y');
    $sImageDirectoryPath=$request->oldImage;

    if(!empty($request->file('fImageFile')))
    {
      $sImageDirectoryPath="";
      $fImage = $request->file('fImageFile');
      $sImageName = time().'-'.$fImage->getClientOriginalName();
      //Big Image
      $sDirectoryPath='images/'.$sDirectory.'/profile';
      $sImageDirectoryPath=$sDirectoryPath.'/'.$sImageName;
      $sImageThumb = Image::make($fImage->getRealPath())->resize(200, 200);
      $sImageThumb->save($sDirectoryPath.'/'.$sImageName,80);
    }


    DB::table('patient_profile')->where('id', $id)->update([
      'member_id'=>Auth::user()->id,
      'patient_name'=>$request->txtPatientName,
      'age'=>$request->txtAge,
      'weight'=>$request->txtWeight,
      'gender'=>$request->rdoGender,
      'pulse'=>$request->txtPulse,
      'blood_pressure'=>$request->rdoBloodPressure,
      'blood_group'=>$request->cmbBloodGroup,
      'diabetus'=>$request->rdoDiabetus,
      'temperature'=>$request->txtTemperature,
      'urination'=>$request->txtUrination,
      'temperament'=>$request->txtTemperament,
      'problem'=>$request->txtProblem,
      'profile_image'=>$sImageDirectoryPath,
      'google'=>$request->txtGoogle,
      'skype'=>$request->txtSkype,
      'mobile'=>$request->txtMobile,
      'imo'=>$request->txtIMO,
      'is_active'=>'Y',
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'remember_token' => $request->_token,
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-info', 'রোগীর প্রোফাইল তথ্য সফলভাবে তৈরি করা হ্যেছে।');
    return redirect('patient-profile');
  }


  public function request(Request $request,$pID,$dID)
  {
    $this->validate($request,[
      'rdoCommunicaton' => 'required'
    ]);


    // Checking Patient Request Exist or Not
    $qChecking=DB::table('patient_request')->select('response_time')->where('patient_id',$pID)->where('done_it','N')->first();
    //How much time do you need
    $iTime=!empty($qChecking->response_time)?$qChecking->response_time:'';

    if(empty($qChecking))
    {
      //Validation For Updating Communication Way Before Sending Requests
      $qPatientProfile=DB::table('patient_profile')->select('id','google','skype','mobile','imo')->where('id',$pID)->first();

      if(!empty($qPatientProfile->google) && $request->rdoCommunicaton=='G')
      {$sCommunicationBy=$request->rdoCommunicaton;}
      elseif(!empty($qPatientProfile->skype) && $request->rdoCommunicaton=='S')
      {$sCommunicationBy=$request->rdoCommunicaton;}
      elseif(!empty($qPatientProfile->mobile) && $request->rdoCommunicaton=='M')
      {$sCommunicationBy=$request->rdoCommunicaton;}
      elseif(!empty($qPatientProfile->imo) && $request->rdoCommunicaton=='I')
      {$sCommunicationBy=$request->rdoCommunicaton;}
      else
      {
        $request->session()->flash('alert-warning', 'অনুগ্রহ করে ডাক্তারের সাথে রোগীর কথা বলার মাধ্যমে আপডেট/হালনাগাদ করুন।');
        return back();
      }

      //Checking Create Response Time
      $qResponseTime=DB::table('patient_request')->select('response_time')->where('doctor_id',$dID)->where('done_it','N')->first();

      $qDoctorPhone = DB::table('doctor_profile')->where('doctor_profile.user_id',$dID)->select('mobile')->first();

      $iTime=15+(!empty($qResponseTime->response_time)?$qResponseTime->response_time:0);

      DB::table('patient_request')->insert([
        'member_id'=>Auth::user()->id,
        'patient_id'=>$pID,
        'doctor_id'=>$dID,
        'communication_by'=>$sCommunicationBy,
        'response_time'=>$iTime,
        'done_it'=>'N',
        'is_active'=>'Y',
        'create_user_id'=>Auth::user()->id,
        'update_user_id'=>Auth::user()->id,
        'create_user_ip'=>$request->ip(),
        'update_user_ip'=>$request->ip(),
        'remember_token' => $request->_token,
        'created_at' =>  date('Y-m-d H:i:s'),
        'updated_at' =>  date('Y-m-d H:i:s')
      ]);

      $sMessage="অনুগ্রহপূর্বক অপেক্ষা করুন, এখন ডাক্তার অন্য রোগীর সাথে ব্যস্ত। অনুগ্র করে কিছুক্ষণ পর কল করুন।";
      // $qDoctorPhone = DB::table('doctor_profile')->select('mobile')->where('user_id',$dID)->first();
      return view('patient-dashboard.patient-waiting', compact('iTime','sMessage','qDoctorPhone'));
    }
    $qDoctorPhone = DB::table('doctor_profile')->where('doctor_profile.user_id',$dID)->select('mobile')->first();
    $sMessage="দুঃখিত আপনি নতুন অনুরোধ পাঠাতে পারবেন না, আপনি ইতিমধ্যে একটি অনুরোধ পাঠিয়েছেন। আপনি যদি নতুন অনুরোধ পাঠাতে চান তবে আপনার পুরানো অনুরোধটি মুছুন এবং পুনরায় নতুন করে অনুরোধ পাঠান।";

    return view('patient-dashboard.patient-waiting', compact('iTime','sMessage','qDoctorPhone'));

  }

  public function prescription_by_patient($id)
  {
    $qPatient_name = DB::table('patient_profile')->select('patient_name')->where('id',$id)->first();
    
    $qPatient_history = DB::table('patient_history as pahi')
                        ->join('patient_profile as papr','papr.id','=','pahi.patient_id')
                        ->join('doctor_profile as dopr','dopr.user_id','=','pahi.doctor_id')
                        ->where('pahi.patient_id',$id)
                        ->select('pahi.id as phID','dopr.doctor_name as dName','papr.patient_name as pName','pahi.puls as puls')
                        ->orderBy('phID', 'desc')
                        ->paginate(4);

    return view('patient-dashboard.all-prescription',compact('qPatient_history','qPatient_name'));
  }
  public function prescription_by_date($id)
  {
    $qPrescriptionDetails = DB::table('prescriptions as pr')
                        ->join('patient_profile as papr','papr.id','=','pr.patient_id')
                        ->join('doctor_profile as dopr','dopr.user_id','=','pr.doctor_id')
                        ->join('patient_history as pahi','pahi.id','=','pr.history_id')
                        ->where('pr.history_id',$id)
                        ->select('pahi.id as pahiID','papr.patient_name as pName','papr.age as age','papr.gender as gender','dopr.doctor_name as dName','dopr.degree as degree','dopr.training as training','pahi.bp as bp','pr.created_at as created_at')
                        ->first();

    $qMedicine = DB::table('prescriptions as pr')
                        ->join('patient_history as pahi','pahi.id','=','pr.history_id')
                        ->join('product_master as prma','prma.id','=','pr.medicine_id')
                        ->where('pr.history_id',$id)
                        ->select('prma.product_name_en as proName','pr.dose_time as dose_time','pr.dose_qty as dose_qty','pr.dose_qty_type as dose_qty_type','pr.dose_eat as dose_eat','pr.dose_duration as dose_duration','pr.dose_duration_type as dose_duration_type')
                        ->get();

    return view('patient-dashboard.prescription',compact('qPrescriptionDetails','qMedicine'));
  }
}
