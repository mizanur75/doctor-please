<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="{{asset('css/responsive.css')}}" rel="stylesheet">

</head>

<body>
<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>


    <!-- Main Header -->
    <header class="main-header">
      <div class="top-bar">
          <div class="top-container">
              <!--Info Outer-->
                 <div class="info-outer">
                  <!--Info Box-->
                    <ul class="info-box clearfix">
                      <li><span class="icon flaticon-interface"></span><a href="#">info@hellodoctor.com</a></li>
                      <li><span class="icon flaticon-technology-5"></span><a href="#">(732) 803-010-03</a></li>
                        <li class="social-links-one">
                          <a href="#" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>
                            <a href="#" class="twitter img-circle"><span class="fa fa-twitter"></span></a>
                            <a href="#" class="google-plus img-circle"><span class="fa fa-google-plus"></span></a>
                            <a href="#" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>
                        </li>
                    </ul>
                 </div>
            </div>
        </div>
      <!-- Header Upper 549614 -->
      <div class="header-upper">
          <div class="auto-container clearfix">
              <!-- Logo -->
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{url('images/hello-doctor.png')}}" alt="Greenture"></a>
                 </div>

                 <!--Nav Outer-->
                <div class="nav-outer clearfix">

                    <a href="{{ route('logout') }}" class="theme-btn btn-donate"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <span class="fa fa-power-off "> Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    <!-- Main Menu -->
                    <nav class="main-menu">

                        <div class="navbar-header">
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation">

                                <li class="current"><a href=""><i class="fa fa-home" style="font-size:1.7em;"></i></a></li>
                                <li class="dropdown"><a href="#">Patients</a>
                                  <ul>
                                      <li><a href="{{url('patient-profile')}}">Patients Profile</a></li>
                                      <li><a href="">Patients History</a></li>
                                  </ul>
                                </li>
                                <li><a href="{{url('our-doctors')}}">Doctors</a></li>
                                <li><a href="#">Prescription</a></li>
                                <li><a href="{{url('blog/health-blog')}}">Blog</a></li>
                                <li class="dropdown"><a href="#">Medicine</a>
                                    <ul>
                                        <li><a href="">Tablet</a></li>
                                        <li><a href="">Capsule</a></li>
                                        <li><a href="">Gel</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Invoice</a></li>

                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->

                </div>

            </div>
        </div><!-- Header Top End -->

    </header><!--End Main Header -->


    <!--Team Section-->
    <section class="team-section">
        <div class="auto-container">
          @yield('content')
        </div>
    </section>


    <!--Main Footer-->
    <footer class="main-footer" style="background-image:url({{url('images/background/footer-bg.jpg')}});">

        <!--Footer Upper-->
        <div class="footer-upper">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Two 4th column-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="row clearfix">
                            <div class="col-lg-8 col-sm-6 col-xs-12 column">
                                <div class="footer-widget about-widget">
                                    <div class="logo"><a href="index-2.html"><img src="images/hello-doctor-2.png" class="img-responsive" alt=""></a></div>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet, eu me.</p>
                                    </div>

                                    <ul class="contact-info">
                                      <li><span class="icon fa fa-map-marker"></span> 60 Grant Ave. Carteret NJ 0708</li>
                                        <li><span class="icon fa fa-phone"></span> (880) 1723801729</li>
                                        <li><span class="icon fa fa-envelope-o"></span> example@gmail.com</li>
                                    </ul>

                                    <div class="social-links-two clearfix">
                                      <a href="#" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>
                                        <a href="#" class="twitter img-circle"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="google-plus img-circle"><span class="fa fa-google-plus"></span></a>
                                        <a href="#" class="linkedin img-circle"><span class="fa fa-pinterest-p"></span></a>
                                        <a href="#" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>
                                    </div>

                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="col-lg-4 col-sm-6 col-xs-12 column">
                                <h2>Our Project</h2>
                                <div class="footer-widget links-widget">
                                    <ul>
                                        <li><a href="#">Water Surve</a></li>
                                        <li><a href="#">Education for all</a></li>
                                        <li><a href="#">Treatment</a></li>
                                        <li><a href="#">Food Serving</a></li>
                                        <li><a href="#">Cloth</a></li>
                                        <li><a href="#">Selter Project</a></li>
                                    </ul>

                                </div>
                            </div>
                      </div>
                    </div><!--Two 4th column End-->

                    <!--Two 4th column-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="row clearfix">
                        <!--Footer Column-->
                          <div class="col-lg-7 col-sm-6 col-xs-12 column">
                              <div class="footer-widget news-widget">
                                  <h2>Latest News</h2>

                                    <!--News Post-->
                                    <div class="news-post">
                                      <div class="icon"></div>
                                        <div class="news-content"><figure class="image-thumb"><img src="images/resource/post-thumb-4.jpg" alt=""></figure><a href="#">If you need a crown or lorem an implant you will pay it gap it</a></div>
                                        <div class="time">July 2, 2014</div>
                                    </div>

                                    <!--News Post-->
                                    <div class="news-post">
                                      <div class="icon"></div>
                                        <div class="news-content"><figure class="image-thumb"><img src="images/resource/post-thumb-5.jpg" alt=""></figure><a href="#">If you need a crown or lorem an implant you will pay it gap it</a></div>
                                        <div class="time">July 2, 2014</div>
                                    </div>

                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="col-lg-5 col-sm-6 col-xs-12 column">
                                <div class="footer-widget links-widget">
                                  <h2>Quick Links</h2>
                                    <ul>
                                        <li><a href="#">Water Surve</a></li>
                                        <li><a href="#">Education for all</a></li>
                                        <li><a href="#">Treatment</a></li>
                                        <li><a href="#">Food Serving</a></li>
                                        <li><a href="#">Cloth</a></li>
                                        <li><a href="#">Selter Project</a></li>
                                    </ul>

                                </div>
                            </div>
                      </div>
                    </div><!--Two 4th column End-->

                </div>

            </div>
        </div>

        <!--Footer Bottom-->
      <div class="footer-bottom">
            <div class="auto-container clearfix">
                <!--Copyright-->
                <div class="copyright text-center">Copyright {{date('Y')}} &copy; Design and Develop By <a href="#">Nano Worker BD</a>  with love</div>
            </div>
        </div>

    </footer>

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

</html>
