<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;

class GenerateHTMLController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function generate($iContentID, $sCategoryID)
  {
    //Localhost
    //$sFileDir='/xampp/htdocs/hello-doctor.com.bd/xhtml/';
    //Live
    $sFileDir='/home/doctor/public_html/xhtml/';
    
    if($sCategoryID=='blog')
    {
      $myFile = $sFileDir."blog.htm";
      $fh = fopen($myFile, "w");
      $sData = "";

      $qItem=DB::table('blog_content_master')->select('blog_title_bn as title','blog_brief_bn as brief','author_name','blog_small_image','bn_url as url','created_at')->where('show_home','Y')->where('is_active','Y')->orderBy('id', 'desc')->limit(3)->get();

      foreach($qItem as $sItem)
      {
        $sData .= '<div class="column blog-details-news-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
          <article class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
              <figure class="image-box">
                <a href="'.url('blog-details/'.$sItem->url).'"><img src="'.$sItem->blog_small_image.'" alt="'.$sItem->title.'" title="'.$sItem->title.'"></a>
                  <div class="news-date">'.date('d', strtotime($sItem->created_at)).'<span class="month" style="margin-left:7px;">'.date('M', strtotime($sItem->created_at)).'</span>
                  </div>
              </figure>
              <div class="content-box">
                <h3><a href="'.url('blog-details/'.$sItem->url).'">'.$sItem->title.'</a></h3>
                <div class="post-info clearfix">
                    <div class="post-author"><strong>Posted by '.$sItem->author_name.'</strong></div>
                  </div>
                  <div class="text">'.$sItem->brief.'</div>
                  <a href="'.url('blog-details/'."$sItem->url").'" class="theme-btn read-more">বিস্তারিত পড়ুন</a>
              </div>
            </article>
        </div>';
      }

      fwrite($fh, $sData);fclose($fh);
      return redirect('blog-information');
    }

    if($sCategoryID=='testimonial')
    {
      $myFile = $sFileDir."testmonials.htm";
      $fh = fopen($myFile, "w");
      $sData = "";

      $qItem=DB::table('testimonials_info')->select('testimonials_title_bn as title','designation','testimonials_brief_bn as brief','testimonials_small_image','bn_url as url')->where('show_home','Y')->where('is_active','Y')->orderBy('id', 'desc')->limit(6)->get();

      foreach($qItem as $sItem)
      {
        $sData.='<article class="slide-item">

            <div class="info-box">
              <figure class="image-box"><img src="'.$sItem->testimonials_small_image.'" alt=""></figure>
              <h3>'.$sItem->title.'</h3>
              <p style="color:green; font-size: 12px;">'.$sItem->designation.'</p>
            </div>

            <div class="slide-text">
                '.$sItem->brief.'
            </div>
        </article>';
      }


      fwrite($fh, $sData);fclose($fh);
      return redirect('testimonials');
    }


    if($sCategoryID=='news')
    {
      $myFile = $sFileDir."featured-news.htm";
      $fh = fopen($myFile, "w");
      $sData = "";

      $qItem=DB::table('news_events')->select('news_title_bn as title','news_brief_bn as brief','news_small_image','bn_url as url')->where('show_home','Y')->where('is_active','Y')->orderBy('id', 'desc')->limit(2)->get();

      foreach($qItem as $sItem)
      {
        $sData.='<div class="column default-featured-column style-two col-lg-4 col-md-6 col-sm-6 col-xs-12">
          <article class="inner-box">
            <figure class="image-box">
                  <a href="news-details/'.$sItem->url.'"><img src="'.$sItem->news_small_image.'" alt="'.$sItem->title.'" title="'.$sItem->title.'"></a>
                    <div class="post-tag">Featured</div>
                </figure>
                <div class="content-box">
                  <h3><a href="news-details/'.$sItem->url.'">'.$sItem->title.'</a></h3>
                    <div class="text">'.$sItem->brief.'</div>
                    <a href="news-details/'.$sItem->url.'" class="theme-btn btn-style-three">বিস্তারিত পড়ুন</a>
                </div>
            </article>
        </div>';
      }

      fwrite($fh, $sData);fclose($fh);

      //Side 4 News
      $myFile = $sFileDir."side-news.htm";
      $fh = fopen($myFile, "w");
      $sData = "";

      $qItems=DB::table('news_events')->select('news_title_bn as title','news_brief_bn as brief','news_small_image','bn_url as url')->where('show_home','Y')->where('is_active','Y')->orderBy('id', 'desc')->limit(5)->get();

      $i=1;
      foreach($qItems as $sItem)
      {
        if($i>2)
        {
          $sData.='<div class="link-block">
                    <div class="default inner"><figure class="image-thumb"><img src="'.$sItem->news_small_image.'" alt="'.$sItem->title.'" title="'.$sItem->title.'" class="news-img-h nws-img-w"></figure><strong>'.$sItem->title.'</strong><span class="desc">'.$sItem->brief.'</span></div>
                      <a href="news-details/'.$sItem->url.'" class="alternate"><strong>'.$sItem->title.'</strong><span class="desc">'.$sItem->brief.'</span></a>
                  </div>';
        }
        $i++;
      }

      fwrite($fh, $sData);fclose($fh);


      return redirect('news-events');
    }


    if($sCategoryID=='product')
    {
      $myFile = $sFileDir."medicine.htm";
      $fh = fopen($myFile, "w");
      $sData = "";

      $qItem=DB::table('product_master')->select('product_name_bn as name','product_brief_bn as brief','product_small_image as image','bn_url as url')->where('show_home','Y')->where('is_active','Y')->orderBy('id', 'desc')->limit(4)->get();

      foreach($qItem as $sItem)
      {
        $sData.='<div class="column default-featured-column col-md-3 col-sm-6 col-xs-12">
          <article class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
            <figure class="image-box">
                  <a href="'.url("medicine-details/".$sItem->url).'"><img src="'.asset($sItem->image).'" alt="'.$sItem->name.'" title="'.$sItem->name.'"></a>
                </figure>
                <div class="content-box">
                  <h3><a href="'.url("medicine-details/".$sItem->url).'">'.$sItem->name.'</a></h3>
                    <div class="text">'.$sItem->brief.'</div>
                    <a href="'.url("medicine-details/".$sItem->url).'" class="theme-btn btn-style-three">বিস্তারিত দেখুন</a>
                </div>
            </article>
        </div>';
      }


      fwrite($fh, $sData);fclose($fh);
      return redirect('product-information');
    }


    if($sCategoryID=='doctor')
    {
      $myFile = $sFileDir."doctor.htm";
      $fh = fopen($myFile, "w");
      $sData = "";

      $qItem=DB::table('users')->select('id','name','image_path')->where('user_type','7docTor9')->where('is_active','Y')->orderBy('id', 'desc')->limit(4)->get();

      foreach($qItem as $sItem)
      {
        $sData.='<div class="col-xs-12 col-sm-6" style="margin-bottom:10px;">
                  <a href="'.url("doctors-profile/".$sItem->id).'">
                  <div class="icon"><img src="'.asset($sItem->image_path).'" class="img img-responsive" title="'.$sItem->name.'" alt="'.$sItem->name.'" /></div>
                  </a>
                </div>';
      }


      fwrite($fh, $sData);fclose($fh);
      return redirect('user-information');
    }


  }


}
