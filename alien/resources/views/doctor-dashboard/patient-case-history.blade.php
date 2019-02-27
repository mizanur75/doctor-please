@extends('doctor-dashboard.doctor-home')
@section('heading','Manage Patients Information')
@section('title',' Patients Information > Patient Case History')
@section('content')

<div class="form-element">

  <div class="col-sm-12">
    <div class="col-md-12 tabs-area">
      <div class="liner"></div>
        <ul class="nav nav-tabs nav-tabs-v5" id="tabs-demo6">
         <li class="active">
             <a href="#tabs-demo6-area1" data-toggle="tab" title="welcome">
              <span class="round-tabs one">
                <i class="glyphicon glyphicon-home"></i>
              </span>
            </a>
          </li>
         <li>
            <a href="#tabs-demo6-area2" data-toggle="tab" title="profile">
             <span class="round-tabs two">
               <i class="glyphicon glyphicon-user"></i>
             </span>
           </a>
          </li>
         <li>
          <a href="#tabs-demo6-area3" data-toggle="tab" title="bootsnipp goodies">
           <span class="round-tabs three">
            <i class="glyphicon glyphicon-comment"></i>
          </span> </a>
         </li>
         <li>
           <a href="#tabs-demo6-area4" data-toggle="tab" title="blah blah">
           <span class="round-tabs four">
             <i class="glyphicon glyphicon-ok"></i>
           </span>
           </a>
          </li>
        </ul>
      <div class="tab-content tab-content-v5">
        <div class="tab-pane fade in active" id="tabs-demo6-area1">

          <h3 class="head text-center">{{$qItem->patient_name}} - Current Status </h3>
          <hr />
          <div class="col-sm-10">
            {!!Form::open(['url'=>'patient-history','method'=>'post', 'enctype'=>'multipart/form-data'])!!}
            <div class="row">
              <div class="col-sm-1">
                {{ Form::label('patient-gender', 'Gender') }}
              </div>
              <div class="col-sm-3">
                {{Form::radio('rdoGender', 'M', $qItem->gender=='M'?'true':'')}} <span class="text-muted">Male</span>
                {{Form::radio('rdoGender', 'F', $qItem->gender=='F'?'true':'')}} <span class="text-muted">Female</span>
                {{Form::radio('rdoGender', 'O', $qItem->gender=='O'?'true':'')}} <span class="text-muted">Other</span>
              </div>
              <input type="hidden" name="qItemId" value="{{$qItem->id}}">
              <div class="col-sm-1">
                {{ Form::label('blood-pressure', 'Blood Pressure') }}
              </div>
              <div class="col-sm-3">
                {{Form::radio('rdoBloodPressure', 'H', $qItem->blood_pressure=='H'?'true':'')}} <span class="text-muted">High</span>
                {{Form::radio('rdoBloodPressure', 'L', $qItem->blood_pressure=='L'?'true':'')}} <span class="text-muted">Low</span>
                {{Form::radio('rdoBloodPressure', 'N', $qItem->blood_pressure=='N'?'true':'')}} <span class="text-muted">Normal</span>
              </div>

              <div class="col-sm-1">
                {{ Form::label('diabetus', 'Diabetus') }}
              </div>
              <div class="col-sm-3">
                {{Form::radio('rdoDiabetus', 'Y', $qItem->diabetus=='Y'?'true':'')}} <span class="text-muted">Yes</span>
                {{Form::radio('rdoDiabetus', 'N', $qItem->diabetus=='N'?'true':'')}} <span class="text-muted">No</span>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-sm-1">
                {{ Form::label('patient-puulse', 'Pulse Rate') }}
              </div>
              <div class="col-sm-3">
                {{ Form::text('txtPulse',$qItem->pulse,['class'=>'form-control','maxlength'=>'7'])}}
              </div>

              <div class="col-sm-1">
                {{ Form::label('Blood-group', 'Blood Group') }}
              </div>
              <div class="col-sm-3">
                {{ Form::select('cmbBloodGroup',$qBloodGroup,['id'=>$qItem->blood_group],['class'=>'form-control mt0'])}}
              </div>

              <div class="col-sm-1">
                {{ Form::label('temperature', 'Temperature') }}
              </div>
              <div class="col-sm-3">
                {{ Form::text('txtTemperature',$qItem->temperature,['class'=>'form-control','maxlength'=>'7'])}}
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-sm-1">
                {{ Form::label('urination', 'Urination') }}
              </div>
              <div class="col-sm-3">
                {{ Form::text('txtUrination',$qItem->urination,['class'=>'form-control','maxlength'=>'7'])}}
              </div>

              <div class="col-sm-1">
                {{ Form::label('temperament', 'Temperament',['class'=>'bold']) }}
              </div>
              <div class="col-sm-3">
                {{ Form::text('txtTemperament',$qItem->temperament,['class'=>'form-control','maxlength'=>'99'])}}
              </div>

              <div class="col-sm-4 border-1 text-danger">
                {{$qItem->problem}}
              </div>
            </div>
            <br />
            
          </div>

          <div class="col-sm-2">
            @if(!empty($qItem->profile_image))
            <img src="{{asset($qItem->profile_image)}}" class="img-flowied" />
            @endif
            <br /><br />
            <div class="row">
              <div class="col-sm-12">
                <strong class="text-primary">Name - </strong> &nbsp;
                {{$qItem->patient_name}}
              </div>

              <div class="col-sm-12">
                <strong class="text-primary">Age - </strong> &nbsp;
                {{$qItem->age}} Years
              </div>

              <div class="col-sm-12">
                <strong class="text-primary">Weight - </strong> &nbsp;
                {{$qItem->weight}} KG.
              </div>
            </div><br /><br />
          </div>

        </div>

        <div class="tab-pane fade" id="tabs-demo6-area2">
          <h3 class="head text-center">Previous History</h3>
          <hr />

        </div>

        <div class="tab-pane fade" id="tabs-demo6-area3">
          <h3 class="head text-center">Diagnostic</h3>
          <hr />

          <div class="col-sm-12" id="accordion">
            <!-- Cardiovascular -->
            <div class="col-sm-6">
              <div class="card panel">
                <div class="panel-heading">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseOne">
                    <h4>Cardiovascular</h4>
                  </a>
                </div>
                <div id="collapseOne" class="collapse" data-parent="#accordion">
                  <div class="panel-body">
                    <div class="col-sm-6">
                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" name="attack" class="checkbox" value="Y">
                        <label> Heart attack</label>
                      </div>
                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" name="stroke" class="checkbox" value="Y">
                        <label> Stroke/CVA</label>
                      </div>

                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" name="heart" class="checkbox" value="Y">
                        <label> Hebrt disease</label>
                      </div>

                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" name="vertigo" class="checkbox" value="Y">
                        <label> Diiziness/vertigo</label>
                      </div>

                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" name="seizures" class="checkbox" value="Y">
                        <label> Seizures</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Respiratory -->
            <div class="col-sm-6">
              <div class="card panel">
                <div class="panel-heading">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                    <h4>Respiratory</h4>
                  </a>
                </div>
                <div id="collapseTwo" class="collapse" name="" data-parent="#accordion">
                  <div class="panel-body">
                    <div class="col-sm-6">
                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" name="asthma" class="checkbox" value="Y">
                        <label> Asthma</label>
                      </div>

                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" name="bronchitis" class="checkbox" value="Y">
                        <label> Bronchitis</label>
                      </div>

                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" name="emphysema" class="checkbox" value="Y">
                        <label> Emphysema</label>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" name="cough" class="checkbox" value="Y">
                        <label> Chronic Cough</label>
                      </div>

                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" name="breath" class="checkbox" value="Y">
                        <label> Shorlness of breath</label>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <h4>ls there a family history of any of the above?</h4>
                      <div class="col-sm-3 form-group form-animate-checkbox">
                        <input type="radio" name="family_history" value="Y">
                        <label> Yes</label>
                      </div>
                      <div class="col-sm-3 form-group form-animate-checkbox">
                        <input type="radio" name="family_history"  value="N">
                        <label> No</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12" id="accordion">
            <!-- Diqestive -->
            <div class="col-sm-6">
              <div class="card panel">
                <div class="panel-heading">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                    <h4>Diqestive</h4>
                  </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-5 form-group form-animate-checkbox">
                        <input type="checkbox" name="constipation" class="checkbox" value="Y">
                        <label> Constipation</label>
                      </div>
                      <div class="col-sm-7 form-group form-animate-checkbox">
                        <input type="checkbox" name="chrones" class="checkbox" value="Y">
                        <label> Chrones Disease</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-5 form-group form-animate-checkbox">
                        <input type="checkbox" name="colitis" class="checkbox" value="Y">
                        <label> Colitis</label>
                      </div>
                      <div class="col-sm-7 form-group form-animate-checkbox">
                        <input type="checkbox" name="syndrome" class="checkbox" value="Y">
                        <label> lrritablp Bowel Syndrome</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-5 form-group form-animate-checkbox">
                        <input type="checkbox" name="ulcer" class="checkbox" value="Y">
                        <label> Ulcers</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Head and Neck -->
            <div class="col-sm-6">
              <div class="card panel">
                <div class="panel-heading">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                    <h4>Head and Neck</h4>
                  </a>
                </div>
                <div id="collapseFour" class="collapse" data-parent="#accordion">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="headache" class="checkbox" value="Y">
                        <label> History of headaches</label>
                      </div>
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="migrane" class="checkbox" value="Y">
                        <label> Hislory of migraines</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="vidon" class="checkbox" value="Y">
                        <label> Vidon problems</label>
                      </div>
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="visson_loss" class="checkbox" value="Y">
                        <label> Vision loss</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="ear" class="checkbox" value="Y">
                        <label> Ear problems</label>
                      </div>
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="hearing" class="checkbox" value="Y">
                        <label> Hearing loss</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12" id="accordion">
            <!-- Muscle/Joint -->
            <div class="col-sm-6">
              <div class="card panel">
                <div class="panel-heading">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
                    <h4>Muscle/Joint</h4>
                  </a>
                </div>
                <div id="collapseFive" class="collapse" data-parent="#accordion">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="back" class="checkbox" value="Y">
                        <label> Back</label>
                      </div>
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="shoulder" class="checkbox" value="Y">
                        <label> Shoulders</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="spine" class="checkbox" value="Y">
                        <label> Spine</label>
                      </div>
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="elbow" class="checkbox" value="Y">
                        <label> Elbow</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="wrist" class="checkbox" value="Y">
                        <label> Wrist/Hand</label>
                      </div>
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="hip" class="checkbox" value="Y">
                        <label> Hip</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="knee" class="checkbox" value="Y">
                        <label> Knee</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Women -->
            <div class="col-sm-6">
              <div class="card panel">
                <div class="panel-heading">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseSix">
                    <h4>Women</h4>
                  </a>
                </div>
                <div id="collapseSix" class="collapse" data-parent="#accordion">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="pregnancy" class="checkbox" value="Y">
                        <label> Pregnancy</label>
                      </div>

                      <div class="col-sm-6 form-group">
                        {{ Form::text('txtPregnancyDueDate',old("txtPregnancyDueDate"),['class'=>'form-control','placeholder' => 'Pregnancy Due Date'])}}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 form-group form-animate-checkbox">
                        <input type="checkbox" name="pri_preg" class="checkbox" value="Y">
                        <label> Previous pregnancy complications</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="motopausal" class="checkbox" value="Y">
                        <label> Matopausal problems</label>
                      </div>

                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="mgrstrual" class="checkbox" value="Y">
                        <label> Mgrstrual problems</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 form-group form-animate-checkbox">
                        <input type="checkbox" name="gynocho" class="checkbox" value="Y">
                        <label> Gynecological conditions</label>
                      </div>

                      <div class="col-sm-12 form-group">
                        {{ Form::text('txtGynecologicalDescribe',old("txtGynecologicalDescribe"),[ 'class'=>'form-control','placeholder' => 'Gynecological conditions Describe'])}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12" id="accordion">
            <!-- Man -->
            <div class="col-sm-6">
              <div class="card panel">
                <div class="panel-heading">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseSeven">
                    <h4>Man</h4>
                  </a>
                </div>
                <div id="collapseSeven" class="collapse" data-parent="#accordion">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="enl_prostate" class="checkbox" value="Y">
                        <label> Enlarged Prostate</label>
                      </div>

                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="libidoi" class="checkbox" value="Y">
                        <label> Libidoi lssues</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 form-group">
                        {{ Form::text('txtManOther',old("txtManOther"),['class'=>'form-control','placeholder' => 'Other'])}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Infectious Conditions -->
            <div class="col-sm-6">
              <div class="card panel">
                <div class="panel-heading">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseEight">
                    <h4>Infectious Conditions</h4>
                  </a>
                </div>
                <div id="collapseEight" class="collapse" data-parent="#accordion">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-12 form-group form-animate-checkbox">
                        <input type="checkbox" name="skin" class="checkbox" value="Y">
                        <label> Skin Conditions</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 form-group form-animate-checkbox">
                        <input type="checkbox" name="raspiratory" class="checkbox" value="Y">
                        <label> Respiratory Conditions</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 form-group form-animate-checkbox">
                        <input type="checkbox" name="hepatities" class="checkbox" value="Y">
                        <label> Hepatitis</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12" id="accordion">
            <!-- Skin Conditions -->
            <div class="col-sm-6">
              <div class="card panel">
                <div class="panel-heading">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseNine">
                    <h4>Skin Conditions</h4>
                  </a>
                </div>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="eczema" class="checkbox" value="Y">
                        <label> Eczema</label>
                      </div>

                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="psoriasis" class="checkbox" value="Y">
                        <label> Psoriasis</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="rash" class="checkbox" value="Y">
                        <label> Rash</label>
                      </div>

                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="warts" class="checkbox" value="Y">
                        <label> Warts</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6 form-group form-animate-checkbox">
                        <input type="checkbox" name="open_sores" class="checkbox" value="Open-Sores">
                        <label> Open Sores</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Other -->
            <div class="col-sm-6">
              <div class="card panel">
                <div class="panel-heading">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseTen">
                    <h4>Other</h4>
                  </a>
                </div>
                <div id="collapseTen" class="collapse" data-parent="#accordion">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-5 form-group form-animate-checkbox">
                        <input type="checkbox" name="sensation" class="checkbox" value="Y">
                        <label> Loss of sensation</label>
                      </div>

                      <div class="col-sm-7 form-group">
                        {{ Form::text('txtLossSensation',old("txtLossSensation"),['class'=>'form-control','placeholder' => 'Loss of sensation where'])}}
                      </div>
                    </div>

                    <div class="row">
                      
                      <div class="col-sm-7 form-animate-checkbox">
                        <input type="checkbox" name="himophilia" class="checkbox" value="Y">
                        <label> Hemophilia</label>
                      </div>
                      <div class="col-sm-5 form-group form-animate-checkbox">
                        <input type="checkbox" name="epilepsy" class="checkbox" value="Y">
                        <label> Epilepsy</label>
                      </div>
                    </div>

                    <div class="row">
                      
                      <div class="col-sm-7 form-group form-animate-checkbox">
                        <input type="checkbox" name="fatigue" class="checkbox" value="Y">
                        <label> Chronic fatigue</label>
                      </div>
                      <div class="col-sm-5 form-animate-checkbox">
                        <input type="checkbox" name="osteoporisis" class="checkbox" value="Osteoporosrs">
                        <label> Osteoporosrs</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-7 form-animate-checkbox">
                        <input type="checkbox" name="scoliopis" class="checkbox" value="Y">
                        <label> Scoliopis</label>
                      </div>
                      <div class="col-sm-5 form-group form-animate-checkbox">
                        <input type="checkbox" name="polio" class="checkbox" value="Y">
                        <label> Polio / Post Polio</label>
                      </div>
                    </div>

                    <div class="row">
                      
                      <div class="col-sm-12 form-group form-animate-checkbox">
                        <input type="checkbox" name="problem[]" class="checkbox" value="Cancer">
                        <label> Cancer</label>
                      </div>
                    </div>

                    <div class="row">
                      

                      <div class="col-sm-12 form-group">
                        {{ Form::text('txtCancerType',old("txtCancerType"),['class'=>'form-control','placeholder' => 'Cancer Type / Location.'])}}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 form-group form-animate-checkbox">
                        <input type="checkbox" name="problem[]" class="checkbox" value="Allergibs-hypersensitivity">
                        <label> Allergibs / hypersensitivity</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-12 form-group form-animate-checkbox">
                        <input type="checkbox" name="problem[]" class="checkbox" value="Arthritis">
                        <label> Arthritis</label>
                      </div>

                      <div class="col-sm-12 form-group">
                        <h4>Is there a family history of arthritis?</h4>
                        {{ Form::radio('rdoYesNo', 'Y') }} Yes
                        {{ Form::radio('rdoYesNo', 'N') }} No
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="tab-pane fade" id="tabs-demo6-area4">
          <h3 class="head text-center">Done</h3>
          <p class="narrow text-center">
            All Information is Set.
          </p>

          <p class="text-center">
            {{Form::submit(' Save and Continue ',['class'=>'btn btn-success btn-round green'])}}
          </p>
        </div>
        {!! Form::close() !!}
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

</div>

@endsection
