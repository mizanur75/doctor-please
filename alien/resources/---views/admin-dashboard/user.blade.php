@extends('admin-dashboard.home')
@section('heading','Manage User Information')
@section('title',' User Seting > User Information')
@section('content')

<div class="col-sm-12">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <div class="alert alert-{{ $msg }} alert-outline alert-dismissible fade in" role="alert">
        {{ Session::get('alert-' . $msg) }}   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
    @endif
  @endforeach
</div>

<div class="col-md-6">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      <h4>Create New User</h4>
    </div>

    <div class="col-md-12 panel-body .padding-bottom30">
      <div class="col-md-12">

        {!!Form::open(['url'=>'user-information','method'=>'post', 'enctype'=>'multipart/form-data'])!!}

          <div class="form-group form-animate-text margin-top40">
            {{ Form::text('txtFullName',old("txtFullName"),['class'=>'form-text','id'=>'validate_firstname','required'])}}
            <span class="bar"></span>
            {{ Form::label('full-name', 'Full Name') }}

            @if ($errors->has('txtFullName'))
                <span class="help-block text-danger">
                     <strong>{{ $errors->first('txtFullName') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group form-animate-text margin-top40">
            {{ Form::text('email',old("email"),['class'=>'form-text','id'=>'validate_email','pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$','required'])}}
            <span class="bar"></span>
            {{ Form::label('email', 'Email') }}

            @if ($errors->has('email'))
                <span class="help-block text-danger">
                     <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group form-animate-text margin-top40">
            {{ Form::text('txtMobile',old("txtMobile"),['class'=>'form-text','id'=>'validate_firstname','pattern'=>'[0-9]{11}','maxlength'=>'11','required'])}}
            <span class="bar"></span>
            {{ Form::label('mobile-number', 'Mobile Number') }}

            @if ($errors->has('txtMobile'))
                <span class="help-block text-danger">
                     <strong>{{ $errors->first('txtMobile') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group form-animate-text margin-top40">
            {{ Form::text('txtAddress',old("txtAddress"),['class'=>'form-text','id'=>'validate_firstname','required'])}}
            <span class="bar"></span>
            {{ Form::label('address', 'Address') }}

            @if ($errors->has('txtAddress'))
                <span class="help-block text-danger">
                     <strong>{{ $errors->first('txtAddress') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group form-animate-text margin-top40">
            {{Form::select('cmbUserType', ['8adMin9' => 'Admin', '7ediTor9' => 'Editor', '7docTor9' => 'Doctor'], null, ['class'=>'input-lg form-control','placeholder' => 'Select user type...'])}}

            @if ($errors->has('cmbUserType'))
                <span class="help-block text-danger">
                     <strong>{{ $errors->first('cmbUserType') }}</strong>
                </span>
            @endif
          </div>

          <div>

          <div class="form-group form-animate-checkbox">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-animate-radio">
                  {{ Form::label('full-name', 'Gender : ') }}

                  <label class="radio">
                  {{Form::radio('rdoGender', 'M')}}
                  <span class="outer">
                    <span class="inner"></span></span> Male
                  </label>

                  <label class="radio">
                  {{Form::radio('rdoGender', 'F')}}
                  <span class="outer">
                    <span class="inner"></span></span> Female
                  </label>
                </div>

                @if ($errors->has('rdoGender'))
                    <span class="help-block text-danger">
                         <strong>{{ $errors->first('rdoGender') }}</strong>
                    </span>
                @endif
              </div>

              <div class="col-sm-6">
                <div class="form-animate-radio">
                  {{ Form::label('full-name', 'Generate HTML : ') }}

                  <label class="radio">
                  {{Form::radio('rdoGenerateHTML', 'Y')}}
                  <span class="outer">
                    <span class="inner"></span></span> Yes
                  </label>

                  <label class="radio">
                  {{Form::radio('rdoGenerateHTML', 'N', 'true')}}
                  <span class="outer">
                    <span class="inner"></span></span> Female
                  </label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group form-animate-checkbox">
            <div class="col-sm-12 form-animate-radio">
              <div class="row">
                {{Form::file('fImageFile',['class'=>'form-control'])}}
              </div>
            </div>
          </div>

          <br /><br /><br />

          <div class="form-group form-animate-checkbox">
            <div class="col-sm-2 pull-right">
              {{Form::submit('Submit',['class'=>'submit btn btn-success'])}}
            </div>
            <div class="col-sm-2 pull-right">
              {{Form::reset('Refresh',['class'=>'submit btn btn-warning'])}}
            </div>
          </div>

      </div>

        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      {!!Form::open(['url'=>'user-information','method'=>'get', 'enctype'=>'multipart/form-data'])!!}
      <div class="col-sm-6">
        {{ Form::text('txtSearchName',old("txtSearchName"),['class'=>'form-control','id'=>'date_from','placeholder' => 'User Name'])}}
      </div>
      <div class="col-sm-4">
        <div class="row">
          {{Form::select('cmbUserType', [''=>'All Type','8adMin9' => 'Admin', '7ediTor9' => 'Editor', '7docTor9' => 'Doctor'], null, ['class'=>'form-control','placeholder' => 'Select user type...'])}}
        </div>
      </div>
      <div class="col-sm-2">
        <div class="row">
          {{Form::submit('Search',['class'=>'submit btn btn-info'])}}
        </div>
      </div>
      {!! Form::close() !!}
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      <div class="col-md-12">
        <span class="bold text-primary">Total number of users </span> ({{$qUsers->total()}})
        <table class="table-striped" style="width:100%;">
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Gender</td>
            <td>Active</td>
            <td>Edit</td>
            <td>View</td>
          </tr>

          @if(!empty($qUsers))
          @foreach($qUsers as $sUser)
          <tr>
            <td>{{$sUser->id}}</td>
            <td>{{$sUser->name}}</td>
            <td>{{$sUser->email}}</td>
            <td>{{'88'.$sUser->mobile}}</td>
            <td>
              @if($sUser->gender=='M')
              <i class="fa fa-male text-success"></i>
              @elseif($sUser->gender=='F')
              <i class="fa fa-female text-info"></i>
              @else
              <span class="text-muted">N/A</span>
              @endif
            </td>
            <td>
              @if($sUser->is_active=='Y')
              <i class="fa fa-check-square-o text-success"></i>
              @elseif($sUser->is_active=='N')
              <i class="fa fa-close text-danger"></i>
              @endif
            </td>
            <td>
              <button type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal{{$sUser->id}}"><i class="fa fa-edit"></i></button>
            </td>
            <td>
              <button type="button" class="btn btn-round btn-info" ><i class="fa fa-eye"></i></button>
            </td>
          </tr>

          <!-- Modal -->
          <div id="myModal{{$sUser->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-info"> Update user information</h4>
                </div>
                <div class="modal-body">
                  {!!Form::open(['url'=>['user-information',$sUser->id],'method'=>'put', 'enctype'=>'multipart/form-data'])!!}

                    <div class="form-group form-animate-text margin-top40">
                      {{ Form::text('txtFullName',$sUser->name,['class'=>'form-text','id'=>'validate_firstname','required'])}}
                      <span class="bar"></span>
                      {{ Form::label('full-name', 'Full Name') }}
                    </div>

                    <div class="form-group form-animate-text margin-top40">
                      {{ Form::text('email',$sUser->email,['class'=>'form-text','id'=>'validate_email','pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$','disabled'])}}
                      <span class="bar"></span>
                    </div>

                    <div class="form-group form-animate-text margin-top40">
                      {{ Form::text('txtMobile',$sUser->mobile,['class'=>'form-text','id'=>'validate_firstname','pattern'=>'[0-9]{11}','maxlength'=>'11','required'])}}
                      <span class="bar"></span>
                      {{ Form::label('mobile-number', 'Mobile Number') }}
                    </div>

                    <div class="form-group form-animate-text margin-top40">
                      {{ Form::text('txtAddress',$sUser->address,['class'=>'form-text','id'=>'validate_firstname','required'])}}
                      <span class="bar"></span>
                      {{ Form::label('address', 'Address') }}
                    </div>

                    <div class="form-group form-animate-text margin-top40">
                      {{Form::select('cmbUserType', ['8adMin9' => 'Admin', '7ediTor9' => 'Editor', '7docTor9' => 'Doctor'], $sUser->user_type, ['class'=>'input-lg form-control','placeholder' => 'Select user type...'])}}
                    </div>


                    <div class="form-group form-animate-checkbox">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-animate-radio">
                            {{ Form::label('full-name', 'Gender : ') }}

                            <label class="radio">
                            {{Form::radio('rdoGender', 'M', $sUser->gender=='M'?'true':'')}}
                            <span class="outer">
                              <span class="inner"></span></span> Male
                            </label>

                            <label class="radio">
                            {{Form::radio('rdoGender', 'F', $sUser->gender=='F'?'true':'')}}
                            <span class="outer">
                              <span class="inner"></span></span> Female
                            </label>
                          </div>

                          @if ($errors->has('rdoGender'))
                              <span class="help-block text-danger">
                                   <strong>{{ $errors->first('rdoGender') }}</strong>
                              </span>
                          @endif
                        </div>

                        <div class="col-sm-6">
                          <div class="form-animate-radio">
                            {{ Form::label('active', 'Active : ', ['class'=>'radio']) }}

                            <label class="radio">
                            {{Form::radio('rdoIsActive', 'Y',$sUser->is_active=='Y'?'true':'')}}
                            <span class="outer">
                              <span class="inner"></span></span> Yes
                            </label>

                            <label class="radio">
                            {{Form::radio('rdoIsActive', 'N',$sUser->is_active=='N'?'true':'')}}
                            <span class="outer">
                              <span class="inner"></span></span> No
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="form-group form-animate-checkbox">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-animate-radio">
                              {{ Form::label('full-name', 'Generate : ') }}

                              <label class="radio">
                              {{Form::radio('rdoGenerateHTML', 'Y')}}
                              <span class="outer">
                                <span class="inner"></span></span> Yes
                              </label>

                              <label class="radio">
                              {{Form::radio('rdoGenerateHTML', 'N', 'true')}}
                              <span class="outer">
                                <span class="inner"></span></span> No
                              </label>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            {{Form::file('fImageFile',['class'=>'form-control'])}}

                            {{Form::hidden('fOldImage',$sUser->image_path)}}
                            <input type="checkbox" class="checkbox" value="D" id="validate_agree" name="validate_agree">
                            <label>Check it to delete old image.</label>
                          </div>
                        </div>
                      </div>

                    </div>

                </div>
                <div class="modal-footer">
                  {{Form::submit('Update',['class'=>'submit btn btn-primary'])}}
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                {!! Form::close() !!}
              </div>

            </div>
          </div>
          <!-- Model Close -->

          @endforeach
          @endif
        </table>
        @if(!empty($qUsers))
          {{ $qUsers->links() }}
        @endif
      </div>

    </div>

  </div>
</div>

@endsection
