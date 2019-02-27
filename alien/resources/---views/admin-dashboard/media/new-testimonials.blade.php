@extends('admin-dashboard.home')
@section('heading','Testimonials Information')
@section('title',' Media > New Testimonials')
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
      <h4>Testimonials Information Bangla</h4>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      {!!Form::open(['url'=>'testimonials','method'=>'post', 'enctype'=>'multipart/form-data'])!!}

      <div class="form-group">
        {{ Form::label('Testimonials-Title-bn', 'Testimonials Title (Bangla)') }}
        {{ Form::text('txtTestimonialsTitleBN',old("txtTestimonialsTitleBN"),['class'=>'form-control','maxlength'=>'55','required'])}}

        @if ($errors->has('txtTestimonialsTitleBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtTestimonialsTitleBN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('Testimonials-brief-bn', 'Testimonials Brief (Bangla)') }}
        {{ Form::textarea('txtTestimonialsBriefBN',old("txtTestimonialsBriefBN"),['class'=>'form-control','maxlength'=>'155','required'])}}

        @if ($errors->has('txtTestimonialsBriefBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtTestimonialsBriefBN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('Testimonials-details-bn', 'Testimonials Details (Bangla)') }}
        {{ Form::textarea('txtTestimonialsDetailsBN',old("txtTestimonialsDetailsBN"),['class'=>'form-control','required'])}}

        @if ($errors->has('txtTestimonialsDetailsBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtTestimonialsDetailsBN') }}</strong>
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
          {{ Form::label('show-home', 'Show Home : ', ['class'=>'radio']) }}

          <label class="radio">
          {{Form::radio('rdoShowHome', 'Y')}}
          <span class="outer">
            <span class="inner"></span></span> Yes
          </label>

          <label class="radio">
          {{Form::radio('rdoShowHome', 'N', 'true')}}
          <span class="outer">
            <span class="inner"></span></span> No
          </label>
        </div>
      </div>

      <div class="form-group">
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

<div class="col-md-6">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      <div class="col-sm-6">
        <h4>Testimonials Information English</h4>
      </div>

      <div class="col-sm-6">
        <a href="{{url('testimonials')}}" class="btn btn-md btn-info pull-right"><i class="fa fa-exchange"></i> All Testimonials Post</a>
      </div>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">

      <div class="form-group">
        {{ Form::label('Testimonials-Title-en', 'Testimonials Title (English)') }}
        {{ Form::text('txtTestimonialsTitleEN',old("txtTestimonialsTitleEN"),['class'=>'form-control','maxlength'=>'55'])}}

        @if ($errors->has('txtTestimonialsTitleEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtTestimonialsTitleEN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('Testimonials-brief-en', 'Testimonials Brief (English)') }}
        {{ Form::textarea('txtTestimonialsBriefEN',old("txtTestimonialsBriefBN"),['class'=>'form-control','maxlength'=>'155','required'])}}

        @if ($errors->has('txtTestimonialsBriefEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtTestimonialsBriefEN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('Testimonials-details-en', 'Testimonials Details (English)') }}
        {{ Form::textarea('txtTestimonialsDetailsEN',old("txtTestimonialsDetailsEN"),['class'=>'form-control','required'])}}

        @if ($errors->has('txtTestimonialsDetailsEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtTestimonialsDetailsEN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        <div class="col-sm-1">Big Width</div>
        <div class="col-sm-2">{{ Form::text('txtBigImgWidth',270,['class'=>'form-control','required'])}}</div>
        <div class="col-sm-1">Big Height</div>
        <div class="col-sm-2">{{ Form::text('txtBigImgHeight',350,['class'=>'form-control','required'])}}</div>
        <div class="col-sm-1">Small Width</div>
        <div class="col-sm-2">{{ Form::text('txtSmallImgWidth',100,['class'=>'form-control','required'])}}</div>
        <div class="col-sm-1">Small Height</div>
        <div class="col-sm-2">{{ Form::text('txtSmallImgHeight',100,['class'=>'form-control','required'])}}</div>
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
    CKEDITOR.replace( 'txtTestimonialsBriefBN' );
    CKEDITOR.replace( 'txtTestimonialsDetailsBN' );
    CKEDITOR.replace( 'txtTestimonialsBriefEN' );
    CKEDITOR.replace( 'txtTestimonialsDetailsEN' );
</script>

@endsection
