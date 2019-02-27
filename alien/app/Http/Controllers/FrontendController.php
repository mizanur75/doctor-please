<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
  public function blog($sSlug)
  {
    $iCatID=DB::table('blog_category')->where('bn_url', $sSlug)->select('id')->first();
    $qCategorys=DB::table('blog_category')->select('category_name_bn','bn_url as url')->get();

    if(!empty($iCatID))
    {
      $qPosts=DB::table('blog_content_master')->where('blog_category_id', $iCatID->id)->select('blog_title_bn as title','blog_brief_bn as brief','author_name','blog_small_image','bn_url as url')->orderBy('id', 'desc')->paginate(12);
    }
    else
    {
      $qPosts=DB::table('blog_content_master')->select('blog_title_bn as title','blog_brief_bn as brief','author_name','blog_small_image','bn_url as url')->orderBy('id', 'desc')->paginate(12);
    }

    $qPopularPosts=DB::table('blog_content_master')->select('blog_title_bn as title','author_name','blog_small_image','bn_url as url', DB::raw("(select max('total_view') from blog_content_master)"))->orderBy('id', 'desc')->paginate(3);
    return view('frontend/blog', compact('qCategorys','qPosts','qPopularPosts'));
  }


  public function blogDetails($sSlug)
  {
    $qCategorys=DB::table('blog_category')->select('category_name_bn','bn_url as url')->get();
    $qPosts=DB::table('blog_content_master')->select('blog_title_bn as title','author_name','blog_small_image','bn_url as url')->latest()->paginate(3);
    $qItem=DB::table('blog_content_master')->select('id','total_view','blog_title_bn as title','author_name','blog_details_bn as details','blog_brief_bn as brief','created_at','blog_big_image','bn_url as url')->where('bn_url', $sSlug)->first();
    return view('frontend/blog-single', compact('qItem','qCategorys','qPosts'));
  }

  public function newsDetails($sSlug)
  {
    $qPosts=DB::table('news_events')->select('news_title_bn as title','news_small_image','bn_url as url')->latest()->paginate(6);
    $qItem=DB::table('news_events')->select('id','total_view','news_title_bn as title','news_details_bn as details','created_at','news_big_image','bn_url as url')->where('bn_url', $sSlug)->first();
    return view('frontend/news-events-single', compact('qItem','qPosts'));
  }

  public function news($sSlug)
  {
    $qPosts=DB::table('news_events')->select('news_title_bn as title','news_small_image','bn_url as url')->latest()->paginate(6);
    $qItems=DB::table('news_events')->select('id','total_view','news_title_bn as title','news_brief_bn as brief','created_at','news_small_image','bn_url as url')->where('is_active', 'Y')->latest()->paginate(8);
    return view('frontend/news-events', compact('qItems', 'qPosts'));
  }

  public function medicine_category($id, $sSlug)
  {
    $qItems=DB::table('product_master')
    ->select('id','product_name_bn as productName','product_brief_bn as productBrief','product_small_image','bn_url as url')
    ->where('is_active', 'Y')
    ->where('product_category_id', $id)
    ->orderBy('id', 'desc')->paginate(8);

    $sCatName=$sSlug;

    return view('frontend/medicine-category', compact('qItems', 'sCatName'));
  }


  public function medicineDetails($sSlug)
  {

    $qItems=DB::table('product_master as prma')
    ->join('product_category as prca', 'prca.id', '=', 'prma.product_category_id')
    ->join('product_price as prpr', 'prpr.product_id', '=', 'prma.id')
    ->join('product_measurement as prme', 'prme.id', '=', 'prpr.measurement_id')
    ->select('prca.category_name_bn as category','prme.measurement_name_bn as measurement','prpr.product_price_tk as price','prma.id','prma.product_category_id','prma.product_name_bn as name','prma.product_brief_bn as brief','prma.product_details_bn as details','prpr.product_stock as stock','prma.product_big_image as image','prma.product_category_id as catID','prma.bn_url as url')
    ->where('prma.bn_url', $sSlug)
    ->where('prma.is_active', 'Y')
    ->first();

    $qProducts=DB::table('product_master')->select('product_name_bn as name','product_brief_bn as brief','product_small_image as image','bn_url as url')->where('is_active', 'Y')->inRandomOrder()->paginate(4);

    return view('frontend/medicine-details', compact('qItems','qProducts'));
  }

  public function allmedicine(){
    $qAll_medicine=DB::table('product_master')
    ->select('id','product_name_bn as productName','product_brief_bn as productBrief','product_small_image','bn_url as url')
    ->where('is_active', 'Y')
    ->orderBy('id', 'desc')->paginate(8);

    return view('frontend/all-medicine', compact('qAll_medicine','qProducts'));
  }


  public function doctors()
  {
    $qItems=DB::table('users as u')
    ->join('doctor_profile as dp', 'u.id', '=', 'dp.user_id')
    ->select('u.id','u.name as name','u.image_path', 'dp.degree as degree', 'dp.about as about', 'dp.training as training')->where('u.user_type','7docTor9')->where('u.is_active','Y')->orderBy('u.id', 'desc')->get();

    return view('frontend/doctor', compact('qItems'));
  }


  public function doctorsProfile($id)
  {
    $qItems=DB::table('users as u')
    ->join('doctor_profile as dp', 'u.id', '=', 'dp.user_id')
    ->select('u.id','u.name as name','u.image_path', 'dp.degree as degree', 'dp.about as about', 'dp.training as training')->where('u.id',$id)->where('u.user_type','7docTor9')->where('u.is_active','Y')->orderBy('u.id', 'desc')->first();

    return view('frontend/doctor-profile', compact('qItems'));
  }
}
