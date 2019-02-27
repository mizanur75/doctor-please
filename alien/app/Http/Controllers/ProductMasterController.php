<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Auth;
use DB;

class ProductMasterController extends Controller
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
      $qItems=DB::table('product_master')->orderBy('id', 'desc')->paginate(10);
    }
    elseif(!empty($request->cmbProductCategory))
    {
      $qProductCategory=DB::table('product_category')->pluck('category_name_en', 'id');
      $qItems=DB::table('product_master')->where('product_category_id',$request->cmbProductCategory)->orderBy('id', 'desc')->paginate(10);
    }

    return view('admin-dashboard/product.product-list', compact('qItems','qProductCategory'));
  }


  public function create()
  {
    $qProductCategory=DB::table('product_category')->pluck('category_name_en', 'id');
    return view('admin-dashboard/product.new-products', compact('qProductCategory'));
  }


  public function store(Request $request)
  {
    $this->validate($request,[
      'cmbProductCategory' => 'required',
      'txtProductNameBN' => 'required|max:55',
      'txtProductBriefBN' => 'required|max:155',
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
      $sImageName = time().'.'.$fImage->getClientOriginalName();
      //Big Image
      $sDirectoryBigPath='images/'.$sDirectory.'/big-product';
      $sImageDirectoryBigPath=$sDirectoryBigPath.'/'.$sImageName;
      $sImageBigThumb = Image::make($fImage->getRealPath())->resize($iBigImgWidth, $iBigImgHeight);
      $sImageBigThumb->save($sDirectoryBigPath.'/'.$sImageName,80);
      //Small Image
      $sDirectorySmallPath='images/'.$sDirectory.'/small-product';
      $sImageDirectorySmallPath=$sDirectorySmallPath.'/'.$sImageName;
      $sImageSmallThumb = Image::make($fImage->getRealPath())->resize($iSmallImgWidth, $iSmallImgHeight);
      $sImageSmallThumb->save($sDirectorySmallPath.'/'.$sImageName,80);
    }

    //Create SLUG Url
    $sBn = strtolower($request->txtProductNameBN);
    $sEn = strtolower($request->txtProductNameEN);
    $sBnUrl = preg_replace('/\s+/', '-', $sBn);
    $sEnUrl = preg_replace('/\s+/', '-', $sEn);

    DB::table('product_master')->insert([
      'product_category_id'=>$request->cmbProductCategory,
      'product_name_bn'=>$request->txtProductNameBN,
      'product_name_en'=>$request->txtProductNameEN,
      'product_brief_bn'=>$request->txtProductBriefBN,
      'product_brief_en'=>$request->txtProductBriefEN,
      'product_details_bn'=>$request->txtProductDetailsBN,
      'product_details_en'=>$request->txtProductBriefEN,
      'product_big_image'=>$sImageDirectoryBigPath,
      'product_small_image'=>$sImageDirectorySmallPath,
      'create_user_id'=>Auth::user()->id,
      'update_user_id'=>Auth::user()->id,
      'create_user_ip'=>$request->ip(),
      'update_user_ip'=>$request->ip(),
      'is_active'=>$request->rdoIsActive,
      'show_home'=>$request->rdoShowHome,
      'bn_url'=>$sBnUrl,
      'en_url'=>$sEnUrl,
      'remember_token' => $request->_token,
      'created_at' =>  date('Y-m-d H:i:s'),
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $iContentID = DB::getPdo()->lastInsertId();
    //Send to request generate html file
    if($sGeneratHtml== 'Y')
    {
      return redirect()->action('GenerateHTMLController@generate', ['iContentID' => $iContentID, 'sCategoryID'=>'product']);
    }
    elseif($sGeneratHtml== 'N')
    {
      $request->session()->flash('alert-success', 'Product information is successfully create.');
      return redirect('product-information');
    }

  }


  public function show($id)
  {
    $qProductCategory=DB::table('product_category')->pluck('category_name_en', 'id');
    $qItems=DB::table('product_master')->where('id', $id)->first();
    return view('admin-dashboard/product.edit-product', compact('qItems','qProductCategory'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'cmbProductCategory' => 'required',
      'txtProductNameBN' => 'required|max:55',
      'txtProductBriefBN' => 'required|max:155',
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
      $sDirectoryBigPath='images/'.$sDirectory.'/big-product';
      $sImageDirectoryBigPath=$sDirectoryBigPath.'/'.$sImageName;
      $sImageBigThumb = Image::make($fImage->getRealPath())->resize($iBigImgWidth, $iBigImgHeight);
      $sImageBigThumb->save($sDirectoryBigPath.'/'.$sImageName,80);
      //Small Image
      $sDirectorySmallPath='images/'.$sDirectory.'/small-product';
      $sImageDirectorySmallPath=$sDirectorySmallPath.'/'.$sImageName;
      $sImageSmallThumb = Image::make($fImage->getRealPath())->resize($iSmallImgWidth, $iSmallImgHeight);
      $sImageSmallThumb->save($sDirectorySmallPath.'/'.$sImageName,80);
    }

    //Create SLUG Url
    $sBn = strtolower($request->txtProductNameBN);
    $sEn = strtolower($request->txtProductNameEN);
    $sBnUrl = preg_replace('/\s+/', '-', $sBn);
    $sEnUrl = preg_replace('/\s+/', '-', $sEn);

    DB::table('product_master')->where('id', $id)->update([
      'product_category_id'=>$request->cmbProductCategory,
      'product_name_bn'=>$request->txtProductNameBN,
      'product_name_en'=>$request->txtProductNameEN,
      'product_brief_bn'=>$request->txtProductBriefBN,
      'product_brief_en'=>$request->txtProductBriefEN,
      'product_details_bn'=>$request->txtProductDetailsBN,
      'product_details_en'=>$request->txtProductBriefEN,
      'product_big_image'=>$sImageDirectoryBigPath,
      'product_small_image'=>$sImageDirectorySmallPath,
      'update_user_id'=>Auth::user()->id,
      'update_user_ip'=>$request->ip(),
      'is_active'=>$request->rdoIsActive,
      'show_home'=>$request->rdoShowHome,
      'bn_url'=>$sBnUrl,
      'en_url'=>$sEnUrl,
      'remember_token' => $request->_token,
      'updated_at' =>  date('Y-m-d H:i:s')
    ]);

    $iContentID = $id;

    //Send to request generate html file
    if($sGeneratHtml== 'Y')
    {
      return redirect()->action('GenerateHTMLController@generate', ['iContentID' => $iContentID, 'sCategoryID'=>'product']);
    }
    elseif($sGeneratHtml== 'N')
    {
      $request->session()->flash('alert-success', 'Product information is successfully updated.');
      return redirect('product-information');
    }

  }

}
