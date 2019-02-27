<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class ProductCategoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $qItems=DB::table('product_category')->paginate(10);
    return view('admin-dashboard/product.product-category', compact('qItems'));
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'txtCategoryNameEN' => 'required|max:69',
    ]);

    DB::table('product_category')->insert([
      'category_name_en'=>$request->txtCategoryNameEN,
      'category_name_bn'=>$request->txtCategoryNameBN,
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
    return redirect('product-category');
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'txtCategoryNameEN' => 'required|max:69',
    ]);

    DB::table('product_category')->where('id', $id)->update([
      'category_name_en'=>$request->txtCategoryNameEN,
      'category_name_bn'=>$request->txtCategoryNameBN,
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'is_active'=>$request->rdoIsActive,
      'remember_token' => $request->_token,
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-success', 'Product category information is successfully updated.');
    return redirect('product-category');
  }

}
