<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  Auth;


class PatienthistoryController extends Controller
{
    public function store(Request $request)
    {
        DB::table('patient_history')->insert([
            'patient_id' => $request->qItemId,
            'doctor_id' => Auth::user()->id,
            'gender' => $request->rdoGender,
            'bp' => $request->rdoBloodPressure,
            'diabetes' => $request->rdoDiabetus,
            'puls' => $request->txtPulse,
            'blood_group' => $request->cmbBloodGroup,
            'temperature' => $request->txtTemperature,
            'urination' => $request->txtUrination,
            'temperment' => $request->txtTemperature,
            'stroke' => $request->stroke,
            'vertigo' => $request->vertigo,
            'seizures' => $request->seizures,
            'asthma' => $request->asthma,
            'cough' => $request->cough,
            'bronchitis' => $request->bronchitis,
            'breath' => $request->breath,
            'emphysema' => $request->emphysema,
            'family_history' => $request->family_history,
            'constipation' => $request->constipation,
            'chrones' => $request->chrones,
            'colitis' => $request->colitis,
            'syndrome' => $request->syndrome,
            'ulcer' => $request->ulcer,
            'headache' => $request->headache,
            'migrane' => $request->migrane,
            'vidon' => $request->vidon,
            'visson_loss' => $request->visson_loss,
            'ear' => $request->ear,
            'hearing' => $request->hearing,
            'back' => $request->back,
            'shoulder' => $request->shoulder,
            'elbow' => $request->elbow,
            'wrist' => $request->wrist,
            'knee' => $request->knee,
            'hip' => $request->hip,
            'pregnancy' => $request->pregnancy,
            'preg_due_date' => $request->txtPregnancyDueDate,
            'pri_preg' => $request->pri_preg,
            'motopausal' => $request->motopausal,
            'mgrstrual' => $request->mgrstrual,
            'gynocho' => $request->gynocho,
            'gy_des' => $request->txtGynecologicalDescribe,
            'enl_prostate' => $request->txtGynecologicalDescribe,
            'libidoi' => $request->libidoi,
            'man_other' => $request->txtManOther,
            'skin' => $request->skin,
            'raspiratory' => $request->raspiratory,
            'hepatities' => $request->hepatities,
            'eczema' => $request->eczema,
            'psoriasis' => $request->psoriasis,
            'rash' => $request->rash,
            'warts' => $request->warts,
            'open_sores' => $request->open_sores,
            'sensation' => $request->sensation,
            'sen_details' => $request->txtLossSensation,
            'himophilia' => $request->himophilia,
            'epilepsy' => $request->epilepsy,
            'fatigue' => $request->fatigue,
            'scoliopis' => $request->scoliopis,
            'polio' => $request->polio,
            'osteoporisis' => $request->osteoporisis,
            'cancer' => $request->cancer,
            'cancer_type' => $request->cancer_type,
            'alergy' => $request->alergy,
            'arthitis' => $request->arthitis,
            'family_arthitis' => $request->family_arthitis,
            'remember_token' => $request->_token,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s')
        ]);

        $historyId = DB::getPdo()->lastInsertId();

        $qPatient=DB::table('patient_request as pare')
        ->join('patient_profile as papr', 'papr.id','=','pare.patient_id')
        ->join('blood_group as blgr', 'blgr.id','=','papr.blood_group')
        ->where('pare.doctor_id', Auth::user()->id)
        ->where('pare.done_it','N')
        ->where('papr.id',$request->qItemId)
        ->select('papr.id as id','papr.patient_name as name','blgr.blood_group_name as bg','papr.blood_pressure as bp','papr.gender as gender','papr.age as age','papr.diabetus as diabetes','papr.problem as problem','papr.created_at as date')
        ->first();
        
        $qDoctor = DB::table('doctor_profile as dp')
                  ->join('users as u','u.id','=','dp.user_id')
                  ->select('dp.degree as degree','dp.training as tarining','dp.about as about')
                  ->where('dp.user_id', Auth::user()->id)
                  ->first();

        $qProductCategory=DB::table('product_category')->pluck('category_name_en', 'id');
        $qItems=DB::table('product_master')->where('product_category_id',$qProductCategory);

        return view('doctor-dashboard.prescribe', compact('qProductCategory', 'qItems','qDoctor','qPatient','historyId'))->withCookie('historyId');
    }
}
