<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{{$qItem->title}}</title>
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="{{asset('css/responsive.css')}}" rel="stylesheet">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js')}}"></script><![endif]-->
<!--[if lt IE 9]><script src="{{asset('js/respond.js')}}"></script><![endif]-->
</head>

<body>
<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>


    <!-- Main Header -->
    @include('layouts.header')


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
                                            <div class="column-info no-margin-bottom">13-14 Feb in Sanfransico, CA</div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 pull-right text-right"><a href="#" class="theme-btn btn-style-two">Join With Us</a></div>
                                    </div>
                                    <hr>

                                    <div class="text">
                                    	<br>
                                        {{strip_tags($qItem->details)}}
                                    </div>


                                    <br><br>

                                    <div class="other-info">
                                    	<div class="row clearfix">
                                        	<!--Info Column-->
                                            <div class="info-column column col-md-6 col-xs-12">
                                            	<h3>Event Details</h3>
                                        		<div class="text">Lorem ipsum dolor sit amet, usu an quem augue admodum.</div>
                                                <ul class="info-box">
                                                    <li><span class="icon fa fa-map-marker"></span><strong>Location</strong> Luna Park, Melbourne, Australia</li>
                                                    <li><span class="icon fa fa-calendar"></span><strong>Date</strong> 15 March 2015 - 17 March 2015</li>
                                                    <li><span class="icon fa fa-clock-o"></span><strong>Time</strong> 10:00 am - 2:00 pm</li>
                                                </ul>
                                            </div>

                                            <!--Map Column-->
                                            <div class="map-column column col-md-6 col-xs-12">
                                                <!--Map Container-->
                                                <div class="map-container">
                                                    <!--Map Canvas-->
                                                    <div class="map-canvas"
                                                        data-zoom="12"
                                                        data-lat="-37.817085"
                                                        data-lng="144.955631"
                                                        data-type="roadmap"
                                                        data-hue="#ffc400"
                                                        data-title="Envato"
                                                        data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>"
                                                        style="height: 300px;">
                                                    </div>

                                                </div>
                                            </div>

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
                        <div class="widget search-box">

                            <form method="post" action="http://world5.commonsupport.com/html/greenture-new/index.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Enter keyword">
                                    <button type="submit"><span class="icon flaticon-tool-5"></span></button>
                                </div>
                            </form>

                        </div>


                        <!-- Recent Posts -->
                        <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h3>Latest News</h3></div>
                            @foreach($qPosts as $qPost)
                            <article class="post">
                            	<figure class="post-thumb"><img src="{{url($qPost->news_small_image)}}" alt="{{$qPost->title}}" title="{{$qPost->title}}"></figure>
                                <h4><a href="{{url('news-details/'.$qPost->url)}}">{{$qPost->title}}</a></h4>
                                <div class="post-info"><span class="icon flaticon-people-1"></span> By Rashed Kabir </div>
                            </article>
                            @endforeach
                        </div>


                        <!-- Popular Tags -->
                        <div class="widget popular-tags">
                            <div class="sidebar-title"><h3>KeyWords</h3></div>

                            <a href="#">Child</a>
                            <a href="#">Water</a>
                            <a href="#">Donate</a>
                            <a href="#">Money</a>
                            <a href="#">Volunteer</a>

                        </div>

                    </aside>

                </div>
                <!--Sidebar-->

            </div>
        </div>
    </div>


    <!--Parallax Section-->
    <section class="parallax-section" style="background-image:url({{asset('images/parallax/image-1.jpg')}});">
    	<div class="auto-container">
        	<div class="text-center">
            	<h2>The Best time to <span class="theme_color">plant tree</span> is now</h2>
                <div class="text">Some lorem ipsum subtitle will be here ipsum dolor</div>
            	<a href="#" class="theme-btn btn-style-two">Donate Now!</a>
                <a href="#" class="theme-btn btn-style-one">Join Event</a>
            </div>
        </div>
    </section>


    <!--Intro Section-->
    <section class="subscribe-intro">
    	<div class="auto-container">
        	<div class="row clearfix">
            	<!--Column-->
                <div class="column col-md-9 col-sm-12 col-xs-12">
                	<h2>Subcribe for Newsletter</h2>
                    There are many variations of passages of Lorem Ipsum available but the majority have
                </div>
                <!--Column-->
                <div class="column col-md-3 col-sm-12 col-xs-12">
                	<div class="text-right padd-top-20">
                		<a href="#" class="theme-btn btn-style-one">Subscribe Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Main Footer-->
    @include('layouts.footer')

</div>
<!--End pagewrapper-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span></div>


<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('js/jquery.fancybox-media.js')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script src="{{asset('js/map-script.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
