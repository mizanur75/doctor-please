@extends('doctor-dashboard.doctor-home')
@section('heading','Manage Patients Information')
@section('title',' Patients Information > Patients Waiting List')
@section('content')

<div class="form-element">

  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-heading">
          @if(session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('msg')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
         <h4>Patients Waiting List - <a href=""><i class="fa fa-refresh" aria-hidden="true"> Relod </i></a> </h4>
        </div>
         <div class="panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <table class="table table-bordered">

              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Blood</th>
                  <th>Others</th>
                  <th>Problem</th>
                  <th>Type</th>
                  <th>Request Date</th>
                  <th>Last Meet</th>
                  <th>Accept</th>
                </tr>
              </thead>
              @if(!empty($qItems))
              @foreach($qItems as $sItem)
              <tbody>
                <tr>
                  <td>{{$sItem->id}}</td>
                  <td><img src="{{asset($sItem->profile_image)}}" class="img img-flowied" width="100" height="100"/></td>
                  <td>
                    {{$sItem->patient_name}}<br />
                    @if($sItem->gender=='M')
                    Gender : <span class="text-info">Male</span>
                    @elseif($sItem->gender=='F')
                    Gender : <span class="text-info">Female</span>
                    @elseif($sItem->gender=='O')
                    Gender : <span class="text-worning">Other</span>
                    @endif
                    <br />
                    Age : {{$sItem->age}} Years<br />
                    Weight : {{$sItem->weight}} KG
                  </td>
                  <td>
                    Pulse : {{$sItem->pulse}}<br />
                    Group : {{$sItem->blood_group_name}}<br />
                    @if($sItem->blood_pressure=='H')
                    Pressure : <span class="text-danger">Heigh</span>
                    @elseif($sItem->blood_pressure=='L')
                    Pressure : <span class="text-info">Low</span>
                    @elseif($sItem->blood_pressure=='N')
                    Pressure : <span class="text-success">Normal</span>
                    @endif
                  </td>
                  <td>
                    Temperature : {{$sItem->temperature}}<br />
                    Urination : {{$sItem->urination}}<br />
                    Temperament : {{$sItem->temperament}}<br />
                    Diabetus : {{$sItem->diabetus=='Y'?'Yes':'No'}}
                  </td>
                  <td>{{$sItem->problem}}</td>
                  <td><span class="badge label-info">NEW</span></td>
                  <td>{{date("d-m-Y H:i:s", strtotime($sItem->created_at))}}</td>
                  <td>{{date("d-m-Y H:i:s", strtotime($sItem->created_at))}}</td>
                  <td><a href="{{url('doctor-profile/'.$sItem->id.'/edit')}}"><span class="badge label-primary lable">ACCEPT</span></a><br/></td>
                </tr>
              </tbody>
              @endforeach
              @endif
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
