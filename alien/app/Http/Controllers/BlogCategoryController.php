<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class BlogCategoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $qItems=DB::table('blog_category')->paginate(15);
    return view('admin-dashboard/blog.blog-category', compact('qItems'));
  }

  public function store(Request $request)
  {
    $this->validate($request,[
      'txtCategoryNameEN' => 'required|max:69',
    ]);

    //Create SLUG Url
    $sBn = strtolower($request->txtCategoryNameBN);
    $sEn = strtolower($request->txtCategoryNameEN);
    $sBnUrl = preg_replace('/\s+/', '-', $sBn);
    $sEnUrl = preg_replace('/\s+/', '-', $sEn);

    DB::table('blog_category')->insert([
      'category_name_en'=>$request->txtCategoryNameEN,
      'category_name_bn'=>$request->txtCategoryNameBN,
      'bn_url'=>$sBnUrl,
      'en_url'=>$sEnUrl,
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
    return redirect('blog-category');
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'txtCategoryNameEN' => 'required|max:69',
    ]);

    //Create SLUG Url
    $sBn = strtolower($request->txtCategoryNameBN);
    $sEn = strtolower($request->txtCategoryNameEN);
    $sBnUrl = preg_replace('/\s+/', '-', $sBn);
    $sEnUrl = preg_replace('/\s+/', '-', $sEn);

    DB::table('blog_category')->where('id', $id)->update([
      'category_name_en'=>$request->txtCategoryNameEN,
      'category_name_bn'=>$request->txtCategoryNameBN,
      'bn_url'=>$sBnUrl,
      'en_url'=>$sEnUrl,
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'is_active'=>$request->rdoIsActive,
      'remember_token' => $request->_token,
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-success', 'Product category information is successfully updated.');
    return redirect('blog-category');
  }

}
