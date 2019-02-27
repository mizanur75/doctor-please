@extends('patient-dashboard.patient-home')
@section('heading','Profile')
@section('title','All Patient Profile')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
      <div class="row">
        <div class="col-sm-12 box">
          <div class="col-sm-9"><h2>All patient profile information</h2></div>
          <div class="col-sm-3"><a href="{{url('patient-profile'.'/create')}}" class="btn btn-info btn-block"><i class="fa fa-plus" aria-hidden="true"></i> Create New Patient Profile</a></div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 table-responsive">
          <table class='table table-striped table-bordered'>
            <thead>
              <tr>
                <th>ID</th>
                <th>Patient Image</th>
                <th>Patient Name</th>
                <th>Age</th>
                <th>BP</th>
                <th>Diabetus</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Edit</th>
                <th>Doctor</th>
                <th>Prescription</th>
              </tr>
            </thead>
            <tbody>
              @if(!empty($qItems))
              @foreach($qItems as $sItem)
              <tr>
                <td>{{$sItem->id}}</td>
                <td><img src="{{asset($sItem->profile_image)}}" class="img img-responsive" width="80" height="80" /></td>
                <td>{{$sItem->patient_name}}</td>
                <td>{{$sItem->age}} Years</td>
                <td>
                  @if($sItem->blood_pressure=='H')
                  <span class="text-danger">High</span>
                  @elseif($sItem->blood_pressure=='L')
                  <span class="text-warning">Low</span>
                  @elseif($sItem->blood_pressure=='N')
                  <span class="text-success">Normal</span>
                  @endif
                </td>
                <td>
                  @if($sItem->diabetus=='Y')
                  <span class="text-danger">Yes</span>
                  @elseif($sItem->diabetus=='N')
                  <span class="text-success">No</span>
                  @endif
                </td>
                <td>{{date("d M,Y", strtotime($sItem->created_at))}}</td>
                <td>{{date("d M,Y", strtotime($sItem->updated_at))}}</td>
                <td><a href="{{url('patient-profile',$sItem->id).'/edit'}}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"> Edit</i></a></td>
                <td><a href="{{url('patient-profile',$sItem->id)}}" class="btn btn-warning">See a Doctor</a></td>
                <td><a href="{{url('all-prescription',$sItem->id)}}" class="btn btn-success">All Prescriptions</a></td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          @if(!empty($qItems))
          {{ $qItems->links() }}
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
