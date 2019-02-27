@extends('layouts.front.app')

@section('title', $qItem->title)


@section('front')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('images/background/page-title-bg.jpg')}});">
    	<div class="auto-container">
        	<div class="sec-title">
                <h1>SIngle <span class="normal-font">Event</span></h1>
                <div class="bread-crumb"><a href="{{'news/hello-doctor-news'}}">News and Events</a> / <a href="{{$qItem->url}}" class="current">{{$qItem->title}}</a></div>
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
                    <section class="events-section event-details no-padd-bottom no-padd-top padd-right-20">

                        <div class="column default-featured-column style-two">
                            <article class="inner-box">
                                <figure class="image-box">
                                    <a href="{{url('news-details/'.$qItem->url)}}"><img src="{{url($qItem->news_big_image)}}" alt="{{$qItem->title}}" title="{{$qItem->title}}"></a>
                                </figure>
                                <div class="content-box padd-top-40">
                                    <div class="row detail-header clearfix">
                                        <div class="col-md-8 col-sm-12">
                                            <h3><a href="{{url('news-details/'.$qItem->url)}}">{{$qItem->title}}</a></h3>
                                            <!-- <div class="column-info no-margin-bottom">13-14 Feb in Sanfransico, CA</div> -->
                                        </div>
                                        <!-- <div class="col-md-4 col-sm-12 pull-right text-right"><a href="#" class="theme-btn btn-style-two">Join With Us</a></div> -->
                                    </div>
                                    <hr>

                                    <div class="text">
                                    	<br>
                                        {{strip_tags($qItem->details)}}
                                    </div>


                                    <br><br>

                                    <div class="other-info">
                                    	<div class="row clearfix">
                                        	<!--Info Column
                                            <div class="info-column column col-md-6 col-xs-12">
                                            	<h3>Event Details</h3>
                                        		<div class="text">Lorem ipsum dolor sit amet, usu an quem augue admodum.</div>
                                                <ul class="info-box">
                                                    <li><span class="icon fa fa-map-marker"></span><strong>Location</strong> Luna Park, Melbourne, Australia</li>
                                                    <li><span class="icon fa fa-calendar"></span><strong>Date</strong> 15 March 2015 - 17 March 2015</li>
                                                    <li><span class="icon fa fa-clock-o"></span><strong>Time</strong> 10:00 am - 2:00 pm</li>
                                                </ul>
                                            </div>-->
                                        </div>
                                    </div>

                                </div>
                            </article>
                        </div>

                    </section>

                </div>
                <!--Content Side-->

                <!--Sidebar-->
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
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
                                <!-- <div class="post-info"><span class="icon flaticon-people-1"></span> By Rashed Kabir </div> -->
                            </article>
                            @endforeach
                        </div>

                    </aside>

                </div>
                <!--Sidebar-->

            </div>
        </div>
    </div>
@endsection