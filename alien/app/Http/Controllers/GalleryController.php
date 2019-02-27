<?php

namespace App\Http\Controllers;
use App\User;
use Image;
use Auth;
use DB;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    $qGalleryCategory=DB::table('gallery_category')->pluck('category_name_en', 'id');
    if(empty($request->cmbGalleryCategory))
    {
      $qItems=DB::table('gallery_image')->paginate(15);
    }
    elseif(!empty($request->cmbGalleryCategory))
    {
      $qItems=DB::table('gallery_image')->where('category_id',$request->cmbGalleryCategory)->paginate(15);
    }
    return view('admin-dashboard/media.gallery-image', compact('qItems','qGalleryCategory'));
  }


  public function store(Request $request)
  {
    $this->validate($request,[
      'cmbGalleryCategory' => 'required',
      'fImageFile' => 'required|mimes:jpg,jpeg,png,gif'
    ]);

    $sImageDirectoryPath="";

    if(!empty($request->file('fImageFile')))
    {
      $sDirectory=date('Y');
      $fImage = $request->file('fImageFile');
      $sImageName = time().'.'.$fImage->getClientOriginalName();
      $sDirectoryPath='images/'.$sDirectory.'/gallery';
      $sImageDirectoryPath=$sDirectoryPath.'/'.$sImageName;
      $sImageThumb = Image::make($fImage->getRealPath())->resize(740, 650);
      $sImageThumb->save($sDirectoryPath.'/'.$sImageName,80);

      DB::table('gallery_image')->insert([
        'category_id'=>$request->cmbGalleryCategory,
        'image_title'=>$request->txtImageTitle,
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

      $request->session()->flash('alert-success', 'Gallery image is successfully create.');
    }

    return redirect('gallery-image');
  }


  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'cmbGalleryCategory' => 'required',
      'fImageFile' => 'mimes:jpg,jpeg,png,gif'
    ]);

    $sImageDirectoryPath=$request->oldImage;
    $sValidate=$request->validate_agree;

    if(!empty($request->hasFile('fImageFile')) && $sValidate=='D')
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
      $sImageThumb = Image::make($fImage->getRealPath())->resize(740, 650);
      $sImageThumb->save($sDirectoryPath.'/'.$sImageName,80);
    }

    DB::table('gallery_image')->where('id', $id)->update([
      'category_id'=>$request->cmbGalleryCategory,
      'image_title'=>$request->txtImageTitle,
      'image_path'=>$sImageDirectoryPath,
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'is_active'=>$request->rdoIsActive,
      'remember_token' => $request->_token,
      'created_at' =>  date('Y-m-d H:i:s'),
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $request->session()->flash('alert-success', 'Gallery image is successfully update.');

    return redirect('gallery-image');
  }

}
