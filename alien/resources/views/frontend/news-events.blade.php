
@extends('layouts.front.app')

@section('title', 'News | Doctor Please')


@section('front')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{url('images/background/page-title-bg.jpg')}});">
    	<div class="auto-container">
        	<div class="sec-title">
                <h1>Our <span class="normal-font">Events</span></h1>
                <div class="bread-crumb"><a href="">Home</a> / <a href="#" class="current">Events</a></div>
            </div>
        </div>
    </section>


    <!--Projects Section-->
    <section class="projects-section">
    	<div class="row auto-container">
            <div class=" col-lg-9 col-md-9 col-xs-12 col-sm-12">
                 <?php $i = 0;?>
                <div class="row clearfix">
                   @foreach($qItems as $sItem)
                     <div class="column default-featured-column col-md-3 col-sm-6 col-xs-12">
                        <article class="inner-box">
                            <figure class="image-box">
                                <a href="{{url('news-details/'.$sItem->url)}}"><img src="{{url($sItem->news_small_image)}}" alt="{{$sItem->title}}" title="{{$sItem->title}}"></a>
                             </figure>
                             <div class="content-box">
                                <h3><a href="{{url('news-details/'.$sItem->url)}}">{{$sItem->title}} </a></h3>
                                 <div class="text"><div class="text">{{strip_tags($sItem->brief)}}</div></div>
                                 <a href="{{url('news-details/'.$sItem->url)}}" class="theme-btn btn-style-three">বিস্তারিত পড়ুন</a>
                             </div>
                         </article>
                     </div>
                     
                   <?php $i++;?>
                   @if($i % 4 == 0)
                 </div>
                 <div class="row clearfix">
                   @endif

                   @endforeach
                 </div>

                 <!-- Styled Pagination -->
                 @if(!empty($qItems))
                   {{ $qItems->links() }}
                 @endif

           </div>
           <!--Sidebar-->
           <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
               <aside class="sidebar">

                   <!-- Search Form -->
                   <!-- <div class="widget search-box">

                       <form method="post" action="http://world5.commonsupport.com/html/greenture-new/index.html">
                           <div class="form-group">
                               <input type="search" name="search-field" value="" placeholder="Enter keyword">
                               <button type="submit"><span class="icon flaticon-tool-5"></span></button>
                           </div>
                       </form>
                   </div> -->
                   <!-- Recent Posts -->
                   <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                       <div class="sidebar-title"><h3>জনপ্রিয় সংবাদ</h3></div>
                       @foreach($qPosts as $qPost)
                       <article class="post">
                           <figure class="post-thumb"><img src="{{url($qPost->news_small_image)}}" alt="{{$qPost->title}}" title="{{$qPost->title}}"></figure>
                           <h4><a href="{{url('news-details/'.$qPost->url)}}">{{$qPost->title}}</a></h4>
                           <!-- <div class="post-info"><span class="icon flaticon-people-1"></span> </div> -->
                       </article>
                       @endforeach
                   </div>
               </aside>
           </div>   
        </div>
    </section>
@endsection