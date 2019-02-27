<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class ProductPriceController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    if(empty($request->cmbProductCategory))
    {
      $qProductCategory=DB::table('product_category')->pluck('category_name_en', 'id');
      $qProductMeasurement=DB::table('product_measurement')->pluck('measurement_name_en', 'id');
      $qItems=DB::table('product_price as prpr')
      ->join('product_master as prma', 'prma.id','=','prpr.product_id')
      ->join('product_measurement as prme', 'prme.id','=','prpr.measurement_id')
      ->select('prpr.*','prma.product_name_en','prme.measurement_name_en','prpr.product_stock')
      ->orderBy('id', 'desc')->paginate(10);
    }
    elseif(!empty($request->cmbProductCategory))
    {
      $qProductCategory=DB::table('product_category')->pluck('category_name_en', 'id');
      $qProductMeasurement=DB::table('product_measurement')->pluck('measurement_name_en', 'id');
      $qItems=DB::table('product_price')->where('product_category_id',$request->cmbProductCategory)->orderBy('id', 'desc')->paginate(10);
    }

    $qProduct=DB::table('product_master')->pluck('product_name_en', 'id');
    return view('admin-dashboard/product.product-price', compact('qItems','qProductCategory','qProductMeasurement','qProduct'));
  }



  public function store(Request $request)
  {
    $this->validate($request,[
      'cmbProductCategory' => 'required',
      'cmbProductInfo' => 'required',
      'cmbProductMeasurement' => 'required',
      'txtProductPriceBDT' => 'required',
    ]);

    $sCategoryID='product';

    DB::table('product_price')->insert([
      'product_category_id'=>$request->cmbProductCategory,
      'product_id'=>$request->cmbProductInfo,
      'measurement_id'=>$request->cmbProductMeasurement,
      'product_price_tk'=>$request->txtProductPriceBDT,
      'product_price_usd'=>$request->txtProductPriceUSD,
      'product_stock'=>$request->txtProductStock,
      'show_home'=>$request->rdoShowHome,
      'is_active'=>$request->rdoIsActive,
      'create_user_id'=>Auth::user()->id,
      'update_user_id'=>Auth::user()->id,
      'create_user_ip'=>$request->ip(),
      'update_user_ip'=>$request->ip(),
      'remember_token' => $request->_token,
      'created_at' =>  date('Y-m-d H:i:s'),
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-success', 'Product price information is successfully create.');
    return redirect('product-price');
  }



  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'cmbProductCategory' => 'required',
      'cmbProductInfo' => 'required',
      'cmbProductMeasurement' => 'required',
      'txtProductPriceBDT' => 'required',
    ]);

    $sGeneratHtml=$request->rdoGenerateHTML;
    $sCategoryID='product';

    DB::table('product_price')->where('id', $id)->update([
      'product_category_id'=>$request->cmbProductCategory,
      'product_id'=>$request->cmbProductInfo,
      'measurement_id'=>$request->cmbProductMeasurement,
      'product_price_tk'=>$request->txtProductPriceBDT,
      'product_price_usd'=>$request->txtProductPriceUSD,
      'product_stock'=>$request->txtProductStock,
      'show_home'=>$request->rdoShowHome,
      'is_active'=>$request->rdoIsActive,
      'create_user_id'=>Auth::user()->id,
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'remember_token' => $request->_token,
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-success', 'Product price information is successfully updated.');
    return redirect('product-price');
  }


  public function selectProduct(Request $request)
  {
    if($request->ajax()){
      $qItem=DB::table('product_master')->where('product_category_id', $request->cmbProductCategory)->where('is_active', 'Y')->orderBy('id', 'desc')->pluck('product_name_en', 'id')->all();
      $data = view('admin-dashboard.ajax-select',compact('qItem'))->render();
      return response()->json(['options'=>$data]);
    }
  }

  public function selectMeasurment(Request $request)
  {
    if($request->ajax()){
      $qItem=DB::table('product_price as prpr')
              ->join('product_measurement as prme', 'prme.id','=','prpr.measurement_id')
              ->where('prpr.product_id', $request->cmbProductId)
              ->pluck('prme.measurement_name_en as name', 'prme.id')
              ->all();
      // var_dump($qItem);
      $data = view('orders.ajax-select',compact('qItem'))->render();
      return response()->json(['options'=>$data]);
    }
  }

  public function selectPrice(Request $request)
  {
    $data = DB::table('product_price')
              ->select('product_price_tk as price')
              ->where('product_id', $request->cmbProduct)
              ->where('measurement_id', $request->cmbMeasurement)
              ->first();
    return response()->json($data);

  }
}
