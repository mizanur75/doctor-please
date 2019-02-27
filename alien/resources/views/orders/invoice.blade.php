@extends('patient-dashboard.patient-home')
@section('heading','Invoice')
@section('title','Invoice')
@push('css')

@endpush
@section('content')
<div class="row text-right">
    <a charset="UTF-8" style="margin-right: 10px;" class="btn btn-info" href="{{url('pdf-invoice/'.$qOrder->id)}}">Download Invoice</a>
</div>
<br>
<div class="box">
    <table class="table table-sm">
        <tr>
            <td style="border: none !important;">
                <h3>{{$qOrder->name}}</h3>
                <span>{{$qOrder->phone}}</span><br>
                <span>{{$qOrder->address}}</span><br>
                <span>{{$qOrder->created_at}}</span>
            </td>
            <td class="text-right" style="border: none !important;">
              <h3 class="text-success" style="font-weight: bold;">GK Pharma (unani) LTD.</h3>
              <span>Rahman Bhaban (2nd), Amtoly More,</span><br>
              <span>103- Mohakhali (C/A), Dhaka - 1212.</span><br>
              <span>Cell: +8801880162661</span>
            </td>
        </tr>
    </table>

    <div class="row">
        <div class="col-sm-12 table-responsive">
            <h4>Order No: {{$qOrder->id}}</h4>
            <table class="table table-sm table-bordered">
                <thead>
                    <tr style="background-color: lightgray; font-weight: bold;">
                        <th>SL</th>
                        <th>Category</th>
                        <th>Prohuct Name</th>
                        <th>Qty</th>
                        <th>UoM</th>
                        <th class="text-center">Unit Price</th>
                        <th class="text-center">Line Total</th>
                    </tr>
                </thead>

                <?php
                $sl = 1;
                ?>
                <tbody>
                    @php($total = 0)
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

                        $lineTotal = $sInvoice->price * $sInvoice->qty;
                        $total+=$lineTotal;
                        ?>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5"></td>
                        <td class="text-right" style="font-weight: bold;">Total =</td>
                        <td class="text-right">{{$total}}/-</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row text-center" style="border-top:1px solid black;padding:5px;">
        This is computer generated Invoice.Generated by <a href="http://doctorplease.com.bd">doctorplease.com.bd</a>
    </div>
</div>
@endsection