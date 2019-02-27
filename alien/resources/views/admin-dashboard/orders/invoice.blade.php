@extends('admin-dashboard.home')
@section('heading','Order Details/Invoice')
@section('content')

<div class="col-md-12">
  
  <div class="col-md-12 panel" style="padding: 20px;">
    <div class="row text-right">
      <buttonm onclick="printDiv()" class="btn"><i class="fa fa-print"></i> Print</button>
    </div>
    <div id="printDiv">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <td style="border: none !important;">
                <h3>{{$qOrder->name}}</h3>
                <h5>{{$qOrder->phone}}</h5>
                <h5>{{$qOrder->address}}</h5>
                @php($date = strtotime($qOrder->created_at))
                <p>{{date('d-m-Y',$date)}} 
                  @if($qOrder->is_deliver=='Y')
                    <span class="badge badge-success">Success</span>
                  @elseif($qOrder->is_deliver=='N')
                  {!!Form::open(['url'=>['deliver',$qOrder->id],'method'=>'put'])!!}
                      {{Form::submit('Confirm',['class'=>'btn btn-sm btn-danger'])}}
                  {!!Form::close()!!}
                  @endif
                </p>
                
            </td>
            <td class="text-right" style="border: none !important;">
              <h3 class="text-success" style="font-weight: bold;">GK Pharma (unani) LTD.</h3>
              <h5>Rahman Bhaban (2nd), Amtoly More,</h5>
              <h5>103- Mohakhali (C/A), Dhaka - 1212.</h5>
              <h5>Cell: +8801880162661</h5>
            </td>
          </tr>
        </table>
        <div class="col-md-6 text-right">
          
        </div>
      </div>

      <div class="table-responsive">
        <h4>Order No: {{$qOrder->id}}</h4>
        <table class="table table-sm table-bordered table-striped">
          <thead>
            <tr>
              <th>SL</th>
              <th>Category</th>
              <th>Product Name</th>
              <th>Qty</th>
              <th>UoM</th>
              <th class="text-center">Unite Price</th>
              <th class="text-center">Line Total</th>
            </tr>
          </thead>
          @php($sl=1)
          @php($total=0)
          @foreach($qInvoice as $sInvoice)
          <tr>
            <td>{{$sl++}}</td>
            <td>{{$sInvoice->catName}}</td>
            <td>{{$sInvoice->proName}}</td>
            <td>{{$sInvoice->qty}}</td>
            <td>{{$sInvoice->meName}}</td>
            <td class="text-right">{{$sInvoice->price}}/-</td>
            <td class="text-right">{{$sInvoice->price * $sInvoice->qty}}/-</td>
            <?php
              $linetotal = $sInvoice->price * $sInvoice->qty;
              $total += $linetotal;
            ?>
          </tr>
          @endforeach
          <tfoot>
            <tr>
              <td colspan="5"></td>
              <td class="text-right" style="font-weight: bold;">Total=</td>
              <td class="text-right">{{$total}}/-</td>
            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </div>
</div>

<script>
  function printDiv() {
    var divToPrint=document.getElementById('printDiv');

    var newWin=window.open('','Print-Window');

    newWin.document.open();

    newWin.document.write('<html>'+
      '<head>'+
        '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">'+
        '<link href="http://doctorplease.com.bd/css/dashboard-style.css" rel="stylesheet">'+
        '<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css"/>'+
      '</head>'+
      '<body onload="window.print()" id="mimin" class="container dashboard">'+divToPrint.innerHTML+
      '</body>'+
      '</html>');

    newWin.document.close();

    setTimeout(function(){newWin.close();},10);
  }
</script>
@endsection

