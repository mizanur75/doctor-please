@extends('layouts.front.app')

@section('title', 'Doctor Please Blog')


@section('front')
    <section class="page-title" style="background-image:url({{url('images/background/page-title-bg.jpg')}});">
    	<div class="auto-container">
        	<div class="sec-title">
                <h1>Our <span class="normal-font">Blog</span></h1>
                <div class="bread-crumb"><a href="{{url('/')}}">Home</a> / <a href="{{url('blog')}}" class="current">Blog</a></div>
            </div>
        </div>
    </section>


    <!--Sidebar Page-->
    <div class="sidebar-page">
    	<div class="auto-container">
        	<div class="row clearfix">

                <!--Content Side-->
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                    <!--Projects Section-->
                    <section class="projects-section no-padd-bottom no-padd-top padd-right-20">
                        <?php $i = 0;?>
                        <div class="row clearfix">

                          @foreach($qPosts as $qPost)
                          <div class="column default-featured-column col-md-6 col-sm-6 col-xs-12">
                              <article class="inner-box">
                                  <figure class="image-box">
                                      <a href="{{url('blog-details/'.$qPost->url)}}"><img src="{{url($qPost->blog_small_image)}}" alt="{{$qPost->title}}" title="{{$qPost->title}}"></a>
                                  </figure>
                                  <div class="content-box">
                                      <h3><a href="{{url('blog-details/'.$qPost->url)}}">{{$qPost->title}}</a></h3>
                                      <div class="column-info">Posted by {{$qPost->author_name}}</div>
                                      <div class="text">{{strip_tags($qPost->brief)}}</div>
                                      <a href="{{url('blog-details/'.$qPost->url)}}" class="theme-btn btn-style-three">বিস্তারিত পড়ুন</a>
                                  </div>
                              </article>
                          </div>

                          <?php $i++;?>
                          @if($i % 2 == 0)
                          </div><br /><div class="row">
                          @endif

                          @endforeach

                        </div>

                        <!-- Styled Pagination -->
                        @if(!empty($qPosts))
                          {{ $qPosts->links() }}
                        @endif
                    </section>


                </div>
                <!--Content Side-->

                <!--Sidebar-->
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">

                        <!-- Search Form
                        <div class="widget search-box">

                            <form method="post" action="http://world5.commonsupport.com/html/greenture-new/index.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Enter keyword">
                                    <button type="submit"><span class="icon flaticon-tool-5"></span></button>
                                </div>
                            </form>

                        </div> -->

                        <!-- Popular Categories -->
                        <div class="widget popular-categories wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h3>বিভাগ সমূহ </h3></div>

                            <ul class="list">
                              @foreach($qCategorys as $qCategory)
                            	<li><a class="clearfix" href="{{url('blog/'.$qCategory->url)}}">{{$qCategory->category_name_bn}}</a></li>
                              @endforeach
                            </ul>

                        </div>


                        <!-- Recent Posts -->
                        <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h3>জনপ্রিয় পোস্ট</h3></div>

                            @foreach($qPopularPosts as $qPopularPost)
                            <article class="post">
                            	<figure class="post-thumb"><img src="{{url($qPopularPost->blog_small_image)}}" alt="{{$qPopularPost->title}}" title="{{$qPopularPost->title}}"></figure>
                                <h4><a href="{{url('blog-details/'.$qPopularPost->url)}}">{{$qPopularPost->title}}</a></h4>
                                <div class="post-info"><span class="icon flaticon-people-1"></span> By {{$qPopularPost->author_name}} </div>
                            </article>
                            @endforeach

                        </div>

                        <!-- Popular Tags
                        <div class="widget popular-tags">
                            <div class="sidebar-title"><h3>KeyWords</h3></div>

                            <a href="#">Child</a>
                            <a href="#">Water</a>
                            <a href="#">Donate</a>
                            <a href="#">Money</a>
                            <a href="#">Volunteer</a>

                        </div> -->

                    </aside>


                </div>
                <!--Sidebar-->


            </div>
        </div>
    </div>

@endsection