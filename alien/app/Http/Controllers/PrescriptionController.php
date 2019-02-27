<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;

class PrescriptionController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
        
    //     // $qPatient=DB::table('patient_request as pare')
    //     // ->join('patient_profile as papr', 'papr.id','=','pare.patient_id')
    //     // ->join('blood_group as blgr', 'blgr.id','=','papr.blood_group')
    //     // ->where('pare.doctor_id', Auth::user()->id)
    //     // ->where('pare.done_it','N')
    //     // //->where('pare.created_at', date('Y-m-d'))
    //     // ->select('papr.id as id','papr.patient_name as name','blgr.blood_group_name as bg','papr.blood_pressure as bp','papr.gender as gender','papr.age as age','papr.diabetus as diabetes','papr.problem as problem')
    //     // ->get();
    //     // $qDoctor = DB::table('doctor_profile as dp')
    //     //           ->join('users as u','u.id','=','dp.user_id')
    //     //           ->select('dp.degree as degree','dp.training as tarining','dp.about as about')
    //     //           ->where('dp.user_id', Auth::user()->id)
    //     //           ->first();
    //     // $qProductCategory=DB::table('product_category')->pluck('category_name_en', 'id');
    //     // $qItems=DB::table('product_master')->where('product_category_id',$qProductCategory);
    //     // return view('doctor-dashboard.prescribe', compact('qProductCategory', 'qItems','qDoctor','qPatient'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
        foreach ($request->cmbProductInfo as $key => $value) {
            $data = array(
                    'patient_id'=>$request->patientId,
                    'doctor_id'=>Auth::user()->id,
                    'history_id'=>$request->historyId,
                    'medicine_id'=>$value,
                    'dose_time'=>$request->cmbDose [$key],
                    'dose_qty'=>$request->cmbQty [$key],
                    'dose_qty_type'=>$request->cmbQtyType [$key],
                    'dose_eat'=>$request->cmbEat [$key],
                    'dose_duration'=>$request->eatDuration [$key],
                    'dose_duration_type'=>$request->cmbEatDurationType [$key],
                    'remember_token' => $request->_token,
                    'created_at' =>  date('Y-m-d H:i:s'),
                    'updated_at' =>  date('Y-m-d H:i:s')
                );
            DB::table('prescriptions')->insert($data);
        };

        DB::table('patient_request')->where('patient_id',$request->patientId)->update(['done_it'=>'Y']);

        return redirect('doctor-profile/0')->with('alert-success','Prescription Successfully Done!');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // *
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
     
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
