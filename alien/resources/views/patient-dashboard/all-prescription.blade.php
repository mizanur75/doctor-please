@extends('patient-dashboard.patient-home')
@section('heading','Profile')
@section('title','All Prescription')
@section('content')

<div class="container">
  <div class="row">
    <div class="row">
      <div class="col-sm-12 box">
        <div class="col-sm-9"><h2>All Prescription of {{$qPatient_name->patient_name}}</h2></div>
      </div>
    </div>

    <div class="row">

      <div class="col-md-12 box mar-top10 academic">

        <table class='table table-responsive table-bordered'>
          <thead>
            <tr>
              <th>SL</th>
              <th>Doctor Name</th>
              <th style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sl = 1;
            ?>
            @if(!empty($qPatient_history))

            @foreach($qPatient_history as $sPatient_history)
            <tr>
              <td>{{$sl++}}</td>
              <td>{{$sPatient_history->dName}}</td>
              <td style="text-align: center;"><a href="{{url('prescription-by-date/'.$sPatient_history->phID)}}" class="btn btn-success">See a Prescription</a></td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
      {{$qPatient_history->links()}}
    </div>
  </div>
</div>

@endsection
