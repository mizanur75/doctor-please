@extends('admin-dashboard.home')
@section('heading','Edit News & Events')
@section('title',' Media > Edit News & Events')
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
      <h4>News Information Bangla</h4>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      {!!Form::open(['url'=>['news-events',$qItems->id],'method'=>'put', 'enctype'=>'multipart/form-data'])!!}

      <div class="form-group">
        {{ Form::label('News-name-bn', 'News Title (Bangla)') }}
        {{ Form::text('txtNewsTitleBN',$qItems->news_title_bn,['class'=>'form-control','required'])}}

        @if ($errors->has('txtNewsTitleBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtNewsTitleBN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('News-brief-bn', 'News Brief (Bangla)') }}
        {{ Form::textarea('txtNewsBriefBN',$qItems->news_brief_bn,['class'=>'form-control','required'])}}

        @if ($errors->has('txtNewsBriefBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtNewsBriefBN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('News-details-bn', 'News Details (Bangla)') }}
        {{ Form::textarea('txtNewsDetailsBN',$qItems->news_details_bn,['class'=>'form-control','required'])}}

        @if ($errors->has('txtNewsDetailsBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtNewsDetailsBN') }}</strong>
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
          {{Form::hidden('fBigImage',$qItems->news_big_image)}}
          {{Form::hidden('fSmallImage',$qItems->news_small_image)}}
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
        <h4>News Information English</h4>
      </div>

      <div class="col-sm-6">
        <a href="{{url('news-events')}}" class="btn btn-md btn-info pull-right"><i class="fa fa-exchange"></i> All News Post</a>
      </div>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">

      <div class="form-group">
        {{ Form::label('News-name-en', 'News Title (English)') }}
        {{ Form::text('txtNewsTitleEN',$qItems->news_title_en,['class'=>'form-control'])}}

        @if ($errors->has('txtNewsTitleEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtNewsTitleEN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('News-brief-en', 'News Brief (English)') }}
        {{ Form::textarea('txtNewsBriefEN',$qItems->news_brief_en,['class'=>'form-control','required'])}}

        @if ($errors->has('txtNewsBriefEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtNewsBriefEN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('News-details-en', 'News Details (English)') }}
        {{ Form::textarea('txtNewsDetailsEN',$qItems->news_details_en,['class'=>'form-control','required'])}}

        @if ($errors->has('txtNewsDetailsEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtNewsDetailsEN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        <div class="col-sm-1">Big Width</div>
        <div class="col-sm-2">{{ Form::text('txtBigImgWidth',740,['class'=>'form-control','required'])}}</div>
        <div class="col-sm-1">Big Height</div>
        <div class="col-sm-2">{{ Form::text('txtBigImgHeight',400,['class'=>'form-control','required'])}}</div>
        <div class="col-sm-1">Small Width</div>
        <div class="col-sm-2">{{ Form::text('txtSmallImgWidth',350,['class'=>'form-control','required'])}}</div>
        <div class="col-sm-1">Small Height</div>
        <div class="col-sm-2">{{ Form::text('txtSmallImgHeight',250,['class'=>'form-control','required'])}}</div>
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
    CKEDITOR.replace( 'txtNewsBriefBN' );
    CKEDITOR.replace( 'txtNewsDetailsBN' );
    CKEDITOR.replace( 'txtNewsBriefEN' );
    CKEDITOR.replace( 'txtNewsDetailsEN' );
</script>

@endsection
