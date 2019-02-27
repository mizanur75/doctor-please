@extends('layouts.front.app')

@section('title', 'Contact Us')

@push('css')



@endpush

@section('front')
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
                		<h1 class="margin-bott-20">আমাদের ঠিকানা</h1>
                        <div class="text margin-bott-40">আমাদের সাথে সরাসরি যোগাযোগ করতে চাইলে </div>
                        <ul class="info-box">
                            <li><span class="icon flaticon-location"></span><strong>ঠিকানা</strong> Rahman Bhaban, 103 - Mohakhali C/A, (Amtoly Moor) Dhaka-1212</li>
                            <li><span class="icon flaticon-technology-5"></span><strong>Phone</strong> +8801880162661</li>
                            <li><span class="icon flaticon-interface-1"></span><strong>Email</strong> doctorpleasebd6@gmail.com</li>
                        </ul>
                    </article>
                </div>

                <!--Image Column-->
                <div class="column image-column col-lg-7 col-md-6 col-sm-12 col-xs-12">
                	<article class="inner-box">
                		<figure class="image-box"><img src="{{asset('images/resource/team-image-3.jpg')}}" alt=""></figure>
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
                <div class="column map-column col-lg-7 col-md-6 col-sm-12 col-xs-12">
                	<h2>গুগল ম্যাপে আমাদের অবস্থান</h2>

                	<article class="inner-box">
                		<!--Map Container-->
                        <div class="map-container">
                            <!--Map Canvas-->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0607124940357!2d90.39705611494763!3d23.780852284574348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7375fec7b05%3A0x707eb1a9d25707f4!2sGK+Pharma+LTD.!5e0!3m2!1sen!2sbd!4v1540094006458" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                        </div>
                    </article>
                </div>

                <!--Form Column-->
                <div class="column form-column col-lg-5 col-md-6 col-sm-12 col-xs-12">
                	<h2>আমাদেরকে মেসেজ করুন</h2>
                	<!--COntact Form-->
                	<div class="inner-box contact-form">
                    	<form method="post" action="http://world5.commonsupport.com/html/greenture-new/sendemail.php" id="contact-form">
                        	<div class="row clearfix">
                            	<!--Form Group-->
                                <div class="form-group col-md-6 col-xs-12">
                                	<input type="text" name="username" value="" placeholder="আপনার নাম">
                                </div>
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-xs-12">
                                	<input type="text" name="email" value="" placeholder="আপনার ই-মেইল">
                                </div>
                                <!--Form Group-->
                                <div class="form-group col-md-12 col-xs-12">
                                	<textarea name="message" placeholder="আপনার বক্তব্য"></textarea>
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
@endsection

@push('scripts')

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('js/jquery.fancybox-media.js')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script src="{{asset('js/map-script.js')}}"></script>
<script src="{{asset('js/validate.js')}}"></script>
<script src="{{asset('js/mixitup.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

@endpush
