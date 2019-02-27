<!DOCTYPE html>
<html>

<!-- Mirrored from world5.commonsupport.com/html/greenture-new/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Apr 2018 18:46:25 GMT -->
<head>
<meta charset="utf-8">
<title>Contact Us</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">
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
    <section class="page-title" style="background-image:url(images/background/page-title-bg.jpg);">
    	<div class="auto-container">
        	<div class="sec-title">
                <h1>Contact <span class="normal-font">Us</span></h1>
                <div class="bread-crumb"><a href="index-2.html">Home</a> / <a href="#" class="current">Contact Us</a></div>
            </div>
        </div>
    </section>


    <!--Default Section / Other Info-->
    <section class="default-section other-info">
    	<div class="auto-container">

        	<div class="row clearfix">

                <!--Info Column-->
                <div class="column info-column col-lg-5 col-md-6 col-sm-12 col-xs-12">
                	<article class="inner-box">
                		<h3 class="margin-bott-20">Our Address</h3>
                        <div class="text margin-bott-40">Lorem Ipsum is simply dummy text of the printing and typese tting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. </div>
                        <ul class="info-box">
                            <li><span class="icon flaticon-location"></span><strong>Address</strong> Mirpur New Bazar Road, Block-c, Dhaka-1210</li>
                            <li><span class="icon flaticon-technology-5"></span><strong>Phone</strong> (732) 803-01 03, (732) 806-01 04</li>
                            <li><span class="icon flaticon-interface-1"></span><strong>Email</strong> smaple@gmail.com</li>
                        </ul>
                    </article>
                </div>

                <!--Image Column-->
                <div class="column image-column col-lg-7 col-md-6 col-sm-12 col-xs-12">
                	<article class="inner-box">
                		<figure class="image-box"><img src="images/resource/featured-image-34.jpg" alt=""></figure>
                    </article>
                </div>

            </div>
        </div>
    </section>


    <!--Contact Section-->
    <section class="contact-section no-padd-top">
    	<div class="auto-container">

        	<div class="row clearfix">

                <!--Map Column-->
                <div class="column map-column col-lg-5 col-md-6 col-sm-12 col-xs-12">
                	<h2>Our Location on Map</h2>

                	<article class="inner-box">
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
                                style="height: 380px;">
                            </div>

                        </div>
                    </article>
                </div>

                <!--Form Column-->
                <div class="column form-column col-lg-7 col-md-6 col-sm-12 col-xs-12">
                	<h2>Send Message</h2>
                	<!--COntact Form-->
                	<div class="inner-box contact-form">
                    	<form method="post" action="http://world5.commonsupport.com/html/greenture-new/sendemail.php" id="contact-form">
                        	<div class="row clearfix">
                            	<!--Form Group-->
                                <div class="form-group col-md-6 col-xs-12">
                                	<input type="text" name="username" value="" placeholder="Your Name">
                                </div>
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-xs-12">
                                	<input type="text" name="email" value="" placeholder="Your Email">
                                </div>
                                <!--Form Group-->
                                <div class="form-group col-md-12 col-xs-12">
                                	<textarea name="message" placeholder="Message"></textarea>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-12 col-xs-12">
                                	<div class="text-right"><button type="submit" class="theme-btn btn-style-two">Send</button></div>
                                </div>
                            </div>
                        </form>
                    </div><!--COntact Form-->

                </div>

            </div>
        </div>
    </section>


    <!--Parallax Section-->
    <section class="parallax-section" style="background-image:url(images/parallax/image-1.jpg);">
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


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/owl.js"></script>
<script src="js/map-script.js"></script>
<script src="js/validate.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
</body>

<!-- Mirrored from world5.commonsupport.com/html/greenture-new/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Apr 2018 18:46:30 GMT -->
</html>
