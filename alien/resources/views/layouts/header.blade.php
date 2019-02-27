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

                <a href="{{url('/')}}"><img src="{{url('images/doctor_please.png')}}" alt="doctor-please"></a>
             </div>

             <!--Nav Outer-->
            <div class="nav-outer clearfix">
                <a href="" style="visibility: hidden;">.</a>
                <a href="{{ url('login') }}" class="theme-btn btn-donate">See a Doctor</a>

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

                            <li class="current"><a href="{{url('/')}}"><i class="fa fa-home" style="font-size:1.7em;"></i></a></li>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('about-us')}}">About Us</a></li>
                            <li><a href="{{url('our-doctors')}}">Doctors</a></li>
                            <li class="dropdown"><a href="#">Medicine</a>
                                <ul>
                                    <li><a href="{{url('medicine-category/3/Tablet')}}">Tablet</a></li>
                                    <li><a href="{{url('medicine-category/1/Capsule')}}">Capsule</a></li>
                                    <li><a href="{{url('medicine-category/2/Syrup')}}">Syrup</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog</a>
                                <ul>
                                    <li><a href="{{url('blog/health-blog')}}">Blog</a></li>
                                    <li><a href="{{url('news/doctor-please-news')}}">News & Events</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('contact-us')}}">Contact</a></li>
                            <li><a href="{{url('faqs')}}">FAQs</a></li>
                            @if('guest')
                            <li><a href="{{url('login')}}" >Login</a></li>
                            @endif
                        </ul>
                    </div>

                </nav>

            </div>

        </div>
    </div>

</header>
