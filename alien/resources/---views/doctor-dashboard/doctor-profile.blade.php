@extends('doctor-dashboard.doctor-home')
@section('heading','Manage Doctor information')
@section('title',' Doctor Information > Doctor Profile Update')
@section('content')

<div class="col-sm-12">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <div class="alert alert-{{ $msg }} alert-outline alert-dismissible fade in" role="alert">
        {{ Session::get('alert-' . $msg) }}   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">X</span></button>
      </div>
    @endif
  @endforeach
</div>

<div class="form-element">

  <div class="col-md-8 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-heading">
         <h4>Doctor Profile</h4>
        </div>

        <div class="panel-body" style="padding-bottom:30px;">
          {!!Form::open(['url'=>['doctor-profile',$qItems->id],'method'=>'put', 'enctype'=>'multipart/form-data'])!!}
          <div class="row">
            <div class="col-sm-2"> {{ Form::label('doctor-name', 'Doctor Name') }} <i class="fa fa-star text-danger" aria-hidden="true"></i> </div>
            <div class="col-sm-10">
              {{ Form::text('txtDoctorName',$qItems->doctor_name,['class'=>'form-control','maxlength'=>'69','required'])}}

              @if ($errors->has('txtDoctorName'))
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('txtDoctorName') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2"> {{ Form::label('patient-age', 'Degree') }} <i class="fa fa-star text-danger" aria-hidden="true"></i></div>
            <div class="col-sm-10">
              {{ Form::text('txtDegree',$qItems->degree,['class'=>'form-control','maxlength'=>'69','required'])}}

              @if ($errors->has('txtDegree'))
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('txtDegree') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2"> {{ Form::label('special-training', 'Special Training') }}</div>
            <div class="col-sm-10">
              {{ Form::text('txtSpecialTraining',$qItems->training,['class'=>'form-control','maxlength'=>'255'])}}

              @if ($errors->has('txtSpecialTraining'))
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('txtSpecialTraining') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2"> {{ Form::label('email', 'Email') }} </div>
            <div class="col-sm-4">
              {{ Form::text('txtEmail',$qItems->email,['class'=>'form-control','pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$','required'])}}

              @if ($errors->has('txtEmail'))
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('txtEmail') }}</strong>
                </span>
              @endif
            </div>

            <div class="col-sm-2"> {{ Form::label('skype', 'Skype') }}</div>
            <div class="col-sm-4">
              {{ Form::text('txtSkype',$qItems->skype,['class'=>'form-control'])}}
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2"> {{ Form::label('mobile', 'Mobile') }} </div>
            <div class="col-sm-4">
              {{ Form::text('txtMobile',$qItems->mobile,['class'=>'form-control','pattern'=>'[0-9]{11}','required'])}}

              @if ($errors->has('txtMobile'))
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('txtMobile') }}</strong>
                </span>
              @endif
            </div>

            <div class="col-sm-2"> {{ Form::label('imo', 'IMO') }}</div>
            <div class="col-sm-4">
              {{ Form::text('txtIMO',$qItems->imo,['class'=>'form-control'])}}
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2"> {{ Form::label('patient-gender', 'Gender') }} <i class="fa fa-star text-danger" aria-hidden="true"></i></div>
            <div class="col-sm-4">
              {{Form::radio('rdoGender', 'M', $qItems->gender=='M'?'true':'')}} <span class="text-muted">Male</span>
              {{Form::radio('rdoGender', 'F', $qItems->gender=='F'?'true':'')}} <span class="text-muted">Female</span>

              @if ($errors->has('rdoGender'))
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('rdoGender') }}</strong>
                </span>
              @endif
            </div>

            <div class="col-sm-2"> {{ Form::label('available', 'Available') }} <i class="fa fa-star text-danger" aria-hidden="true"></i></div>
            <div class="col-sm-4">
              <div style="border:1px solid red;">
                &nbsp;&nbsp;&nbsp;{{Form::radio('rdoAvailable', 'Y', $qItems->available=='Y'?'true':'')}} <span class="text-muted">Yes</span>
                &nbsp;&nbsp;&nbsp;{{Form::radio('rdoAvailable', 'N', $qItems->available=='N'?'true':'')}} <span class="text-muted">No</span>
              </div>

              @if ($errors->has('rdoAvailable'))
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('rdoAvailable') }}</strong>
                </span>
              @endif
            </div>

          </div>
          <br />
          <div class="row">
            <div class="col-sm-2"> {{ Form::label('about', 'About') }} </div>
            <div class="col-sm-10">
              {{ Form::textarea('txtAbout',$qItems->about,['class'=>'form-control'])}}
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2"> {{ Form::label('image', 'Patient Image') }} </div>
            <div class="col-sm-6">
              {{Form::file('fImageFile',['class'=>'form-control'])}}
              {{Form::hidden('oldImage',$qItems->profile_image)}}

              @if ($errors->has('fImageFile'))
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('fImageFile') }}</strong>
                </span>
              @endif
            </div>

            <div class="col-sm-2"> {{Form::reset('Refresh',['class'=>'btn btn-block btn-warning'])}} </div>
            <div class="col-sm-2"> {{Form::submit('Update',['class'=>'btn btn-block btn-success'])}} </div>

          </div>
          {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>

</div>

@endsection
