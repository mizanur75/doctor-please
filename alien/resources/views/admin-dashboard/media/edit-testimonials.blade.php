@extends('admin-dashboard.home')
@section('heading','Testimonials Information')
@section('title',' Media > Edit Testimonials')
@section('content')

<div class="col-sm-12">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <div class="alert alert-{{ $msg }} alert-outline alert-dismissible fade in" role="alert">
        {{ Session::get('alert-' . $msg) }}   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">Ãƒâ€”</span></button>
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
      {!!Form::open(['url'=>['testimonials',$qItems->id],'method'=>'put', 'enctype'=>'multipart/form-data'])!!}

      <div class="form-group">
        {{ Form::label('Testimonials-name-bn', 'Testimonials Title (Bangla)') }}
        {{ Form::text('txtTestimonialsTitleBN',$qItems->testimonials_title_bn,['class'=>'form-control','required'])}}

        @if ($errors->has('txtTestimonialsTitleBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtTestimonialsTitleBN') }}</strong>
          </span>
        @endif
      </div>
      <div class="form-group">
        {{ Form::label('Testimonials-designation', 'Testimonials Designation (Bangla)') }}
        {{ Form::text('txtDesignation',$qItems->designation,['class'=>'form-control','required'])}}

        @if ($errors->has('txtDesignation'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtDesignation') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('Testimonials-brief-bn', 'Testimonials Brief (Bangla)') }}
        {{ Form::textarea('txtTestimonialsBriefBN',$qItems->testimonials_brief_bn,['class'=>'form-control','required'])}}

        @if ($errors->has('txtTestimonialsBriefBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtTestimonialsBriefBN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('Testimonials-details-bn', 'Testimonials Details (Bangla)') }}
        {{ Form::textarea('txtTestimonialsDetailsBN',$qItems->testimonials_details_bn,['class'=>'form-control','required'])}}

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
          {{Form::radio('rdoIsActive', 'Y',$qItems->is_active=='Y'?'true':'')}}
          <span class="outer">
            <span class="inner"></span></span> Yes
          </label>

          <label class="radio">
          {{Form::radio('rdoIsActive', 'N', $qItems->is_active=='N'?'true':'')}}
          <span class="outer">
            <span class="inner"></span></span> No
          </label>
        </div>

        <div class="col-sm-6 form-animate-radio">
          {{ Form::label('show-home', 'Show Home : ', ['class'=>'radio']) }}

          <label class="radio">
          {{Form::radio('rdoShowHome', 'Y', $qItems->show_home=='Y'?'true':'')}}
          <span class="outer">
            <span class="inner"></span></span> Yes
          </label>

          <label class="radio">
          {{Form::radio('rdoShowHome', 'N', $qItems->show_home=='N'?'true':'')}}
          <span class="outer">
            <span class="inner"></span></span> No
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-7 form-group form-animate-checkbox">
          <input type="checkbox" class="checkbox" value="D" id="validate_agree" name="validate_agree">
          <label>If you want to delete old image, please check it.</label>
        </div>

        <div class="col-sm-5 input-group fileupload-v1">
          {{Form::file('fImageFile',['class'=>'fileupload-v1-file hidden'])}}
          {{Form::hidden('fBigImage',$qItems->testimonials_big_image)}}
          {{Form::hidden('fSmallImage',$qItems->testimonials_small_image)}}
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
        {{ Form::label('Testimonials-name-en', 'Testimonials Title (English)') }}
        {{ Form::text('txtTestimonialsTitleEN',$qItems->testimonials_title_en,['class'=>'form-control'])}}

        @if ($errors->has('txtTestimonialsTitleEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtTestimonialsTitleEN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('Testimonials-brief-en', 'Testimonials Brief (English)') }}
        {{ Form::textarea('txtTestimonialsBriefEN',$qItems->testimonials_brief_en,['class'=>'form-control','required'])}}

        @if ($errors->has('txtTestimonialsBriefEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtTestimonialsBriefEN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('Testimonials-details-en', 'Testimonials Details (English)') }}
        {{ Form::textarea('txtTestimonialsDetailsEN',$qItems->testimonials_details_en,['class'=>'form-control','required'])}}

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
          {{Form::submit('Update',['class'=>'submit btn btn-primary'])}}
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
