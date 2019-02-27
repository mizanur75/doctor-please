@extends('admin-dashboard.home')
@section('heading','Order Information')
@section('content')

<div class="col-md-12">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      <div class="col-md-4">
        <h4>Order List</h4>
      </div>
    </div>

    <?php
    $total=0;
    foreach($qTotal as $sTotal){
      $linetotal = $sTotal->price * $sTotal->qty;
      $total += $linetotal;
    }
    ?>

    <div class="col-md-12 panel-body padding-bottom30">
      <div class="col-md-12">
        <span class="bold text-primary">Total Amount =</span> {{$total}}/-
        <table class="table-striped" style="width:100%;">
          <tr>
            <td style="width: 10%; text-align: center;">Order ID</td>
            <td style="width: 20%; text-align: center;">Name</td>
            <td style="width: 10%; text-align: center;">Phone</td>
            <td style="width: 15%; text-align: center;">Order Date</td>
            <td style="width: 37%; text-align: center;">Shipping Address</td>
            <td style="width: 4%; text-align: center;">Status</td>
            <td style="width: 4%; text-align: center;">Details</td>
          </tr>
          <tr>
            <td style=" text-align: center;">{{$qAllInvoice->id}}</td>
            <td style=" text-align: center;">{{$qAllInvoice->name}}</td>
            <td style=" text-align: justify;">{{$qAllInvoice->phone}}</td>
            <td style=" text-align: center;">{{$qAllInvoice->created_at}}</td>
            <td style=" text-align: justify;">{{$qAllInvoice->address}}</td>
            <td style=" text-align: center;">
              @if($qAllInvoice->is_deliver=='Y')
              <button class="btn btn-sm btn-success">Delivered</button>
              @elseif($qAllInvoice->is_deliver=='N')
              <button class="btn btn-sm btn-primary">Pending</button>
              <!-- <i class="fa fa-close text-danger"></i> -->
              @endif
            </td>
            <td style=" text-align: center;">
              <a href="{{url('invoice-details-by-order-id', $qAllInvoice->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
            </td>
          </tr>
        </table>
      </div>

    </div>
  </div>
</div>

@endsection
