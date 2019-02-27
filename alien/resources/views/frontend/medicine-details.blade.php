@extends('layouts.front.app')

@section('title', $qItems->name)


@section('front')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('images/background/page-title-bg.jpg')}});">
    	<div class="auto-container">
        	<div class="sec-title">
                <h1>{{$qItems->name}}</h1>
                <div class="bread-crumb"><a href="">medicine</a> / <a href="" class="current">{{$qItems->name}}</a></div>
            </div>
        </div>
    </section>

    <br />

    <div class="container">

      <div class="row">
        <div class="col-sm-5" style="border:2px solid #f5f5f5;">
          <img src="{{url($qItems->image)}}" class="img-responsive" title="" alt="" />
        </div>

        <div class="col-sm-7">
          <h2 class="exbold">{{$qItems->name}}</h2>
          <?php echo $qItems->brief;?>
          <div class="col-sm-12">
            <div class="row mb-4">
                <ul>
                  <li><strong>Category :</strong> {{$qItems->category}}</li>
                </ul>
            </div>

            <!-- <div class="row mt-15 mb-15">
              <div class="col-xs-2 col-sm-2">
                <input step="1" min="1" max="100" name="quantity" value="1" title="Qty" class="form-control" pattern="[0-9]*" inputmode="numeric" type="number">
              </div>
              <div class="col-xs-8 col-sm-8">
                <button type="submit" class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"> Add to cart</i></button>
              </div>
            </div> -->

          </div>

        </div>
      </div>

      <hr class="row mt-15 mb-15"/>

      
        <!-- Product Details -->

        <div class="row">
          <div class="col-md-9" style="font-size:1.2em;">
            <?php echo $qItems->details;?>
          </div>
          <div class="col-lg-3">
            <!-- Sidebar-->
          </div>
        </div>

        <!-- End Product Details -->
        <div class="text-center" style="background-color:#f5f5f5;padding:10px;">

          <h3><i class="fa fa-eye" aria-hidden="true"></i> Related Medicine</h3>
        </div>
    <div class="col-sm-12">
        <hr class="row mt-15 mb-15"/>

        <div class="row">
          @foreach($qProducts as $sProduct)
          <div class="col-lg-3 col-md-6 col-xs-12 text-center">
            <div class="medicen-details">
              <img src="{{asset($sProduct->image)}}" title="" alt="" class="img-responsive mb-3">
              <hr>
              <h4>{{$sProduct->name}}</h4>
              <?php echo $sProduct->brief;?>
              <a href="{{url('medicine-details/'.$sProduct->url)}}"><span class="btn btn-warning mb-2">বিস্তারিত দেখুন <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
              <br /><br />
            </div>
          </div>
          @endforeach

        </div>

        <hr class="row mt-15 mb-15"/>

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

    </div>

    <br />

@endsection