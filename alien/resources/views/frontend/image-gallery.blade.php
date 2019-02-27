@extends('layouts.front.app')

@section('title', 'Image Gallery')

@push('css')



@endpush

@section('front')
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/page-title-bg.jpg);">
    	<div class="auto-container">
        	<div class="sec-title">
                <h1>Our <span class="normal-font">Gallery</span></h1>
                <div class="bread-crumb"><a href="index-2.html">Home</a> / <a href="#" class="current">Gallery</a></div>
            </div>
        </div>
    </section>


    <!--Gallery Section-->
    <section class="gallery-section">
        <div class="auto-container">

            <!--Filter-->
            <div class="filters text-center">
                <ul class="filter-tabs filter-btns clearfix anim-3-all">
                    <li class="active filter" data-role="button" data-filter="all">All</li>
                    <li class="filter" data-role="button" data-filter=".environment">Monthly Meeting</li>
                    <li class="filter" data-role="button" data-filter=".eco">Tour</li>
                    <li class="filter" data-role="button" data-filter=".energy">Research</li>
                    <li class="filter" data-role="button" data-filter=".animals">Animals</li>
                    <li class="filter" data-role="button" data-filter=".plants">Plants</li>
                </ul>
            </div>

            <!--Filter List-->
            <div class="row filter-list clearfix">

                <!--Column-->
                <div class="column mix mix_all eco plants col-md-4 col-sm-6 col-xs-12">
                    <!--Default Portfolio Item-->
                    <div class="default-portfolio-item">
                        <div class="inner-box text-center">
                            <!--Image Box-->
                            <figure class="image-box"><img src="images/gallery/image-1.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="inner-content">
                                    <div class="content">
                                        <h3><a href="#">Climate Change: Vital Signs of the Planet</a></h3>
                                        <a class="arrow lightbox-image" href="images/gallery/image-1.jpg" title="Image Caption Here"><span class="icon flaticon-cross-4"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column mix mix_all environment  energy animals col-md-4 col-sm-6 col-xs-12">
                    <!--Default Portfolio Item-->
                    <div class="default-portfolio-item">
                        <div class="inner-box text-center">
                            <!--Image Box-->
                            <figure class="image-box"><img src="images/gallery/image-2.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="inner-content">
                                    <div class="content">
                                        <h3><a href="#">Climate Change: Vital Signs of the Planet</a></h3>
                                        <a class="arrow lightbox-image" href="images/gallery/image-2.jpg" title="Image Caption Here"><span class="icon flaticon-cross-4"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Column-->
                <div class="column mix mix_all environment eco animals col-md-4 col-sm-6 col-xs-12">
                    <!--Default Portfolio Item-->
                    <div class="default-portfolio-item">
                        <div class="inner-box text-center">
                            <!--Image Box-->
                            <figure class="image-box"><img src="images/gallery/image-3.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="inner-content">
                                    <div class="content">
                                        <h3><a href="#">Climate Change: Vital Signs of the Planet</a></h3>
                                        <a class="arrow lightbox-image" href="images/gallery/image-3.jpg" title="Image Caption Here"><span class="icon flaticon-cross-4"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column mix mix_all environment eco energy animals plants col-md-4 col-sm-6 col-xs-12">
                    <!--Default Portfolio Item-->
                    <div class="default-portfolio-item">
                        <div class="inner-box text-center">
                            <!--Image Box-->
                            <figure class="image-box"><img src="images/gallery/image-4.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="inner-content">
                                    <div class="content">
                                        <h3><a href="#">Climate Change: Vital Signs of the Planet</a></h3>
                                        <a class="arrow lightbox-image" href="images/gallery/image-4.jpg" title="Image Caption Here"><span class="icon flaticon-cross-4"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Column-->
                <div class="column mix mix_all energy animals plants col-md-4 col-sm-6 col-xs-12">
                    <!--Default Portfolio Item-->
                    <div class="default-portfolio-item">
                        <div class="inner-box text-center">
                            <!--Image Box-->
                            <figure class="image-box"><img src="images/gallery/image-5.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="inner-content">
                                    <div class="content">
                                        <h3><a href="#">Climate Change: Vital Signs of the Planet</a></h3>
                                        <a class="arrow lightbox-image" href="images/gallery/image-5.jpg" title="Image Caption Here"><span class="icon flaticon-cross-4"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--Column-->
                <div class="column mix mix_all environment eco energy animals plants col-md-4 col-sm-6 col-xs-12">
                    <!--Default Portfolio Item-->
                    <div class="default-portfolio-item">
                        <div class="inner-box text-center">
                            <!--Image Box-->
                            <figure class="image-box"><img src="images/gallery/image-6.jpg" alt=""></figure>
                            <div class="overlay-box">
                                <div class="inner-content">
                                    <div class="content">
                                        <h3><a href="#">Climate Change: Vital Signs of the Planet</a></h3>
                                        <a class="arrow lightbox-image" href="images/gallery/image-6.jpg" title="Image Caption Here"><span class="icon flaticon-cross-4"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script src="{{asset('js/mixitup.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>

@endpush

    

