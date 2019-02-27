<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    // Start Prescription Order
    public function order($id){
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

    	return view('patient-dashboard.order',compact('qPrescriptionDetails','qMedicine'));
    }


    public function orderConfirm(Request $request){

        

    	DB::table('orders')->insert([
    		'history_id' => $request->txtHistoryID,
    		'receiver_name' => $request->txtReceiverName,
    		'phone' => $request->txtPhoneNumber,
    		'shipping_address' => $request->txtAddress,
    		'how_days' => $request->txtDays,
    		'remember_token' => $request->_token,
    		'created_at' =>  date('Y-m-d H:i:s'),
    		'updated_at' =>  date('Y-m-d H:i:s')
    	]);
    	
    	return redirect('patient-profile');
    }
    // End Prescription Order


    // Start Without Prescription Order
    public function orderWithoutPrescription(){
        $qProductCategory=DB::table('product_category')->pluck('category_name_en', 'id');
        $qItems=DB::table('product_master')->where('product_category_id',$qProductCategory);

        return view('orders.order', compact('qProductCategory', 'qItems'));
    }

    public function confirmOrderWithoutPrescription(Request $request){
        
        DB::table('order_master')->insert([
            'user_id' => Auth::user()->id,
            'name' => $request->txtReceiverName,
            'phone' => $request->txtPhoneNumber,
            'address' => $request->txtAddress,
            'is_deliver' => 'N',
            'is_view' => 'N',
            'remember_token' => $request->_token,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' =>  date('Y-m-d H:i:s')
        ]);

        $order_id = DB::getPdo()->lastInsertId();

        foreach ($request->cmbProductCategory as $key => $value) {
            $data = array(
                'order_id' => $order_id,
                'category_id' => $value,
                'product_id' => $request->cmbProductInfo [$key],
                'measurement_id' => $request->cmbMeasurment [$key],
                'price' => $request->price [$key],
                'qty' => $request->qty [$key],
                'remember_token' => $request->_token,
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at' =>  date('Y-m-d H:i:s')
            );

            DB::table('order_details')->insert($data);
        }

        return back()->with('msg','Your Order is Successfully Placed!');
    }


    public function allInvoice(){
        $qAllInvoice = DB::table('order_master')
                        ->where('user_id', Auth::user()->id)
                        ->select('id','name','phone','address','is_deliver','created_at')
                        ->orderBy('id','desc')
                        ->paginate(10);
        return view('orders.all-invoice', compact('qAllInvoice'));
    }
    

    public function invoiceByOrderId($id){
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
        return view('orders.invoice', compact('qOrder','qInvoice'));
    }

// Admin Dashboard Control 

    public function adminAllInvoice(){
        $qWaitingOrderCount = DB::table('order_master')
                ->where('is_view', 'N')
                ->count();

        $qPendingOrderCount = DB::table('order_master')
                                ->where('is_deliver', 'N')
                                ->count();
        $qTotal = DB::table('order_details as orde')
                        ->join('order_master as orma','orma.id','=','orde.order_id')
                        ->select('orde.qty as qty','orde.price as price')
                        ->where('orma.is_deliver','Y')
                        ->get();
        $qAllInvoice = DB::table('order_master')
                        ->select('id','name','phone','address','is_deliver','created_at')
                        ->orderBy('id','desc')
                        ->paginate(10);
        return view('admin-dashboard.orders.all-invoice', compact('qAllInvoice','qTotal','qWaitingOrderCount','qPendingOrderCount'));
    }

    public function searchByOrderId(Request $request){
        $qTotal = DB::table('order_details as orde')
                        ->join('order_master as orma','orma.id','=','orde.order_id')
                        ->select('orde.qty as qty','orde.price as price')
                        ->where('orma.is_deliver','Y')
                        ->get();
        $qAllInvoice = DB::table('order_master')
                        ->select('id','name','phone','address','is_deliver','created_at')
                        ->where('id',$request->txtOrderId)
                        ->first();
        return view('admin-dashboard.orders.search-invoice', compact('qAllInvoice','qTotal'));
    }

    public function InvoiceDetailsByOrderId($id){
        $qOrder = DB::table('order_master')
                        ->where('id',$id)
                        ->select('id','name','phone','address','is_deliver','created_at')
                        ->first();
        $qInvoice = DB::table('order_details as orde')
                        ->join('product_category as prca','prca.id','=','orde.category_id')
                        ->join('product_master as prma','prma.id','=','orde.product_id')
                        ->join('product_measurement as prme','prme.id','=','orde.measurement_id')
                        ->where('order_id',$id)
                        ->select('prca.category_name_en as catName','prma.product_name_en as proName','prme.measurement_name_en as meName','orde.price as price','orde.qty as qty')
                        ->get();
        DB::table('order_master')
            ->where('id',$id)
            ->update([
                'is_view'=>'Y'
            ]);
        return view('admin-dashboard.orders.invoice',compact('qOrder','qInvoice'));
    }

    
    public function deliver($id){
        DB::table('order_master')
        ->where('id', $id)
        ->update([
            'is_deliver'=>'Y',
        ]);

        return redirect('admin-all-invoice');
    }

    public function waitingOrder(){
        $qWaitingOrderCount = DB::table('order_master')
                ->where('is_view', 'N')
                ->count();

        $qPendingOrderCount = DB::table('order_master')
                                ->where('is_deliver', 'N')
                                ->count();
        $qTotal = DB::table('order_details as orde')
                        ->join('order_master as orma','orma.id','=','orde.order_id')
                        ->select('orde.qty as qty','orde.price as price')
                        ->where('orma.is_deliver','N')
                        ->get();
        $qWaitingOrder = DB::table('order_master')
                        ->select('id','name','phone','address','is_deliver','created_at')
                        ->where('is_view','N')
                        ->orderBy('id','desc')
                        ->paginate(10);
        return view('admin-dashboard.orders.waiting-order', compact('qWaitingOrder','qTotal','qWaitingOrderCount','qPendingOrderCount'));
    }

    public function pendingOrder(){
        $qWaitingOrderCount = DB::table('order_master')
                                    ->where('is_view', 'N')
                                    ->count();

        $qPendingOrderCount = DB::table('order_master')
                                ->where('is_deliver', 'N')
                                ->count();
        $qTotal = DB::table('order_details as orde')
                        ->join('order_master as orma','orma.id','=','orde.order_id')
                        ->select('orde.qty as qty','orde.price as price')
                        ->where('orma.is_deliver','N')
                        ->get();
        $qPendingOrder = DB::table('order_master')
                        ->select('id','name','phone','address','is_deliver','created_at')
                        ->where('is_deliver','N')
                        ->orderBy('id','desc')
                        ->paginate(10);
        return view('admin-dashboard.orders.pending-order', compact('qPendingOrder','qTotal','qPendingOrderCount','qWaitingOrderCount'));
    }
}
