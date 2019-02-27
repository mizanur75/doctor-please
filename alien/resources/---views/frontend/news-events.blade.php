<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Hello Doctor News Events</title>
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
                <h1>Our <span class="normal-font">Projects</span></h1>
                <div class="bread-crumb"><a href="index-2.html">Home</a> / <a href="#" class="current">Projects</a></div>
            </div>
        </div>
    </section>


    <!--Projects Section-->
    <section class="projects-section">
    	<div class="auto-container">
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
                        <div class="column-info">Environment, Go Green Company</div>
                        <div class="text"><div class="text">{{strip_tags($sItem->brief)}}</div></div>
                        <a href="{{url('news-details/'.$sItem->url)}}" class="theme-btn btn-style-three">Learn More</a>
                    </div>
                </article>
            </div>

          <?php $i++;?>
          @if($i % 4 == 0)
          </div><div class="row clearfix">
          @endif

          @endforeach
        </div>

        <!-- Styled Pagination -->
        @if(!empty($qItems))
          {{ $qItems->links() }}
        @endif

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
<script src="{{asset('js/map-script.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
