<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{{$qItem->title}}</title>
<!-- Stylesheets -->
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="{{asset('css/responsive.css')}}" rel="stylesheet">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
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
                <h1>Blog <span class="normal-font">Details</span></h1>
                <div class="bread-crumb"><a href="{{url('blog/health-blog')}}">Blog</a> / <a href="{{url('blog-details/'.$qItem->url)}}" class="current">{{$qItem->title}}</a></div>
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
                    <section class="blog-news-section blog-detail no-padd-bottom no-padd-top padd-right-20">

                        <!--News Column-->
                        <div class="column blog-news-column">
                            <article class="inner-box">
                                <figure class="image-box">
                                    <a href="{{'blog/'.$qItem->url}}"><img src="{{url($qItem->blog_big_image)}}" alt="{{$qItem->title}}" title="{{$qItem->title}}"></a>
                                    <div class="news-date">{{ date('d', strtotime($qItem->created_at)) }}<span class="month">{{date('M', strtotime($qItem->created_at))}}</span></div>
                                </figure>
                                <div class="content-box padd-top-30">
                                    <h3><a href="{{url('blog/'.$qItem->url)}}">{{$qItem->title}}</a></h3>
                                    <div class="post-info clearfix">
                                        <div class="post-author">Posted by {{$qItem->author_name}}</div>
                                        <div class="post-options clearfix">
                                            <a href="#" class="comments-count"><span class="icon flaticon-communication-2"></span> 6</a>
                                            <a href="#" class="fav-count"><span class="icon flaticon-favorite-1"></span> 14</a>
                                        </div>
                                    </div>
                                    <!-- Contents Details Start-->
                                    <div class="text">
                                    	{{strip_tags($qItem->details)}}
                                    </div>
                                    <!-- Contents Details End -->
                                </div>

                                <div class="post-share-options clearfix">
                                	<div class="pull-left tags"><strong>Total Views</strong> : {{$qItem->total_view}}</div>
                                    <div class="pull-right social-links-two clearfix">
                                    	<a href="#" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>
                                        <a href="#" class="twitter img-circle"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="google-plus img-circle"><span class="fa fa-google-plus"></span></a>
                                        <a href="#" class="linkedin img-circle"><span class="fa fa-pinterest-p"></span></a>
                                        <a href="#" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>
                                    </div>
                                </div>

                            </article>
                        </div>

                        <!--Comments Area-->
                        <div class="comments-area">
                            <div class="group-title text-uppercase"><h2>3 Comments</h2></div>

                            <div class="comment-box">
                                <div class="comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="author-thumb"><img src="images/resource/author-thumb-1.jpg" alt=""></div>
                                    <div class="comment-info"><strong>Janntul Ferdous</strong><div class="comment-time">November 20, 2014 at 8:31 pm</div></div>
                                    <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.</div>
                                    <a class="reply-btn" href="#"><span class="txt">Reply</span></a>
                                </div>

                                <div class="comment reply-comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="author-thumb"><img src="images/resource/author-thumb-2.jpg" alt=""></div>
                                    <div class="comment-info"><strong>Juliana Rose</strong><div class="comment-time">November 20, 2014 at 8:31 pm</div></div>
                                    <div class="text">At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</div>
                                </div>

                                <div class="comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="author-thumb"><img src="images/resource/author-thumb-3.jpg" alt=""></div>
                                    <div class="comment-info"><strong>Rashed kabir</strong><div class="comment-time">November 20, 2014 at 8:31 pm</div></div>
                                    <div class="text">Whether you need to create a brand from scratch, including marketing materials and a beautiful and functional website or whether you are looking for a design.</div>
                                    <a class="reply-btn" href="#"><span class="txt">Reply</span></a>
                                </div>

                            </div>
                        </div>



                        <!-- Comment Form -->
                        <div class="comment-form wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">

                            <div class="group-title text-uppercase"><h2>Post Reply</h2><div class="default-line-left"></div></div>

                            <!--Comment Form-->
                            <form method="post" action="http://world5.commonsupport.com/html/greenture-new/blog.html">
                                <div class="row clearfix">
                                    <div class=" col-lg-4 col-md-6 col-sm-12 col-xs-12 form-group">
                                        <input type="text" name="username" placeholder="Your Name">
                                    </div>

                                    <div class=" col-lg-4 col-md-6 col-sm-12 col-xs-12 form-group">
                                        <input type="email" name="email" placeholder="Email">
                                    </div>

                                    <div class=" col-lg-4 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <input type="text" name="url" placeholder="Website">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <textarea name="message" placeholder="Your Message"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                        <button class="theme-btn btn-style-two" type="submit" name="submit-form">Add Comment</button>
                                    </div>

                                </div>
                            </form>

                        </div><!--End Comment Form -->

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
                            <div class="sidebar-title"><h3>Latest Posts</h3></div>
                            @foreach($qPosts as $qPost)
                            <article class="post">
                            	<figure class="post-thumb"><img src="{{url($qPost->blog_small_image)}}" alt="{{$qPost->title}}" title="{{$qPost->title}}"></figure>
                                <h4><a href="{{url('blog-details/'.$qPost->url)}}">{{$qPost->title}}</a></h4>
                                <div class="post-info"><span class="icon flaticon-people-1"></span> By {{$qPost->author_name}} </div>
                            </article>
                            @endforeach

                        </div>

                        <!-- Archives -->
                        <div class="widget archives-list wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h3>Archives</h3></div>

                            <ul class="list">
                            	<li><a href="#">April 2016</a></li>
                                <li><a href="#">March  2016</a></li>
                                <li><a href="#">February 2016</a></li>
                                <li><a href="#">January 2016</a></li>
                                <li><a href="#">December 2015</a></li>
                                <li><a href="#">November 2015</a></li>
                            </ul>

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

<!-- Mirrored from world5.commonsupport.com/html/greenture-new/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Apr 2018 18:45:43 GMT -->
</html>
