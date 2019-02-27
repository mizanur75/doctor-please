@extends('admin-dashboard.home')
@section('heading','Edit Blog')
@section('title',' Blog Information > Edit Blog')
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
      <h4>Blog Information Bangla</h4>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      {!!Form::open(['url'=>['blog-information',$qItems->id],'method'=>'put', 'enctype'=>'multipart/form-data'])!!}

      <div class="form-group">
        {{Form::select('cmbBlogCategory', $qBlogCategory, ['cmbBlogCategory'=>$qItems->blog_category_id], ['class'=>'form-control','placeholder' => 'Select Blog Category...'])}}

        @if ($errors->has('cmbBlogCategory'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('cmbBlogCategory') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('blog-name-bn', 'Blog Title (Bangla)') }}
        {{ Form::text('txtBlogTitleBN',$qItems->blog_title_bn,['class'=>'form-control','maxlength'=>'55','required'])}}

        @if ($errors->has('txtBlogTitleBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtBlogTitleBN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('blog-brief-bn', 'Blog Brief (Bangla)') }}
        {{ Form::textarea('txtBlogBriefBN',$qItems->blog_brief_bn,['class'=>'form-control','maxlength'=>'155','required'])}}

        @if ($errors->has('txtBlogBriefBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtBlogBriefBN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('blog-details-bn', 'Blog Details (Bangla)') }}
        {{ Form::textarea('txtBlogDetailsBN',$qItems->blog_details_bn,['class'=>'form-control','required'])}}

        @if ($errors->has('txtBlogDetailsBN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtBlogDetailsBN') }}</strong>
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
          {{Form::hidden('fBigImage',$qItems->blog_big_image)}}
          {{Form::hidden('fSmallImage',$qItems->blog_small_image)}}
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
        <h4>Blog Information English</h4>
      </div>

      <div class="col-sm-6">
        <a href="{{url('blog-information')}}" class="btn btn-md btn-info pull-right"><i class="fa fa-exchange"></i> All Blog Post</a>
      </div>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">

      <div class="form-group">
        {{ Form::text('txtAuthorName',$qItems->author_name,['class'=>'form-control','placeholder'=>'Author Name','maxlength'=>'69'])}}

        @if ($errors->has('txtAuthorName'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtAuthorName') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('blog-name-en', 'Blog Title (English)') }}
        {{ Form::text('txtBlogTitleEN',$qItems->blog_title_en,['class'=>'form-control','maxlength'=>'55'])}}

        @if ($errors->has('txtBlogTitleEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtBlogTitleEN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('blog-brief-en', 'Blog Brief (English)') }}
        {{ Form::textarea('txtBlogBriefEN',$qItems->blog_brief_en,['class'=>'form-control','maxlength'=>'155'])}}

        @if ($errors->has('txtBlogBriefEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtBlogBriefEN') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('blog-details-en', 'Blog Details (English)') }}
        {{ Form::textarea('txtBlogDetailsEN',$qItems->blog_details_en,['class'=>'form-control'])}}

        @if ($errors->has('txtBlogDetailsEN'))
          <span class="help-block text-danger">
            <strong>{{ $errors->first('txtBlogDetailsEN') }}</strong>
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
    CKEDITOR.replace( 'txtBlogBriefBN' );
    CKEDITOR.replace( 'txtBlogDetailsBN' );
    CKEDITOR.replace( 'txtBlogBriefEN' );
    CKEDITOR.replace( 'txtBlogDetailsEN' );
</script>

@endsection
