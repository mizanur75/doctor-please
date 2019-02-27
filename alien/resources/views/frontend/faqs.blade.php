@extends('layouts.front.app')

@section('title', 'FAQ')


@section('front')
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/page-title-bg.jpg);">
    	<div class="auto-container">
        	<div class="sec-title">
                <h1>FAQ</h1>
                <div class="bread-crumb"><a href="{{url('/')}}">Home</a> / <a href="#" class="current">FAQs</a></div>
            </div>
        </div>
    </section>


    <!--404 Section-->
    <section class="faqs-section">
    	<div class="auto-container">
        	<div class="sec-title text-center small-container padd-bott-30">
            	<h3 class="bigger-text">সাধারণ প্রশ্ন</h3>
            </div>

        	<div class="row clearfix">

                <div class="col-md-6 col-sm-12 col-xs-12">

                    <!--Accordion Box-->
                    <div class="accordion-box">
                        <!-- Accordion -->
                        <div class="accordion accordion-block">
                            <div class="accord-btn"><h4>এটা কি সম্পূর্ণ অনলাইন ভিত্তিক ?</h4></div>
                            <div class="accord-content">
                                <p>উত্তর: হ্যাঁ, এখানে সম্পূর্ণ অনলাইন এ সেবা দেওয়া হয়।</p>
                            </div>
                        </div>
                        <div class="accordion accordion-block">
                            <div class="accord-btn"><h4>অনলাইনে ডাক্তার দেখানো কি ফ্রি ?</h4></div>
                            <div class="accord-content">
                                <p>উত্তর: হ্যাঁ অনলাইনে ডাক্তার দেখানো সম্পূর্ণ ফ্রি।</p>
                            </div>
                        </div>
                        <!-- Accordion -->
                        <div class="accordion accordion-block">
                            <div class="accord-btn"><h4>আমি চাইলে সরাসরি ডাক্তারের সাথে দেখা করতে পারবো কি না ?</h4></div>
                            <div class="accord-content">
                                <p>উত্তর:  হ্যাঁ, আপনি চাইলে সরাসরি আমাদের ডাক্তারের সাথে দেখা করতে পারবেন ।</p>
                            </div>
                        </div>
                        <!-- Accordion -->
                        <div class="accordion accordion-block">
                            <div class="accord-btn"><h4>যদি আমি সরাসরি ডাক্তারের সাথে দেখা করতে চাই তাহলে কি আমাকে ফি দিতে হবে?</h4></div>
                            <div class="accord-content">
                                <p>উত্তর:  না এ ক্ষেত্রে আপনাকে ডাক্তার দেখানোর জন্য কোন ফি বা ভিজিট পরিশোধ করতে হবে না।</p>
                            </div>
                        </div>
                        
                    </div>

                </div>

                <div class="col-md-6 col-sm-12 col-xs-12">

                    <!--Accordion Box-->
                    <div class="accordion-box">
                        <!-- Accordion -->
                        <div class="accordion accordion-block">
                            <div class="accord-btn"><h4>যদি আমি অনলাইনে সেবা নেই তাহলে ঔষুধ কোথায় পাবো ?</h4></div>
                            <div class="accord-content">
                                <p>উত্তর:  আপনি চাইলে অনলাইনে ঔষুধ অর্ডার করতে পারবেন। এ ক্ষেত্রে আপনাকে ঔষুধের জন্য কোন ডেলিভারী চার্জ পরিশোধ করতে হবে না। অথবা আপনি চাইলে আপনার নিকটস্থ কোন ফার্মেসী থেকে নিতে পারবেন যেখানে জিকে ফার্মা এর ঔষুধ পাওয়া যায়। </p>
                            </div>
                        </div>
                        <!-- Accordion -->
                        <div class="accordion accordion-block">
                            <div class="accord-btn"><h4>যদি আমি অনলাইনে ঔষুধ অর্ডার দেই তাহলে টাকা পাঠাবো কিভাবে ? </h4></div>
                            <div class="accord-content">
                                <p>উত্তর:  ঔষুধ নেয়ার সময় টাকা দিয়ে ঔষুধ নিতে হবে। </p>
                            </div>
                        </div>
                        <div class="accordion accordion-block">
                            <div class="accord-btn"><h4> আমি কি ডাক্তার দেখানো ছাড়া ঔষুধ নিতে পারবো? </h4></div>
                            <div class="accord-content">
                                <p>উত্তর:  হ্যাঁ। আপনি চাইলে ডাক্তাত দেখানো ছাডাও ঔষুধ অর্ডার করতে পারবেন।</p>
                            </div>
                        </div>
                        <!-- Accordion -->
                        
                    </div>

                </div>


            </div>
    	</div>
    </section>

@endsection