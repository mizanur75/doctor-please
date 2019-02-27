<!DOCTYPE html>
<html>

<!-- Mirrored from world5.commonsupport.com/html/greenture-new/error.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Apr 2018 18:44:54 GMT -->
<head>
<meta charset="utf-8">
<title>All medicine</title>
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
                <h1>{{$sCatName}}</h1>
                <div class="bread-crumb"><a href="">medicine</a> / <a href="" class="current">{{$sCatName}}</a></div>
            </div>
        </div>
    </section>

    <br />

    <div class="container">

        <div class="row">
          <?php $i = 0;?>
          <div class="row">
            @foreach($qItems as $sItem)
            <div class="col-lg-3 col-md-6 col-xs-12 text-center">
              <div class="medicen-details">
                <a href="{{url('medicine-details/'.$sItem->url)}}">
                <img src="{{asset($sItem->product_small_image)}}" title="{{$sItem->productName}}" alt="{{$sItem->productName}}" class="img-responsive mb-3">
                <hr>
                <h5 class="medicine-title">{{$sItem->productName}}</h5>
                </a>
                <?php echo $sItem->productBrief;?>
                <a href="{{url('medicine-details/'.$sItem->url)}}"><span class="btn btn-warning mb-10">View Details <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
              </div>
            </div>

            <?php $i++;?>
            @if($i % 4 == 0)
            </div><br /><div class="row">
            @endif

            @endforeach

          </div>
        </div>
        <br /><br />

        <!-- <div class="row">

          <div class="col-lg-3 col-md-6 col-xs-12 text-center">
            <div class="medicen-details">
              <img src="images/medicine/medicine-2.jpg" title="" alt="" class="img-responsive mb-3">
              <hr>
              <h5 class="medicine-title">Holy Live</h5>
              <p>লিভারের প্রদাহ, প্রতিবন্ধকতা জনিত জন্ডিস, লিভারের দুর্বলতা</p>
              <a href="medicine-details.php"><span class="btn btn-warning mb-10">View Details <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-xs-12 text-center">
            <div class="medicen-details">
              <img src="images/medicine/medicine-2.jpg" title="" alt="" class="img-responsive mb-3">
              <hr>
              <h5 class="medicine-title">Holy Live</h5>
              <p>লিভারের প্রদাহ, প্রতিবন্ধকতা জনিত জন্ডিস, লিভারের দুর্বলতা</p>
              <a href="medicine-details.php"><span class="btn btn-warning mb-10">View Details <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-xs-12 text-center">
            <div class="medicen-details">
              <img src="images/medicine/medicine-2.jpg" title="" alt="" class="img-responsive mb-3">
              <hr>
              <h5 class="medicine-title">Holy Live</h5>
              <p>লিভারের প্রদাহ, প্রতিবন্ধকতা জনিত জন্ডিস, লিভারের দুর্বলতা</p>
              <a href="medicine-details.php"><span class="btn btn-warning mb-10">View Details <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-xs-12 text-center">
            <div class="medicen-details">
              <img src="images/medicine/medicine-2.jpg" title="" alt="" class="img-responsive mb-3">
              <hr>
              <h5 class="medicine-title">Holy Live</h5>
              <p>লিভারের প্রদাহ, প্রতিবন্ধকতা জনিত জন্ডিস, লিভারের দুর্বলতা</p>
              <a href="medicine-details.php"><span class="btn btn-warning mb-10">View Details <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
            </div>
          </div>

        </div> -->

        <hr class="row"/>

        <div class="row">

          <div class="col-lg-3 benefit_col">
            <div class="benefit_item d-flex flex-row align-items-center">
  						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
  						<div class="benefit_content">
  							<h6>free shipping</h6>
  							<p>Suffered Alteration in Some Form</p>
  						</div>
  					</div>
          </div>

  				<div class="col-lg-3 benefit_col">
  					<div class="benefit_item d-flex flex-row align-items-center">
  						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
  						<div class="benefit_content">
  							<h6>cach on delivery</h6>
  							<p>The Internet Tend To Repeat</p>
  						</div>
  					</div>
  				</div>

  				<div class="col-lg-3 benefit_col">
  					<div class="benefit_item d-flex flex-row align-items-center">
  						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
  						<div class="benefit_content">
  							<h6>45 days return</h6>
  							<p>Making it Look Like Readable</p>
  						</div>
  					</div>
  				</div>

  				<div class="col-lg-3 benefit_col">
  					<div class="benefit_item d-flex flex-row align-items-center">
  						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
  						<div class="benefit_content">
  							<h6>opening all week</h6>
  							<p>8AM - 09PM</p>
  						</div>
  					</div>
  				</div>

        </div>

    </div>

    <br />

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
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
</body>

</html>
