@extends('layouts.front.app')

@section('title', 'Proccess Details')


@section('front')

<!--Team Section-->
<section class="team-section">
    <div class="auto-container">
      
		<div class="container">
		  <div class="row">
		    <div class="col-sm-8 col-xs-12">
		      <div class="row">
		         <div class="col-sm-12">
		             <h2 class="box text-center">কিভাবে আপনি একজন ডাক্তার দেখাতে পারেন।  </h2>
		         </div>
		       </div>

		       <div class="row" style="margin: 0;margin-bottom: 20px; font-size: 1.2em;">
		           <div class="col-md-12 box mar-top10 academic" align="center">
		               <h3>প্রথম ধাপ</h3>
		               <span>
		               প্রথমে “<a href="{{url('login')}}" target="_blank">See a Doctor</a>” অথবা “<a href="{{url('login')}}" target="_blank">রেজিস্ট্রেশন</a>” বাটন এ চাপুন। আপনি যদি নতুন ব্যাবহারকারী হন তাহলে নাম, ই-মেইল, ফোন নম্বর, পাসওয়ার্ড ও কনফার্ম পাসওয়ার্ড দিয়ে রেজিস্ট্রেশন সমপন্ন করুন। আর আপনি যদি আগে রেজিস্ট্রেশন করে থাকেন তাহলে ই-মেইল ও পাসওয়ার্ড দিয়ে <a href="{{url('login')}}" target="_blank">লগইন</a> করুন।</span>
		               <br>
		           </div>

		           <div class="col-md-12 box mar-top10 academic" align="center">
		             <h3>দ্বিতীয়  ধাপ</h3>
		             <p>তারপর Patient মেনু তে যান। Patietn Profile এ চাপুন। তারপর Create New Patient এ চাপুন। এখানে যে রোগী তার সকল তথ্য দিন এবং আপনি কিসের মাধ্যমে ডাক্তারের সাথে কথা বলতে চান তা দিন। এরপর Submit বোতাম এ চাপুন। <br>যেমনঃ আপনি যদি Skype কথা বলতে চান তাহলে আপনার Skype আইডি দিন। আর যদি ফোনে কথা বলতে চান তাহলে ফোন নম্বর দিন। </p>
		           </div>

		           <div class="col-md-12 box mar-top10 academic" align="center">
		             <h3>তৃতীয় ধাপ</h3>
		             <span>এরপর “See a Doctor” এ চাপুন। এখন ডাক্তারের তালিকা দেখতে পারবেন। আপনি কোন ডাক্তার কে দেখাতে  এবং কথা বলার মাধ্যম (পূর্বে যে কথা বলার মাধ্যম নির্বাচন করেছিলেন) নির্বাচন করে Send Request এ চাপুন। এখন আপনার কাঙ্ক্ষিত ডাক্তার আপনার রেকুয়েষ্ট টি গ্রহন করা পর্যন্ত অপেক্ষা করুন।</span>
		           </div>

		           <div class="col-md-12 box mar-top10 academic" align="center">
		             <h3>চতুর্থ ধাপ</h3>
		             <span>আপনার রেকুয়েষ্ট টি গ্রহন করলে আপনি ডাক্তারকে ফোন করুন এবং ডাক্তারের পরামর্শ নিন।</span>
		           </div>
		       </div>
		    </div>

		    <div class="col-sm-4 col-xs-12">
		      <div class="col-md-12 box academic" align="center">
		          <a href="{{asset('images/pdf/proccess.pdf')}}" target="_blank"><i class="fa fa-file-pdf-o" style="font-size: 70px;color: #3C5487;"></i></a>
		          <br>
		          <br>
		          <a href="{{asset('images/pdf/proccess.pdf')}}" target="_blank"><h4><i class="fa fa-download" aria-hidden="true"></i> Download full information</h4></a>
		      </div>
		    </div>
		  </div>
		</div>

        </div>
    </section>

@endsection