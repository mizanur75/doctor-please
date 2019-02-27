@extends('admin-dashboard.home')
@section('heading','Pending Order Information')
@section('content')

<div class="col-md-12">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      <div class="col-md-3">
        <h4>Pending Order List <a href="" style="margin-left: 10px;"> <i class="fa fa-refresh" aria-hidden="true"></i></a></h4>
      </div>
      {!!Form::open(['url'=>'search-by-order-id','method'=>'post', 'enctype'=>'multipart/form-data'])!!}
      <div class="col-sm-2">
        <div class="row">
          {{Form::text('txtOrderId','', ['class'=>'form-control','placeholder' => 'Input Order ID'])}}
        </div>
      </div>
      <div class="col-sm-2">
        <div class="row">
          {{Form::submit('Search',['class'=>'submit btn btn-info'])}}
        </div>
      </div>

      {!! Form::close() !!}
      <div class="col-sm-3">
        <a href="{{url('pending-order')}}" class="btn btn-md btn-primary"><i class="fa fa-refresh"></i> Pending Order ({{$qPendingOrderCount}})</a>
      </div>
      <div class="col-sm-2">
        <a href="{{url('waiting-order')}}" class="btn btn-md btn-danger"><i class="fa fa-refresh"></i> Waiting Order  ({{$qWaitingOrderCount}})</a>
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
        <span class="bold text-primary">Total number of Pending Order </span> ({{$qPendingOrder->total()}})
        <table class="table-striped" style="width:100%;">
          <tr>
            <td style="width: 10%; text-align: center;">Order ID</td>
            <td style="width: 20%; text-align: center;">Name</td>
            <td style="width: 7%; text-align: center;">Phone</td>
            <td style="width: 18%; text-align: center;">Order Date</td>
            <td style="width: 37%; text-align: center;">Shipping Address</td>
            <td style="width: 4%; text-align: center;">Status</td>
            <td style="width: 4%; text-align: center;">Details</td>
          </tr>
          @php($sl=1)
          @if(!empty($qPendingOrder))
          @foreach($qPendingOrder as $sPendingOrder)
          <tr>
            <td style=" text-align: center;">{{$sPendingOrder->id}}</td>
            <td style=" text-align: center;">{{$sPendingOrder->name}}</td>
            <td style=" text-align: justify;">{{$sPendingOrder->phone}}</td>
            <td style=" text-align: center;">{{$sPendingOrder->created_at}}</td>
            <td style=" text-align: justify;">{{$sPendingOrder->address}}</td>
            <td style=" text-align: center;">
              @if($sPendingOrder->is_deliver=='Y')
              <button class="btn btn-sm btn-success">Delivered</button>
              @elseif($sPendingOrder->is_deliver=='N')
              <button class="btn btn-sm btn-primary">Pending</button>
              <!-- <i class="fa fa-close text-danger"></i> -->
              @endif
            </td>
            <td style=" text-align: center;">
              <a href="{{url('invoice-details-by-order-id', $sPendingOrder->id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
            </td>
          </tr>

          @endforeach
          @endif
        </table>
        @if(!empty($qPendingOrder))
          {{ $qPendingOrder->links() }}
        @endif
      </div>

    </div>
  </div>
</div>

@endsection
