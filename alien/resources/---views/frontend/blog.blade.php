<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Hello Doctor Blog</title>
<!-- Stylesheets -->
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
                                      <a href="{{url('blog-details/'.$qPost->url)}}" class="theme-btn btn-style-three">Learn More</a>
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

                        <!-- Search Form -->
                        <div class="widget search-box">

                            <form method="post" action="http://world5.commonsupport.com/html/greenture-new/index.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Enter keyword">
                                    <button type="submit"><span class="icon flaticon-tool-5"></span></button>
                                </div>
                            </form>

                        </div>

                        <!-- Popular Categories -->
                        <div class="widget popular-categories wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h3>Categories</h3></div>

                            <ul class="list">
                              @foreach($qCategorys as $qCategory)
                            	<li><a class="clearfix" href="{{url('blog/'.$qCategory->url)}}">{{$qCategory->category_name_bn}}</a></li>
                              @endforeach
                            </ul>

                        </div>


                        <!-- Recent Posts -->
                        <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h3>Popular Posts</h3></div>

                            @foreach($qPopularPosts as $qPopularPost)
                            <article class="post">
                            	<figure class="post-thumb"><img src="{{url($qPopularPost->blog_small_image)}}" alt="{{$qPopularPost->title}}" title="{{$qPopularPost->title}}"></figure>
                                <h4><a href="{{url('blog-details/'.$qPopularPost->url)}}">{{$qPopularPost->title}}</a></h4>
                                <div class="post-info"><span class="icon flaticon-people-1"></span> By {{$qPopularPost->author_name}} </div>
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
    <section class="parallax-section" style="background-image:url({{url('images/parallax/image-1.jpg')}});">
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
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>

<!-- Mirrored from world5.commonsupport.com/html/greenture-new/projects-two-column.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Apr 2018 18:44:09 GMT -->
</html>
