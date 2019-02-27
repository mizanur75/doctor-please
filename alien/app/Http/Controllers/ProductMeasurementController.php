<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
use DB;

class ProductMeasurementController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $qItems=DB::table('product_measurement')->paginate(10);
    return view('admin-dashboard/product.product-measurement', compact('qItems'));
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'txtMeasurementNameEN' => 'required|max:29',
    ]);

    DB::table('product_measurement')->insert([
      'measurement_name_en'=>$request->txtMeasurementNameEN,
      'measurement_name_bn'=>$request->txtMeasurementNameBN,
      'create_user_id'=>Auth::user()->id,
      'update_user_id'=>Auth::user()->id,
      'create_user_ip'=>$request->ip(),
      'update_user_ip'=>$request->ip(),
      'is_active'=>$request->rdoIsActive,
      'remember_token' => $request->_token,
      'created_at' =>  date('Y-m-d H:i:s'),
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-success', 'Product category information is successfully create.');
    return redirect('product-measurement');
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'txtMeasurementNameEN' => 'required|max:29',
    ]);

    DB::table('product_measurement')->where('id', $id)->update([
      'measurement_name_en'=>$request->txtMeasurementNameEN,
      'measurement_name_bn'=>$request->txtMeasurementNameBN,
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'is_active'=>$request->rdoIsActive,
      'remember_token' => $request->_token,
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-success', 'Product category information is successfully create.');
    return redirect('product-measurement');
  }

}
