@extends('patient-dashboard.patient-home')
@section('heading','Profile')
@section('title',' Available Doctor')
@section('content')

<div class="container">

  <div class="row">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <div class="alert alert-{{ $msg }} alert-outline alert-dismissible fade in" role="alert">
          <i class="fa fa-exclamation-triangle" aria-hidden="true" style="font-size:30px;"></i> {{ Session::get('alert-' . $msg) }}   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">X</span></button>
        </div>
      @endif
    @endforeach
  </div>

  <div class="row">
    <div class="col-sm-12 col-xs-12">
      <div class="row">
         <div class="col-sm-12 box">
             <div class="col-sm-9"><h2>All available doctor list</h2></div>
             <div class="col-sm-3"></div>
         </div>
       </div>

       <div class="row">

           <div class="col-md-12 box mar-top10 academic">

             <table class='table table-striped table-bordered'>
               <thead>
                 <tr>
                   <th>#</th>
                   <th>Doctor Image</th>
                   <th>Doctor Name</th>
                   <th>You can talk by</th>
                   <th>Doctor</th>
                 </tr>
               </thead>
               <tbody>
                 @if(!empty($qItems))
                 @foreach($qItems as $sItem)
                 <tr>
                   <td>{{$sItem->id}}</td>
                   <td><img src="{{asset($sItem->profile_image)}}" class="img img-responsive" width="80" height="80" /></td>
                   <td>
                     <strong>Name :</strong> <span class="text-muted">{{$sItem->doctor_name}}</span><br />
                     <strong>Degree :</strong> <span class="text-muted">{{$sItem->degree}}</span><br />
                     <strong>Training :</strong> <span class="text-muted">{{$sItem->training}}</span><br />
                   </td>
                   <td>
                     <strong>Google DO :</strong> <span class="text-muted">{{$sItem->email}}</span><br />
                     <strong>Phone :</strong> <span class="text-muted">{{$sItem->mobile}}</span><br />
                     <strong>IMO NO :</strong> <span class="text-muted">{{$sItem->imo}}</span><br />
                     <strong>Skype :</strong> <span class="text-muted">{{$sItem->skype}}</span><br />
                   </td>
                   <td>
                     <a href="{{url('patient-request',[$id,$sItem->id])}}" class="btn btn-success btn-block"> <i class="fa fa-comments-o" aria-hidden="true"> Send Request</i></a>
                   </td>

                 </tr>
                 @endforeach
                 @endif
               </tbody>
             </table>

           </div>

       </div>
    </div>

  </div>
</div>

@endsection
