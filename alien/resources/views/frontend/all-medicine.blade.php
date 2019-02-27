@extends('layouts.front.app')

@section('title', 'All Medicine')


@section('front')

    <section class="page-title" style="background-image:url({{url('images/background/page-title-bg.jpg')}});">
    	<div class="auto-container">
        	<div class="sec-title">
                <h1>All Medicine</h1>
            </div>
        </div>
    </section>

    <br />

    <div class="container">

        <div class="row">
          <?php $i = 0;?>
          <div class="row">
            @foreach($qAll_medicine as $sMedicine)
            <div class="col-lg-3 col-md-6 col-xs-12 text-center">
              <div class="medicen-details">
                <a href="{{url('medicine-details/'.$sMedicine->url)}}">
                <img src="{{asset($sMedicine->product_small_image)}}" title="{{$sMedicine->productName}}" alt="{{$sMedicine->productName}}" class="img-responsive mb-3">
                <hr>
                <h5 class="medicine-title">{{$sMedicine->productName}}</h5>
                </a>
                <?php echo $sMedicine->productBrief;?>
                <a href="{{url('medicine-details/'.$sMedicine->url)}}"><span class="btn btn-warning mb-10">View Details <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
              </div>
            </div>

            <?php $i++;?>
            @if($i % 4 == 0)
            </div><br />
            <div class="row">
            @endif

            @endforeach
            
          </div>
          {{$qAll_medicine->links()}}
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

@endsection
