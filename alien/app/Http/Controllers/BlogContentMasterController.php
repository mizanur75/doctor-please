<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
use DB;

class BlogContentMasterController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Request $request)
  {
    if(empty($request->cmbBlogCategory))
    {
      $qBlogCategory=DB::table('blog_category')->pluck('category_name_en', 'id');
      $qItems=DB::table('blog_content_master')->orderBy('id', 'desc')->paginate(10);
    }
    elseif(!empty($request->cmbBlogCategory))
    {
      $qBlogCategory=DB::table('blog_category')->pluck('category_name_en', 'id');
      $qItems=DB::table('blog_content_master')->where('blog_category_id',$request->cmbBlogCategory)->orderBy('id', 'desc')->paginate(10);
    }

    return view('admin-dashboard/blog.blog-list', compact('qItems','qBlogCategory'));
  }


  public function create()
  {
    $qBlogCategory=DB::table('blog_category')->pluck('category_name_en', 'id');
    return view('admin-dashboard/blog.new-blog', compact('qBlogCategory'));
  }


  public function store(Request $request)
  {
    $this->validate($request,[
      'cmbBlogCategory' => 'required',
      'txtAuthorName' => 'required|max:69',
      'txtBlogTitleBN' => 'required|max:55',
      'txtBlogBriefBN' => 'required|max:155',
      'fImageFile' => 'required|mimes:jpg,jpeg,png,gif'
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
    $sBn = strtolower($request->txtBlogTitleBN);
    $sEn = strtolower($request->txtBlogTitleEN);
    $sBnUrl = preg_replace('/\s+/', '-', $sBn);
    $sEnUrl = preg_replace('/\s+/', '-', $sEn);

    DB::table('blog_content_master')->insert([
      'blog_category_id'=>$request->cmbBlogCategory,
      'author_name'=>$request->txtAuthorName,
      'bn_url'=>$sBnUrl,
      'en_url'=>$sEnUrl,
      'blog_title_bn'=>$request->txtBlogTitleBN,
      'blog_title_en'=>$request->txtBlogTitleEN,
      'blog_brief_bn'=>$request->txtBlogBriefBN,
      'blog_brief_en'=>$request->txtBlogBriefEN,
      'blog_details_bn'=>$request->txtBlogDetailsBN,
      'blog_details_en'=>$request->txtBlogBriefEN,
      'blog_big_image'=>$sImageDirectoryBigPath,
      'blog_small_image'=>$sImageDirectorySmallPath,
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

    $iContentID = DB::getPdo()->lastInsertId();
    //Send to request generate html file
    if($sGeneratHtml== 'Y')
    {
      return redirect()->action('GenerateHTMLController@generate', ['iContentID' => $iContentID, 'sCategoryID'=>'blog']);
    }
    elseif($sGeneratHtml== 'N')
    {
      $request->session()->flash('alert-success', 'Blog information is successfully create.');
      return redirect('blog-information');
    }
  }


  public function show($id)
  {
    $qBlogCategory=DB::table('blog_category')->pluck('category_name_en', 'id');
    $qItems=DB::table('blog_content_master')->where('id', $id)->first();
    return view('admin-dashboard/blog.edit-blog', compact('qItems','qBlogCategory'));
  }


  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'cmbBlogCategory' => 'required',
      'txtAuthorName' => 'required|max:69',
      'txtBlogTitleBN' => 'required|max:55',
      'txtBlogBriefBN' => 'required|max:155',
      'fImageFile' => 'mimes:jpg,jpeg,png,gif'
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
      if(!empty($request->validate_agree=='true') && $request->validate_agree=='D')
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
    $sBn = strtolower($request->txtBlogTitleBN);
    $sEn = strtolower($request->txtBlogTitleEN);
    $sBnUrl = preg_replace('/\s+/', '-', $sBn);
    $sEnUrl = preg_replace('/\s+/', '-', $sEn);

    DB::table('blog_content_master')->where('id', $id)->update([
      'blog_category_id'=>$request->cmbBlogCategory,
      'author_name'=>$request->txtAuthorName,
      'bn_url'=>$sBnUrl,
      'en_url'=>$sEnUrl,
      'blog_title_bn'=>$request->txtBlogTitleBN,
      'blog_title_en'=>$request->txtBlogTitleEN,
      'blog_brief_bn'=>$request->txtBlogBriefBN,
      'blog_brief_en'=>$request->txtBlogBriefEN,
      'blog_details_bn'=>$request->txtBlogDetailsBN,
      'blog_details_en'=>$request->txtBlogBriefEN,
      'blog_big_image'=>$sImageDirectoryBigPath,
      'blog_small_image'=>$sImageDirectorySmallPath,
      'show_home'=>$request->rdoShowHome,
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
      return redirect()->action('GenerateHTMLController@generate', ['iContentID' => $iContentID, 'sCategoryID'=>'blog']);
    }
    elseif($sGeneratHtml== 'N')
    {
      $request->session()->flash('alert-success', 'Blog information is successfully updated.');
      return redirect('blog-information');
    }
  }

}
