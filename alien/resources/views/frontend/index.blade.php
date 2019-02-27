@extends('layouts.front.app')

@section('title', 'Best Free Online Health Service in Bangladesh')

@push('css')

@endpush

@section('front')

    <section class="main-slider revolution-slider">
      <div class="tp-banner-container">
        <div class="tp-banner">
          <ul>
              <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="{{asset('images/main-slider/Slide-1.png')}}"  data-saveperformance="off"  data-title="সুস্বাস্থ্য ও সমৃদ্ধ জীবনের প্রত্যয়">
              <img src="{{asset('images/main-slider/Slide-1.png')}}"  alt="doctor please"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

              <div class="tp-caption sfr sfb tp-resizeme"
              data-x="left" data-hoffset="90"
              data-y="center" data-voffset="-50"
              data-speed="1500"
              data-start="1000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><h1><span class="normal-font">অনলাইন</span> স্বাস্থ্য  সেবা</h1></div>

              <div class="tp-caption sfl sfb tp-resizeme"
              data-x="left" data-hoffset="90"
              data-y="center" data-voffset="40"
              data-speed="1500"
              data-start="1500"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><h3 class="bg-color">সুস্বাস্থ্য ও সমৃদ্ধ জীবনের প্রত্যয়</h3></div>

              <div class="tp-caption sfl sfb tp-resizeme"
              data-x="left" data-hoffset="90"
              data-y="center" data-voffset="110"
              data-speed="1500"
              data-start="2000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><!-- <div class="text">Lorem ipsum dolor sit amet, debet dolore mollis his ad, ea usu <br>soleat detraxit.In vix agam moderatius. Modo partiendo.</div> --></div>

              <div class="tp-caption sfr sfb tp-resizeme"
              data-x="left" data-hoffset="90"
              data-y="center" data-voffset="190"
              data-speed="1500"
              data-start="2000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><a href="{{url('blog/health-blog')}}" class="theme-btn btn-style-two">বিস্তারিত দেখুন</a></div>

              </li>

              <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="{{asset('images/main-slider/d.jpg')}}"  data-saveperformance="off"  data-title="আমাদের ভিশন একটি সুস্থ ভবিষ্যত">
              <img src="{{asset('images/main-slider/d.jpg')}}"  alt="doctor please"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

              <div class="tp-caption sfr sfb tp-resizeme"
              data-x="left" data-hoffset="90"
              data-y="center" data-voffset="-50"
              data-speed="1500"
              data-start="1000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><h1><span class="normal-font">Stop</span> Diabetes</h1></div>

              <div class="tp-caption sfl sfb tp-resizeme"
              data-x="left" data-hoffset="90"
              data-y="center" data-voffset="40"
              data-speed="1500"
              data-start="1500"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><h3 class="bg-color">আমাদের ভিশন একটি সুস্থ ভবিষ্যত </h3></div>

              <div class="tp-caption sfl sfb tp-resizeme"
              data-x="left" data-hoffset="90"
              data-y="center" data-voffset="110"
              data-speed="1500"
              data-start="2000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn">
                
              </div>

              <div class="tp-caption sfr sfb tp-resizeme"
              data-x="left" data-hoffset="90"
              data-y="center" data-voffset="190"
              data-speed="1500"
              data-start="2000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><a href="{{url('blog/health-blog')}}" class="theme-btn btn-style-two">বিস্তারিত দেখুন</a></div>

              </li>

              <li data-transition="slidedown" data-slotamount="1" data-masterspeed="1000" data-thumb="{{asset('images/main-slider/4.jpg')}}"  data-saveperformance="off"  data-title="প্রকৃতির মাঝেই প্রকৃত চিকিৎসা">
              <img src="{{asset('images/main-slider/4.jpg')}}"  alt="doctor please"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">


              <div class="tp-caption sfl sfb tp-resizeme"
              data-x="center" data-hoffset="0"
              data-y="center" data-voffset="-120"
              data-speed="1500"
              data-start="500"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><h2 style="color: black;">প্রকৃতির মাঝেই প্রকৃত চিকিৎসা</h2></div>

              <div class="tp-caption sfr sfb tp-resizeme"
              data-x="center" data-hoffset="0"
              data-y="center" data-voffset="-30"
              data-speed="1500"
              data-start="1000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><!-- <h2 style="color: black;">প্রকৃতির মাঝেই প্রকৃত চিকিৎসা</h2> --></div>

              <div class="tp-caption sfl sfb tp-resizeme"
              data-x="center" data-hoffset="0"
              data-y="center" data-voffset="50"
              data-speed="1500"
              data-start="1500"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><h4 style="color: white;">For Natural Treatment</h4></div>

              <div class="tp-caption sfr sfb tp-resizeme"
              data-x="center" data-hoffset="0"
              data-y="center" data-voffset="120"
              data-speed="1500"
              data-start="2000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.01"
              data-endelementdelay="0.3"
              data-endspeed="1200"
              data-endeasing="Power4.easeIn"><a href="{{url('blog/health-blog')}}" class="theme-btn btn-style-two">বিস্তারিত দেখুন</a></div>

              </li>

            </ul>
        </div>
      </div>
    </section>


    <!--Main Features-->
    <section class="main-features">
      <div class="auto-container">
          <div class="title-box text-center">
              <!-- <h1>30000+</h1> -->
              <h2>কেন অনলাইনে একজন ডক্টর দেখবেন?</h2>
                <!-- <div class="text">Lorem ipsum dolor sit amet, pro in harum aperiri persecuti, eu mea minim platonem, mea cetero intellegam eu. Mel ferri</div> -->
            </div>

            <div class="row clearfix">

                <!--Feature Column-->
                <div class="features-column col-lg-3 col-md-6 col-sm-6 col-xs-12">
                  <article class="inner-box">
                      <div class="icon-box">
                          <div class="icon"><span class="flaticon-communication"></span></div>
                            <h3 class="title">সিরিয়ালের প্রয়োজন নেই</h3>
                        </div>
                    </article>
                </div>

                <!--Feature Column-->
                <div class="features-column col-lg-3 col-md-6 col-sm-6 col-xs-12">
                  <article class="inner-box">
                      <div class="icon-box">
                          <div class="icon"><span class="flaticon-medical"></span></div>
                            <h3 class="title">ডাক্তার দেখানো ফ্রী</h3>
                        </div>
                    </article>
                </div>

                <!--Feature Column-->
                <div class="features-column col-lg-3 col-md-6 col-sm-6 col-xs-12">
                  <article class="inner-box">
                      <div class="icon-box">
                          <div class="icon"><span class="flaticon-web"></span></div>
                            <h3 class="title">সময় বাঁচাতে</h3>
                        </div>
                    </article>
                </div>

                <!--Feature Column-->
                <div class="features-column col-lg-3 col-md-6 col-sm-6 col-xs-12">
                  <article class="inner-box">
                      <div class="icon-box">
                          <div class="icon"><span class="flaticon-location"></span></div>
                            <h3 class="title">হোম ডেলিভারি</h3>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>


    <!--Featured Fluid Section-->
    <section class="featured-fluid-section auto-container">
      <div class="outer clearfix">
        <!--Image Column-->
        <div class="image-column" style="background-image:url({{url('images/resource/doc.jpg')}});"></div>

        <!--Text Column-->
        <article class="column text-column dark-column wow fadeInRight" style="background-color: lightgray !important;" data-wow-delay="0ms" data-wow-duration="1500ms">

          <div class="content-box pull-left">
              <h2>কিভাবে অনলাইনে ডাক্তার দেখাবেন ?</h2>
            <div class="title-text"><span style="background-color: white; color: red; margin-right: 10px;" class="btn"> Help Line </span> +8801880162661</div>
              <div class="text">

                 <ul>
                   <li><a href="{{url('login')}}" target="_blank">রেজিস্ট্রেশন করুন।</a></li>
                   <li>রোগীর প্রফাইল তৈরী করুন।</li>
                   <li>ডাক্তার নির্বাচন করুন।</li>
                   <li>ডাক্তারের সাথে কথা বলুন।</li>
                   <li>ঘরে বসে ঔষুধ বুঝে নিন।</li>
                 </ul>

               </div>
              <a href="{{url('login')}}" class="theme-btn btn-style-two" target="_blank">রেজিস্ট্রেশন করুন</a>
              <a href="{{url('proccess-details')}}" class="theme-btn btn-style-two" target="_blank">বিস্তারিত দেখুন</a>
          </div>

          <div class="clearfix"></div>
        </article>
      </div>
    </section>


    <!--Medicine-->

