<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{{$qItems->name}}</title>
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
                <h1>Doctor <span class="normal-font">Profile</span></h1>
                <div class="bread-crumb"><a href="index-2.html">Home</a> / <a href="#" class="current">Doctor Profile</a></div>
            </div>
        </div>
    </section>


    <!--Team Section-->
    <section class="team-section member-details">
        <div class="auto-container">

            <!--Column-->
            <article class="column team-member">
                <div class="inner-box">
                	<div class="row clearfix">
                    	<div class="column image-column col-lg-5 col-md-3 col-sm-3 col-xs-12">
                    		<figure class="image"><a href="mailto:mail@email.com"><img class="img-responsive" src="{{asset($qItems->image_path)}}" alt=""></a></figure>
                        </div>

                        <div class="column content-column col-lg-7 col-md-9 col-sm-9 col-xs-12">
                            <div class="member-info padd-bott-30">
                                <h3>{{$qItems->name}}</h3>
                                <div class="designation">Senior Worker</div>
                            </div>

                            <!--Fact Counter-->
                            <div class="fact-counter">

                                <div class="row clearfix">
                                    <!--Column-->
                                    <article class="col-md-4 col-sm-4 col-xs-12 column wow fadeIn" data-wow-duration="0ms">
                                    	<div class="inner">
                                            <div class="icon"><span class="flaticon-cup-1"></span></div>
                                            <h4 class="counter-title">TEAM Awards</h4>
                                            <div class="count-outer"><span class="count-text" data-speed="1000" data-stop="05">0</span></div>
                                         </div>
                                    </article>

                                    <!--Column-->
                                    <article class="col-md-4 col-sm-4 col-xs-12 column wow fadeIn" data-wow-duration="0ms">
                                    	<div class="inner">
                                            <div class="icon"><span class="flaticon-favorite-1"></span></div>
                                            <h4 class="counter-title">Complete Project</h4>
                                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="25">0</span></div>
                                        </div>
                                    </article>

                                    <!--Column-->
                                    <article class="col-md-4 col-sm-4 col-xs-12 column wow fadeIn" data-wow-duration="0ms">
                                    	<div class="inner">
                                            <div class="icon"><span class="flaticon-food-2"></span></div>
                                            <h4 class="counter-title">CUp of Coffe</h4>
                                            <div class="count-outer"><span class="count-text" data-speed="2500" data-stop="1200">0</span></div>
                                        </div>
                                    </article>

                                </div>
                            </div>

                            <div class="content">
                                <div class="text no-border no-padd-bottom"><p>Lorem ipsum dolor sit amet, ex recteque interesset nec. Vim modus nusquam maiestatis ea et his equidem dissentiunt. Te his nonumy utroque laoreet, erant conceptam ea ius, ex vide voluptua vis. Ius ne modus phaedrum contentiones, te timeam tamquam cum.</p></div>

                                <ul class="info-list text">
                                	<li><strong>Degrees</strong> Social Worker</li>
                                    <li><strong>Experience</strong> 12 years of Experience</li>
                                    <li><strong>Training</strong> Lorem ipsum dolor sit amet, consectetur , sed do eiusmod tempor   </li>
                                    <li><strong>Work days</strong> Monday, Friday</li>

                                </ul>

                                <div class="social-links">
                                    <a href="#"><span class="fa fa-facebook-f"></span></a>
                                    <a href="#"><span class="fa fa-twitter"></span></a>
                                    <a href="#"><span class="fa fa-google-plus"></span></a>
                                    <a href="#"><span class="fa fa-linkedin"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </section>


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

<!-- Mirrored from world5.commonsupport.com/html/greenture-new/team-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Apr 2018 18:44:54 GMT -->
</html>
