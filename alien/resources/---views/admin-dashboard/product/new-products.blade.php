@extends('admin-dashboard.home')
@section('heading','New Product')
@section('title',' Producr Settings > Create New Product')
@section('content')

<div class="col-sm-12">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <div class="alert alert-{{ $msg }} alert-outline alert-dismissible fade in" role="alert">
        {{ Session::get('alert-' . $msg) }}   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">Ã—</span></button>
      </div>
    @endif
  @endforeach
</div>

<div class="col-md-6">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      <h4>Product Information Bangla</h4>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      {!!Form::open(['url'=>'product-information','method'=>'post', 'enctype'=>'multipart/form-data'])!!}

      <div class="form-group">
        {{Form::select('cmbProductCategory', $qProductCategory, null, ['class'=>'form-control','placeholder' => 'Select Product Category...'])}}

        @if ($errors->has('cmbProductCategory'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('cmbProductCategory') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('product-name-bn', 'Product Name (Bangla)') }}
        {{ Form::text('txtProductNameBN',old("txtProductNameBN"),['class'=>'form-control','maxlength'=>'55','required'])}}

        @if ($errors->has('txtProductNameBN'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('txtProductNameBN') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('product-brief-bn', 'Product Brief (Bangla)') }}
        {{ Form::textarea('txtProductBriefBN',old("txtProductBriefBN"),['class'=>'form-control','maxlength'=>'155','required'])}}

        @if ($errors->has('txtProductBriefBN'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('txtProductBriefBN') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('product-details-bn', 'Product Details (Bangla)') }}
        {{ Form::textarea('txtProductDetailsBN',old("txtProductDetailsBN"),['class'=>'form-control','required'])}}

        @if ($errors->has('txtProductDetailsBN'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('txtProductDetailsBN') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        <div class="col-sm-6 form-animate-radio">
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

        <div class="col-sm-6 form-animate-radio">
          {{ Form::label('ShowHome', 'Show Home : ', ['class'=>'radio']) }}

          <label class="radio">
          {{Form::radio('rdoShowHome', 'Y')}}
          <span class="outer">
            <span class="inner"></span></span> Yes
          </label>

          <label class="radio">
          {{Form::radio('rdoShowHome', 'N', true)}}
          <span class="outer">
            <span class="inner"></span></span> No
          </label>
        </div>

      </div>

      <div class="form-group">
        <div class="col-sm-12 form-animate-radio">
          <div class="row">
            <div class="input-group fileupload-v1">
              {{Form::file('fImageFile',['class'=>'fileupload-v1-file hidden'])}}
              <input type="text" class="form-control fileupload-v1-path" placeholder="File Path..." disabled="">
              <span class="input-group-btn">
                <button class="btn fileupload-v1-btn" type="button"><i class="fa fa-folder"></i> Choose File</button>
              </span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      <div class="col-sm-6">
        <h4>Product Information English</h4>
      </div>

      <div class="col-sm-6">
        <a href="{{url('product-information')}}" class="btn btn-md btn-info pull-right"><i class="fa fa-exchange"></i> Product List</a>
      </div>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">

      <div class="form-group">
        {{ Form::label('product-name-en', 'Product Name (English)') }}
        {{ Form::text('txtProductNameEN',old("txtProductNameEN"),['class'=>'form-control','maxlength'=>'55','required'])}}

        @if ($errors->has('txtProductNameEN'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('txtProductNameEN') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('product-brief-en', 'Product Brief (English)') }}
        {{ Form::textarea('txtProductBriefEN',old("txtProductBriefBN"),['class'=>'form-control','maxlength'=>'155','required'])}}

        @if ($errors->has('txtProductBriefEN'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('txtProductBriefEN') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('product-details-en', 'Product Details (English)') }}
        {{ Form::textarea('txtProductDetailsEN',old("txtProductDetailsEN"),['class'=>'form-control','required'])}}

        @if ($errors->has('txtProductDetailsEN'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('txtProductDetailsEN') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        <div class="col-sm-1">Big Width</div>
        <div class="col-sm-2">{{ Form::text('txtBigImgWidth',500,['class'=>'form-control','required'])}}</div>
        <div class="col-sm-1">Big Height</div>
        <div class="col-sm-2">{{ Form::text('txtBigImgHeight',500,['class'=>'form-control','required'])}}</div>
        <div class="col-sm-1">Small Width</div>
        <div class="col-sm-2">{{ Form::text('txtSmallImgWidth',160,['class'=>'form-control','required'])}}</div>
        <div class="col-sm-1">Small Height</div>
        <div class="col-sm-2">{{ Form::text('txtSmallImgHeight',180,['class'=>'form-control','required'])}}</div>
      </div>

      <div class="form-group">
        <div class="col-sm-8 form-animate-radio margin-top40">
          {{ Form::label('generate', 'Generate HTML : ', ['class'=>'radio']) }}

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

        <div class="col-sm-4 margin-top40">
          {{Form::reset('Refresh',['class'=>'submit btn btn-warning'])}}
          {{Form::submit('Submit',['class'=>'submit btn btn-success'])}}
        </div>
      </div>

      {!! Form::close() !!}

    </div>

  </div>
</div>

<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'txtProductBriefBN' );
    CKEDITOR.replace( 'txtProductDetailsBN' );
    CKEDITOR.replace( 'txtProductBriefEN' );
    CKEDITOR.replace( 'txtProductDetailsEN' );
</script>

@endsection
