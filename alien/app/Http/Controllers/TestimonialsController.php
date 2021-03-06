<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
use DB;

class TestimonialsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $qItems=DB::table('testimonials_info')->orderBy('id', 'desc')->paginate(10);
    return view('admin-dashboard/media.testimonials-list', compact('qItems'));
  }


  public function create()
  {
    return view('admin-dashboard/media.new-testimonials');
  }


  public function store(Request $request)
  {
    $this->validate($request,[
      'txtTestimonialsTitleBN' => 'required|max:55',
      'txtTestimonialsBriefBN' => 'required|max:155',
      'fImageFile' => 'mimes:jpg,jpeg,png,gif',
    ]);

    $sGeneratHtml=$request->rdoGenerateHTML;
    $sImageDirectoryBigPath="";
    $sImageDirectorySmallPath="";
    $iBigImgWidth=$request->txtBigImgWidth;
    $iBigImgHeight=$request->txtBigImgHeight;
    $iSmallImgWidth=$request->txtSmallImgWidth;
    $iSmallImgHeight=$request->txtSmallImgHeight;
    $sDirectory=date('Y');

    if(!empty($request->file('fImageFile')))
    {
      $fImage = $request->file('fImageFile');
      $sImageName = time().'-'.$fImage->getClientOriginalName();
      //Big Image
      $sDirectoryBigPath='images/'.$sDirectory.'/big-blog';
      $sImageDirectoryBigPath=$sDirectoryBigPath.'/'.$sImageName;
      $sImageBigThumb = Image::make($fImage->getRealPath())->resize($iBigImgWidth, $iBigImgHeight);
      $sImageBigThumb->save($sDirectoryBigPath.'/'.$sImageName,80);
      //Small Image
      $sDirectorySmallPath='images/'.$sDirectory.'/small-blog';
      $sImageDirectorySmallPath=$sDirectorySmallPath.'/'.$sImageName;
      $sImageSmallThumb = Image::make($fImage->getRealPath())->resize($iSmallImgWidth, $iSmallImgHeight);
      $sImageSmallThumb->save($sDirectorySmallPath.'/'.$sImageName,80);
    }

    //Create SLUG Url
    $sBn = strtolower($request->txtTestimonialsTitleBN);
    $sEn = strtolower($request->txtTestimonialsTitleEN);
    $sBnUrl = preg_replace('/\s+/', '-', $sBn);
    $sEnUrl = preg_replace('/\s+/', '-', $sEn);

    DB::table('testimonials_info')->insert([
      'testimonials_title_bn'=>$request->txtTestimonialsTitleBN,
      'designation'=>$request->txtDesignation,
      'testimonials_title_en'=>$request->txtTestimonialsTitleEN,
      'testimonials_brief_bn'=>$request->txtTestimonialsBriefBN,
      'testimonials_brief_en'=>$request->txtTestimonialsBriefEN,
      'testimonials_details_bn'=>$request->txtTestimonialsDetailsBN,
      'testimonials_details_en'=>$request->txtTestimonialsBriefEN,
      'testimonials_big_image'=>$sImageDirectoryBigPath,
      'testimonials_small_image'=>$sImageDirectorySmallPath,
      'show_home'=>$request->rdoShowHome,
      'bn_url'=>$sBnUrl,
      'en_url'=>$sEnUrl,
      'is_active'=>$request->rdoIsActive,
      'create_user_id'=>Auth::user()->id,
      'update_user_id'=>Auth::user()->id,
      'create_user_ip'=>$request->ip(),
      'update_user_ip'=>$request->ip(),
      'remember_token' => $request->_token,
      'created_at' =>  date('Y-m-d H:i:s'),
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $iContentID = DB::getPdo()->lastInsertId();
    //Send to request generate html file
    if($sGeneratHtml== 'Y')
    {
      return redirect()->action('GenerateHTMLController@generate', ['iContentID' => $iContentID, 'sCategoryID'=>'testimonial']);
    }
    elseif($sGeneratHtml== 'N')
    {
      $request->session()->flash('alert-success', 'Testimonials information is successfully create.');
      return redirect('testimonials');
    }

  }


  public function show($id)
  {
    $qItems=DB::table('testimonials_info')->where('id', $id)->first();
    return view('admin-dashboard/media.edit-testimonials', compact('qItems'));
  }


  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'txtTestimonialsTitleBN' => 'required|max:55',
      'txtTestimonialsBriefBN' => 'required|max:155',
      'fImageFile' => 'mimes:jpg,jpeg,png,gif',
    ]);

    $sGeneratHtml=$request->rdoGenerateHTML;
    $sImageDirectoryBigPath=$request->fBigImage;
    $sImageDirectorySmallPath=$request->fSmallImage;
    $iBigImgWidth=$request->txtBigImgWidth;
    $iBigImgHeight=$request->txtBigImgHeight;
    $iSmallImgWidth=$request->txtSmallImgWidth;
    $iSmallImgHeight=$request->txtSmallImgHeight;
    $sDirectory=date('Y');

    if(!empty($request->file('fImageFile')))
    {
      $sImageDirectoryBigPath="";
      $sImageDirectorySmallPath="";
      //Delete Image File
      if(!empty($request->validate_agree) && $request->validate_agree=='D')
      {
        unlink($request->fBigImage);
        unlink($request->fSmallImage);
      }

      $fImage = $request->file('fImageFile');
      $sImageName = time().'.'.$fImage->getClientOriginalName();
      //Big Image
      $sDirectoryBigPath='images/'.$sDirectory.'/big-blog';
      $sImageDirectoryBigPath=$sDirectoryBigPath.'/'.$sImageName;
      $sImageBigThumb = Image::make($fImage->getRealPath())->resize($iBigImgWidth, $iBigImgHeight);
      $sImageBigThumb->save($sDirectoryBigPath.'/'.$sImageName,80);
      //Small Image
      $sDirectorySmallPath='images/'.$sDirectory.'/small-blog';
      $sImageDirectorySmallPath=$sDirectorySmallPath.'/'.$sImageName;
      $sImageSmallThumb = Image::make($fImage->getRealPath())->resize($iSmallImgWidth, $iSmallImgHeight);
      $sImageSmallThumb->save($sDirectorySmallPath.'/'.$sImageName,80);
    }

    //Create SLUG Url
    $sBn = strtolower($request->txtTestimonialsTitleBN);
    $sEn = strtolower($request->txtTestimonialsTitleEN);
    $sBnUrl = preg_replace('/\s+/', '-', $sBn);
    $sEnUrl = preg_replace('/\s+/', '-', $sEn);

    DB::table('testimonials_info')->where('id',$id)->update([
      'testimonials_title_bn'=>$request->txtTestimonialsTitleBN,
      'designation'=>$request->txtDesignation,
      'testimonials_title_en'=>$request->txtTestimonialsTitleEN,
      'testimonials_brief_bn'=>$request->txtTestimonialsBriefBN,
      'testimonials_brief_en'=>$request->txtTestimonialsBriefEN,
      'testimonials_details_bn'=>$request->txtTestimonialsDetailsBN,
      'testimonials_details_en'=>$request->txtTestimonialsBriefEN,
      'testimonials_big_image'=>$sImageDirectoryBigPath,
      'testimonials_small_image'=>$sImageDirectorySmallPath,
      'show_home'=>$request->rdoShowHome,
      'bn_url'=>$sBnUrl,
      'en_url'=>$sEnUrl,
      'is_active'=>$request->rdoIsActive,
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'remember_token' => $request->_token,
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $iContentID = $id;
    //Send to request generate html file
    if($sGeneratHtml== 'Y')
    {
      return redirect()->action('GenerateHTMLController@generate', ['iContentID' => $iContentID, 'sCategoryID'=>'testimonial']);
    }
    elseif($sGeneratHtml== 'N')
    {
      $request->session()->flash('alert-success', 'Testimonials information is successfully create.');
      return redirect('testimonials');
    }

  }

}
