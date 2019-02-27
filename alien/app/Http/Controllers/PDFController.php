<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;

class PDFController extends Controller
{

    public function condition(){
            return view('orders.condition');
    }
    public function export($id)
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
		PDF::setOptions(['dpi' => 96, 'defaultFont' => 'SolaimanLipi']);
		$pdf = PDF::loadView('prescription', compact('qPrescriptionDetails','qMedicine'));
		return $pdf->download('Prescription.pdf');
    }

    public function exportInvoice($id){
    	$qOrder = DB::table('order_master')
                        ->where('id',$id)
                        ->select('id','name','phone','address','created_at')
                        ->first();
        $qInvoice = DB::table('order_details as orde')
                        ->join('product_category as prca','prca.id','=','orde.category_id')
                        ->join('product_master as prma','prma.id','=','orde.product_id')
                        ->join('product_measurement as prme','prme.id','=','orde.measurement_id')
                        ->where('order_id',$id)
                        ->select('prca.category_name_en as catName','prma.product_name_en as proName','prme.measurement_name_en as meName','orde.price as price','orde.qty as qty')
                        ->get();
    	$pdf = PDF::loadView('invoice', compact('qOrder','qInvoice'));
    	return $pdf->download('invoice.pdf');
    }
}
