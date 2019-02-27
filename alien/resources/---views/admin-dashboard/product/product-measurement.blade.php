@extends('admin-dashboard.home')
@section('heading','Product Measurement')
@section('title',' Product Settings > Product Measurement')
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
      <h4>Create Product Measurement</h4>
    </div>
    <div class="col-md-12 panel-body padding-bottom30">
      {!!Form::open(['url'=>'product-measurement','method'=>'post', 'enctype'=>'multipart/form-data'])!!}

      <div class="form-group">
        {{ Form::label('measurement-name-en', 'Measurement Name (English)') }}
        {{ Form::text('txtMeasurementNameEN',old("txtMeasurementNameEN"),['class'=>'form-control','required'])}}

        @if ($errors->has('txtMeasurementNameEN'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('txtMeasurementNameEN') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('measurement-name-bn', 'Measurement Name (Bangla)') }}
        {{ Form::text('txtMeasurementNameBN',old("txtMeasurementNameBN"),['class'=>'form-control'])}}

        @if ($errors->has('txtMeasurementNameBN'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('txtMeasurementNameBN') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        <div class="form-animate-radio">
          {{ Form::label('active', 'Active : ', ['class'=>'radio']) }}

          <label class="radio">
          {{Form::radio('rdoIsActive', 'Y', true)}}
          <span class="outer">
            <span class="inner"></span></span> Yes
          </label>

          <label class="radio">
          {{Form::radio('rdoIsActive', 'N')}}
          <span class="outer">
            <span class="inner"></span></span> No
          </label>
        </div>
      </div>

      <div class="form-group pull-right">
        {{Form::reset('Refresh',['class'=>'submit btn btn-warning'])}}
        {{Form::submit('Submit',['class'=>'submit btn btn-success'])}}
      </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      <h4>Product Measurement List</h4>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      <div class="col-md-12">
        <span class="bold text-primary">Total number of item </span> ({{$qItems->total()}})
        <table class="table-striped" style="width:100%;">
          <tr>
            <td>ID</td>
            <td>Measurement (Bangla)</td>
            <td>Measurement (English)</td>
            <td>Active</td>
            <td>Edit</td>
          </tr>

          @if(!empty($qItems))
          @foreach($qItems as $sItem)
          <tr>
            <td>{{$sItem->id}}</td>
            <td>{{$sItem->measurement_name_en}}</td>
            <td>{{$sItem->measurement_name_bn}}</td>
            <td>
              @if($sItem->is_active=='Y')
              <i class="fa fa-check-square-o text-success"></i>
              @elseif($sItem->is_active=='N')
              <i class="fa fa-close text-danger"></i>
              @endif
            </td>
            <td>
              <button type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal{{$sItem->id}}"><i class="fa fa-edit"></i></button>
            </td>
          </tr>

          <!-- Modal -->
          <div id="myModal{{$sItem->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-info"> Update product measurement information</h4>
                </div>
                <div class="modal-body">
                {!!Form::open(['url'=>['product-measurement',$sItem->id],'method'=>'put', 'enctype'=>'multipart/form-data'])!!}

                <div class="form-group">
                  {{ Form::label('measurement-name-en', 'Measurement Name (English)') }}
                  {{ Form::text('txtMeasurementNameEN',$sItem->measurement_name_en,['class'=>'form-control','required'])}}
                </div>

                <div class="form-group">
                  {{ Form::label('measurement-name-bn', 'Measurement Name (Bangla)') }}
                  {{ Form::text('txtMeasurementNameBN',$sItem->measurement_name_bn,['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                  <div class="form-animate-radio">
                    {{ Form::label('active', 'Active : ', ['class'=>'radio']) }}

                    <label class="radio">
                    {{Form::radio('rdoIsActive', 'Y', $sItem->is_active=='Y'?'true':'')}}
                    <span class="outer">
                      <span class="inner"></span></span> Yes
                    </label>

                    <label class="radio">
                    {{Form::radio('rdoIsActive', 'N', $sItem->is_active=='N'?'true':'')}}
                    <span class="outer">
                      <span class="inner"></span></span> No
                    </label>
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
        @if(!empty($sItems))
          {{ $sItems->links() }}
        @endif
      </div>

    </div>

  </div>
</div>

@endsection
