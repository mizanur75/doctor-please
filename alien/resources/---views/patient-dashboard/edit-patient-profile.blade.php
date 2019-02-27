@extends('patient-dashboard.patient-home')
@section('heading','Profile')
@section('title',' Profile Edit')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-8 col-xs-12">
      <div class="row">
         <div class="col-sm-12 box">
           <h2> Update patient profile (<span class="text-info">You update this profile {{$iUpdateRecord}} times.</span>)</h2>
         </div>
       </div>

       <div class="row">

           <div class="col-md-12 box mar-top10 academic">
             {!!Form::open(['url'=>['patient-profile',$sItem->id],'method'=>'put', 'enctype'=>'multipart/form-data'])!!}
             <div class="row">
               <div class="col-sm-2"> {{ Form::label('patient-name', 'Patient Name') }} <i class="fa fa-star text-danger" aria-hidden="true"></i> </div>
               <div class="col-sm-10">
                 {{ Form::text('txtPatientName',$sItem->patient_name,['class'=>'form-control','maxlength'=>'69','placeholder' => 'রোগীর নাম','required'])}}

                 @if ($errors->has('txtPatientName'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('txtPatientName') }}</strong>
                   </span>
                 @endif
               </div>
             </div>
             <br />
             <div class="row">
               <div class="col-sm-2"> {{ Form::label('patient-age', 'Age') }} <i class="fa fa-star text-danger" aria-hidden="true"></i></div>
               <div class="col-sm-4">
                 {{ Form::number('txtAge',$sItem->age,['class'=>'form-control','maxlength'=>'7','placeholder' => 'রোগীর বয়স','required'])}}

                 @if ($errors->has('txtAge'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('txtAge') }}</strong>
                   </span>
                 @endif
               </div>

               <div class="col-sm-2"> {{ Form::label('patient-weight', 'Weight') }} </div>
               <div class="col-sm-4">
                 {{ Form::number('txtWeight',$sItem->weight,['class'=>'form-control','maxlength'=>'7','placeholder' => 'রোগীর ওজন'])}}

                 @if ($errors->has('txtWeight'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('txtWeight') }}</strong>
                   </span>
                 @endif
               </div>
             </div>
             <br />
             <div class="row">
               <div class="col-sm-2"> {{ Form::label('patient-gender', 'Gender') }} <i class="fa fa-star text-danger" aria-hidden="true"></i></div>
               <div class="col-sm-4">
                 {{Form::radio('rdoGender', 'M', $sItem->gender=='M'?'true':'')}} <span class="text-muted">Male</span>
                 {{Form::radio('rdoGender', 'F', $sItem->gender=='F'?'true':'')}} <span class="text-muted">Female</span>
                 {{Form::radio('rdoGender', 'O', $sItem->gender=='O'?'true':'')}} <span class="text-muted">Other</span>

                 @if ($errors->has('rdoGender'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('rdoGender') }}</strong>
                   </span>
                 @endif
               </div>

               <div class="col-sm-2"> {{ Form::label('patient-puulse', 'Pulse Rate') }} </div>
               <div class="col-sm-4">
                 {{ Form::text('txtPulse',$sItem->pulse,['class'=>'form-control','maxlength'=>'7','placeholder' => 'প্রতি মিনিটে নাড়ি-ঘাতের হাড়'])}}

                 @if ($errors->has('txtPulse'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('txtPulse') }}</strong>
                   </span>
                 @endif
               </div>
             </div>
             <br />
             <div class="row">
               <div class="col-sm-2"> {{ Form::label('blood-pressure', 'Blood Pressure') }} </div>
               <div class="col-sm-4">
                 {{Form::radio('rdoBloodPressure', 'H', $sItem->blood_pressure=='H'?'true':'')}} <span class="text-muted">High</span>
                 {{Form::radio('rdoBloodPressure', 'L', $sItem->blood_pressure=='L'?'true':'')}} <span class="text-muted">Low</span>
                 {{Form::radio('rdoBloodPressure', 'N', $sItem->blood_pressure=='N'?'true':'')}} <span class="text-muted">Normal</span>

                 @if ($errors->has('rdoBloodPressure'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('rdoBloodPressure') }}</strong>
                   </span>
                 @endif
               </div>

               <div class="col-sm-2"> {{ Form::label('Blood-group', 'Blood Group') }} </div>
               <div class="col-sm-4">
                 {{ Form::select('cmbBloodGroup',$qBloodGroup,['cmbBloodGroup'=>$sItem->blood_group],['class'=>'form-control']) }}

                 @if ($errors->has('cmbBloodGroup'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('cmbBloodGroup') }}</strong>
                   </span>
                 @endif
               </div>
             </div>
             <br />
             <div class="row">
               <div class="col-sm-2"> {{ Form::label('diabetus', 'Diabetus') }} <i class="fa fa-star text-danger" aria-hidden="true"></i></div>
               <div class="col-sm-4">
                 {{Form::radio('rdoDiabetus', 'Y', $sItem->diabetus=='Y'?'true':'')}} <span class="text-muted">Yes</span>
                 {{Form::radio('rdoDiabetus', 'N', $sItem->diabetus=='N'?'true':'')}} <span class="text-muted">No</span>

                 @if ($errors->has('rdoDiabetus'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('rdoDiabetus') }}</strong>
                   </span>
                 @endif
               </div>

               <div class="col-sm-2"> {{ Form::label('temperature', 'Temperature') }} </div>
               <div class="col-sm-4">
                 {{ Form::text('txtTemperature',$sItem->temperature,['class'=>'form-control','maxlength'=>'7','placeholder' => 'তাপমাত্রা'])}}

                 @if ($errors->has('txtTemperature'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('txtTemperature') }}</strong>
                   </span>
                 @endif
               </div>
             </div>
             <br />
             <div class="row">
               <div class="col-sm-2"> {{ Form::label('urination', 'Urination') }} </div>
               <div class="col-sm-4">
                 {{ Form::text('txtUrination',$sItem->urination,['class'=>'form-control','maxlength'=>'7','placeholder' => 'মূত্রত্যাগ'])}}

                 @if ($errors->has('txtUrination'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('txtUrination') }}</strong>
                   </span>
                 @endif
               </div>

               <div class="col-sm-2"> {{ Form::label('temperament', 'Temperament') }} </div>
               <div class="col-sm-4">
                 {{ Form::text('txtTemperament',$sItem->temperament,['class'=>'form-control','maxlength'=>'99','placeholder' => 'মেজাজ'])}}

                 @if ($errors->has('txtTemperament'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('txtTemperament') }}</strong>
                   </span>
                 @endif
               </div>
             </div>
             <br />
             <div class="row">
               <div class="col-sm-2"> {{ Form::label('problem', 'Problem') }} </div>
               <div class="col-sm-10">
                 {{ Form::textarea('txtProblem',$sItem->problem,['class'=>'form-control'])}}
               </div>
             </div>
             <br />
             <div class="row">
               <div class="col-sm-2"> {{ Form::label('image', 'Patient Image') }} </div>
               <div class="col-sm-6">
                 {{Form::file('fImageFile',['class'=>'form-control'])}}
                 {{Form::hidden('oldImage',$sItem->profile_image)}}

                 @if ($errors->has('fImageFile'))
                   <span class="help-block text-danger">
                     <strong>{{ $errors->first('fImageFile') }}</strong>
                   </span>
                 @endif
               </div>

               <div class="col-sm-2"> {{Form::reset('Refresh',['class'=>'btn btn-block btn-warning'])}} </div>
               <div class="col-sm-2"> {{Form::submit('Submit',['class'=>'btn btn-block btn-success'])}} </div>

             </div>
             {!! Form::close() !!}

           </div>

       </div>
    </div>

    <!---------------- RIGHT SIDE ----------------->

    <div class="col-sm-4 col-xs-12">
      <div class="col-sm-12 box">
          <a href="{{url('patient-profile')}}" class="btn btn-success btn-block"> Show all patient profile  </a>
      </div>

      <div class="col-sm-12 mar-top10 academic">
        <div class="row margin-top10">
          <iframe width="360" height="250" src="https://www.youtube.com/embed/hWWlez8j3og?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-md-12 box mar-top10 academic" align="center">
          <a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="font-size: 70px;color: #3C5487;"></i></a><br>
          <a href="#"><h4><i class="fa fa-download" aria-hidden="true"></i> Download full information</h4></a>
      </div>
    </div>
  </div>
</div>

@endsection
