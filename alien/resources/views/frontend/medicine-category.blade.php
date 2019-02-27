@extends('layouts.front.app')

@section('title', $sCatName)


@section('front')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{url('images/background/page-title-bg.jpg')}});">
    	<div class="auto-container">
        	<div class="sec-title">
                <h1>{{$sCatName}}</h1>
                <div class="bread-crumb"><a href="">medicine</a> / <a href="" class="current">{{$sCatName}}</a></div>
            </div>
        </div>
    </section>

    <br />

    <div class="container">

        <div class="row">
          <?php $i = 0;?>
          <div class="row">
            @foreach($qItems as $sItem)
            <div class="col-lg-3 col-md-6 col-xs-12 text-center">
              <div class="medicen-details">
                <a href="{{url('medicine-details/'.$sItem->url)}}">
                <img src="{{asset($sItem->product_small_image)}}" title="{{$sItem->productName}}" alt="{{$sItem->productName}}" class="img-responsive mb-3">
                <hr>
                <h5 class="medicine-title">{{$sItem->productName}}</h5>
                </a>
                <?php echo $sItem->productBrief;?>
                <a href="{{url('medicine-details/'.$sItem->url)}}"><span class="btn btn-warning mb-10">বিস্তারিত দেখুন <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
              </div>
            </div>

            <?php $i++;?>
            @if($i % 4 == 0)
            </div><br />
            <div class="row">
            @endif

            @endforeach

            
          </div>
          {{$qItems->links()}}
        </div>
        <br /><br />

        <hr class="row"/>

        <div class="row">
          <div class="col-lg-3 benefit_col">
            <div class="benefit_item d-flex flex-row align-items-center">
              <div class="benefit_icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
              <div class="benefit_content">
                <h6>Talk to Doctor</h6>
              </div>
            </div>
          </div>
          <div class="col-lg-3 benefit_col">
            <div class="benefit_item d-flex flex-row align-items-center">
              <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
              <div class="benefit_content">
                <h6>Home Delivery</h6>
              </div>
            </div>
          </div>

          <div class="col-lg-3 benefit_col">
            <div class="benefit_item d-flex flex-row align-items-center">
              <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
              <div class="benefit_content">
                <h6>Cash on Delivery</h6>
              </div>
            </div>
          </div>

          

          <div class="col-lg-3 benefit_col">
            <div class="benefit_item d-flex flex-row align-items-center">
              <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
              <div class="benefit_content">
                <h6>Opening all week</h6>
                <p>9.30 AM - 5.30 PM</p>
              </div>
            </div>
          </div>

        </div>

    </div>

    <br />

@endsection