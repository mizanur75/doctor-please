@extends('layouts.front.app')

@section('title', $qItems->name)


@section('front')

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
                                <div class="designation">{{$qItems->degree}}</div>
                            </div>

                            <!--Fact Counter-->
                            <!-- <div class="fact-counter">

                                <div class="row clearfix">
                                    
                                    <article class="col-md-4 col-sm-4 col-xs-12 column wow fadeIn" data-wow-duration="0ms">
                                    	<div class="inner">
                                            <div class="icon"><span class="flaticon-cup-1"></span></div>
                                            <h4 class="counter-title">TEAM Awards</h4>
                                            <div class="count-outer"><span class="count-text" data-speed="1000" data-stop="05">0</span></div>
                                         </div>
                                    </article>

                                    
                                    <article class="col-md-4 col-sm-4 col-xs-12 column wow fadeIn" data-wow-duration="0ms">
                                    	<div class="inner">
                                            <div class="icon"><span class="flaticon-favorite-1"></span></div>
                                            <h4 class="counter-title">Complete Project</h4>
                                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="25">0</span></div>
                                        </div>
                                    </article>

                                    
                                    <article class="col-md-4 col-sm-4 col-xs-12 column wow fadeIn" data-wow-duration="0ms">
                                    	<div class="inner">
                                            <div class="icon"><span class="flaticon-food-2"></span></div>
                                            <h4 class="counter-title">Research</h4>
                                            <div class="count-outer"><span class="count-text" data-speed="2500" data-stop="1200">0</span></div>
                                        </div>
                                    </article>

                                </div>
                            </div> -->

                            <div class="content">
                                <div class="text no-border no-padd-bottom">{{$qItems->about}}</div>
                                <ul class="info-list text">
                                	<li><strong>Degrees</strong> {{$qItems->degree}}</li>
                                    <li><strong>Experience</strong> 12 years of Experience</li>
                                    <li><strong>Training</strong> {{$qItems->training}}</li>
                                    <li><strong>Work days</strong> Saturday - Thurstday (9.30 am- 5.30 pm)</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </section>


@endsection