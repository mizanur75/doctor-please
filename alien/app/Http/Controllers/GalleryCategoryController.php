<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
use DB;

class GalleryCategoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $qItems=DB::table('gallery_category')->paginate(10);
    return view('admin-dashboard/media.gallery-category', compact('qItems'));
  }


  public function store(Request $request)
  {
    $this->validate($request,[
      'txtCategoryNameEN' => 'required|max:69',
    ]);

    $sImageDirectoryPath="";

    if(!empty($request->file('fImageFile')))
    {
      $sDirectory=date('Y');
      $fImage = $request->file('fImageFile');
      $sImageName = time().'.'.$fImage->getClientOriginalName();
      $sDirectoryPath='images/'.$sDirectory.'/gallery';
      $sImageDirectoryPath=$sDirectoryPath.'/'.$sImageName;
      $sImageThumb = Image::make($fImage->getRealPath())->resize(350, 250);
      $sImageThumb->save($sDirectoryPath.'/'.$sImageName,80);
    }

    DB::table('gallery_category')->insert([
      'category_name_en'=>$request->txtCategoryNameEN,
      'category_name_bn'=>$request->txtCategoryNameBN,
      'image_path'=>$sImageDirectoryPath,
      'create_user_id'=>Auth::user()->id,
      'update_user_id'=>Auth::user()->id,
      'create_user_ip'=>$request->ip(),
      'update_user_ip'=>$request->ip(),
      'is_active'=>$request->rdoIsActive,
      'remember_token' => $request->_token,
      'created_at' =>  date('Y-m-d H:i:s'),
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-success', 'Gallery category information is successfully create.');
    return redirect('gallery-category');
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'txtCategoryNameEN' => 'required|max:69',
    ]);

    $sImageDirectoryPath=$request->oldImage;

    if(!empty($request->file('fImageFile')))
    {
      $sImageDirectoryPath="";

      if(!empty($request->oldImage))
      {
        unlink($request->oldImage);
      }
      $sDirectory=date('Y');
      $fImage = $request->file('fImageFile');
      $sImageName = time().'.'.$fImage->getClientOriginalName();
      $sDirectoryPath='images/'.$sDirectory.'/gallery';
      $sImageDirectoryPath=$sDirectoryPath.'/'.$sImageName;
      $sImageThumb = Image::make($fImage->getRealPath())->resize(350, 250);
      $sImageThumb->save($sDirectoryPath.'/'.$sImageName,80);
    }

    DB::table('gallery_category')->where('id', $id)->update([
      'category_name_en'=>$request->txtCategoryNameEN,
      'category_name_bn'=>$request->txtCategoryNameBN,
      'image_path'=>$sImageDirectoryPath,
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'is_active'=>$request->rdoIsActive,
      'remember_token' => $request->_token,
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-success', 'Gallery category information is successfully updated.');
    return redirect('gallery-category');
  }

}
