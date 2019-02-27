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
<link rel="icon" href="{{asset('images/favicon.ico')}}">

@stack('css')

</head>

<body>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
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
                      <li><span class="icon flaticon-interface"></span>doctorpleasebd@gmail.com</li>
                      <li><span class="icon flaticon-technology-5"></span>+8801880162661</li>
                        <li class="social-links-one">
                          <a href="https://www.facebook.com/doctorpleasebd" target="_blank" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>
                            <a href="https://twitter.com/please_doctor" target="_blank" class="twitter img-circle"><span class="fa fa-twitter"></span></a>
                            <a href="https://plus.google.com/108522590799006815752" target="_blank" class="google-plus img-circle"><span class="fa fa-google-plus"></span></a>
                            <a href="https://www.linkedin.com/company/doctor-please/" target="_blank" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>
                        </li>
                        <!-- <li>
                          <a href="">English</a>
                          <a href="">বাংলা</a>
                        </li> -->
                    </ul>
                 </div>
            </div>
        </div>
      <!-- Header Upper 549614 -->
      <div class="header-upper">
          <div class="auto-container clearfix">
              <!-- Logo -->
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{url('images/doctor_please.png')}}" alt="Greenture"></a>
                 </div>
                 <!--Nav Outer-->
                <div class="nav-outer">

                    <a href="{{url('order-without-prescription')}}" class="theme-btn btn-donate">
                        <span> Order Medicine</span>
                    </a>
                    
                    <a href="">.</a>
                    <!-- Main Menu -->
                    <nav class="main-menu" style="margin-right: 100px;">

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
                                      <!-- <li><a href="">Patients History</a></li> -->
                                  </ul>
                                </li>
                                <li><a href="{{url('our-doctors')}}">Doctors</a></li>
                                <!-- <li><a href="#">Prescription</a></li> -->
                                <li><a href="{{url('blog/health-blog')}}">Blog</a></li>
                                <li class="dropdown"><a href="">Medicine</a>
                                    <ul>
                                        <li><a href="{{url('medicine-category/3/Tablet')}}">Tablet</a></li>
                                        <li><a href="{{url('medicine-category/1/Capsule')}}">Capsule</a></li>
                                        <li><a href="{{url('medicine-category/2/Syrup')}}">Syrup</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url('all-invoice')}}">Invoice</a></li>
                                <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      <span class="fa fa-power-off "></span> Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                                </li>
                                
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
    @include('layouts.footer');

</div>
<!--End pagewrapper-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span></div>


<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- <script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('js/jquery.fancybox-media.js')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script> -->
<script src="{{asset('js/script.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@stack('scripts')
</body>

</html>
