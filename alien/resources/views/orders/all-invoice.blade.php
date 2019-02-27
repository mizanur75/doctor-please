@extends('patient-dashboard.patient-home')
@section('heading','All Invoice')
@section('title','All Invoice')
@push('css')

@endpush
@section('content')

<div class="container">
  <div class="row">
    <div class="row">
      <div class="col-sm-12 box">
        <div class="col-sm-9"><h2>All Invoice of {{Auth::user()->name}}</h2></div>
      </div>
    </div>

    <div class="row">

      <div class="col-md-12 box mar-top10 academic">

        <table class='table table-responsive table-bordered'>
          <thead>
            <tr>
              <th>SL</th>
              <th>Order ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Order Date/Time</th>
              <th>Status</th>
              <th style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sl = 1;
            ?>
            @if(!empty($qAllInvoice))

            @foreach($qAllInvoice as $sAllInvoice)
            <tr>
              <td>{{$sl++}}</td>
              <td>{{$sAllInvoice->id}}</td>
              <td>{{$sAllInvoice->name}}</td>
              <td>{{$sAllInvoice->phone}}</td>
              <td>{{$sAllInvoice->address}}</td>
              <td>{{$sAllInvoice->created_at}}</td>
              <td>
                @if($sAllInvoice->is_deliver=='Y')
                <button class="btn btn-sm btn-success">Delivered</button>
                @elseif($sAllInvoice->is_deliver=='N')
                <button class="btn btn-sm btn-danger">Pending</button>
                <!-- <i class="fa fa-close text-danger"></i> -->
                @endif
              </td>
              <td style="text-align: center;"><a href="{{url('invoice-by-order-id/'.$sAllInvoice->id)}}" class="btn btn-primary">Invoice Details</a></td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
	{{$qAllInvoice->links()}}
    </div>
  </div>
</div>

@endsection