<br>
<br>

    <!--Doctors -->
    <section>
            <div class="content-box auto-container">
                <div class="sec-title text-center">
                  <h2>আমাদের অভিজ্ঞ<span class="normal-font theme_color"> ডক্টর সমূহ</span></h2>
                  <div class="title-text">আমাদের রয়েছে অভিজ্ঞ ডাক্তার। যারা সর্বদা আপনার সেবায় নিয়যিত।</div>
                </div>

                <div class="col-sm-12">
                  <div class="row">
                    <?php include_once('xhtml/doctor.htm');?>
                  </div>
                </div>

            </div>

            <div class="clearfix"></div>
    </section>


    <!--Blog News Section-->
    <section class="blog-news-section latest-news">
      <div class="auto-container">

        <div class="sec-title text-center">
              <h2>সাম্প্রতিক <span class="normal-font theme_color"> ব্লগ</span></h2>
          </div>

        <div class="row clearfix">

          <?php include_once('xhtml/blog.htm')?>

        </div>

      </div>
    </section>


    <!--Testimonials-->
    <section class="testimonials-section">
      <div class="auto-container">

        <div class="sec-title text-center">
              <h2>সেবা টি সম্পর্কে<span class="normal-font theme_color"> মতামত</span></h2>
          </div>
          <!--Slider-->
        <div class="testimonials-slider testimonials-carousel">

          <?php include_once('xhtml/testmonials.htm')?>

        </div>

      </div>
    </section>


    <!--News Events Section-->
    <section class="events-section latest-events">
      <div class="auto-container">
        <div class="sec-title text-center">
            <h2>নিউজ    <span class="normal-font theme_color">ইভেন্ট</span></h2>
        </div>

        <div class="row clearfix">

              <!--Featured Column-->
              <?php include_once('xhtml/featured-news.htm');?>

              <!--Cause Column-->
              <div class="column default-featured-column links-column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <article class="inner-box">
                  <div class="vertical-links-outer">
                    <?php include_once('xhtml/side-news.htm');?>

                  </div>
                </article>
              </div>

          </div>
      </div>
    </section>



    <!--Intro Section-->
    <section class="subscribe-intro">
      <div class="auto-container">
        <div class="row clearfix">
          <!--Column-->
          <div class="column col-md-5 col-sm-12 col-xs-12">
            <h2>সর্বশেষ আপডেট পেতে</h2>
              আমাদের সর্বশেষ আপডেট পেতে সাবস্ক্রাইব করুন
          </div>
          <div class="column col-md-7 col-sm-12 col-xs-12">
            <div class="row">
              {!!Form::open(['url'=>'subscriber','method'=>'post'])!!}
                <div class="column col-md-8 col-sm-12 col-xs-12">


                  {{ Form::label('', '') }}
                  {{ Form::email('email',old("email"),['class'=>'form-control','placeholder'=>'আপনার ই-মেইল','required'])}}

                  @if ($errors->has('email'))
                      <span class="help-block text-danger">
                           <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif              
                </div>
                <!--Column-->
                <div class="column col-md-4 col-sm-12 col-xs-12">
                  <div class="text-right padd-top-20">
                    {{Form::submit('সাবস্ক্রাইব করুন',['class'=>'theme-btn btn-style-one'])}}
                  </div>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>

      </div>
 
    </section>

@endsection

@push('scrits')

@endpush
