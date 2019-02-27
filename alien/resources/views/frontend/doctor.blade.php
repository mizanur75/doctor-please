@extends('layouts.front.app')

@section('title', 'Our Doctor')

@section('front')

    <section class="page-title" style="background-image:url({{url('images/background/page-title-bg.jpg')}});">
    	<div class="auto-container">
        	<div class="sec-title">
                <h1>Our <span class="normal-font">Doctors</span></h1>
                <div class="bread-crumb"><a href="{{url('our-doctors')}}">Doctors</a> / <a href="" class="current">Our Doctors</a></div>
            </div>
        </div>
    </section>

    <section class="team-section">
        <div class="text-center sec-title">
            <h1>আমাদের ডাক্তার সমূহ</h1>
            <p> আমাদের অভিজ্ঞ ডাক্তার সমূহ প্রস্তুত রয়েছে আপনার সেবায় । </p>
        </div>
        <div class="auto-container">


            <div class="row clearfix">

                @foreach($qItems as $sItem)
                <article class="column team-member col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image"><a href="{{url('doctors-profile/'.$sItem->id)}}"><img src="{{asset($sItem->image_path)}}" alt="{{$sItem->name}}" title="{{$sItem->name}}"></a></figure>
                        <div class="member-info">
                            <h3>{{$sItem->name}}</h3>
                            <div class="designation">{{$sItem->degree}}</div>
                        </div>
                        <div class="content">
                            <div class="text"><p>{{$sItem->about}}</p></div>
                        </div>
                    </div>
                </article>
                @endforeach

            </div>

        </div>
    </section>

@endsection