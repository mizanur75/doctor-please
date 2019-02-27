@extends('admin-dashboard.home')
@section('heading','Gallery Image')
@section('title',' Media > Gallery Image')
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
      <h4>Create Gallery Image</h4>
    </div>
    <div class="col-md-12 panel-body padding-bottom30">
      {!!Form::open(['url'=>'gallery-image','method'=>'post', 'enctype'=>'multipart/form-data'])!!}

      <div class="form-group">
        {{ Form::label('gallery-category', 'Image Gallery') }}
        {{ Form::select('cmbGalleryCategory',$qGalleryCategory,null,['class'=>'form-control','placeholder' => 'Image Gallery Category']) }}

        @if ($errors->has('cmbGalleryCategory'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('cmbGalleryCategory') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('Image-Title', 'Image Title') }}
        {{ Form::text('txtImageTitle',old("txtImageTitle"),['class'=>'form-control'])}}

        @if ($errors->has('txtImageTitle'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('txtImageTitle') }}</strong>
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
          <div class="input-group fileupload-v1">
            {{Form::file('fImageFile',['class'=>'fileupload-v1-file hidden'])}}
            <input type="text" class="form-control fileupload-v1-path" placeholder="File Path..." disabled="">
            <span class="input-group-btn">
              <button class="btn fileupload-v1-btn" type="button"><i class="fa fa-folder"></i> Choose File</button>
            </span>
          </div>
        </div>
      </div>

      <div class="form-group pull-right">
        <br />
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
      <div class="col-sm-4">
        <h4>Gallery Image List</h4>
      </div>

      <div class="col-md-8">
        {!!Form::open(['url'=>'gallery-image','method'=>'get', 'enctype'=>'multipart/form-data'])!!}
        <div class="col-sm-10">
          <div class="row">
            {{Form::select('cmbGalleryCategory', $qGalleryCategory, null, ['class'=>'form-control','placeholder' => 'Select user type...'])}}
          </div>
        </div>
        <div class="col-sm-2">
          <div class="row">
            {{Form::submit('Search',['class'=>'submit btn btn-info'])}}
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      <div class="col-md-12">
        <span class="bold text-primary">Total number of item </span> ({{$qItems->total()}})
        <table class="table-striped" style="width:100%;">
          <tr>
            <td>ID</td>
            <td>Image</td>
            <td>Image Title</td>
            <td>Active</td>
            <td>Edit</td>
          </tr>

          @if(!empty($qItems))
          @foreach($qItems as $sItem)
          <tr>
            <td>{{$sItem->id}}</td>
            <td><img src="{{$sItem->image_path}}"  class="img img-responsive" style="width:150px;height:100px;"/></td>
            <td>{{$sItem->image_title}}</td>
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
                  <h4 class="modal-title text-info"> Update Gallery Image information</h4>
                </div>
                <div class="modal-body">
                {!!Form::open(['url'=>['gallery-image',$sItem->id],'method'=>'put', 'enctype'=>'multipart/form-data'])!!}

                  <div class="form-group">
                    {{ Form::label('gallery-category', 'Gallery category ') }}
                    {{ Form::select('cmbGalleryCategory',$qGalleryCategory,['cmbGalleryCategory'=>$sItem->category_id],['class'=>'form-control','placeholder' => 'Image Gallery Category']) }}
                  </div>

                  <div class="form-group">
                    {{ Form::label('Image-name-bn', 'Image Title') }}
                    {{ Form::text('txtImageTitle',$sItem->image_title,['class'=>'form-control'])}}
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6 form-animate-radio">
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

                  <div class="form-group">
                    <div class="input-group fileupload-v1">
                      {{Form::hidden('oldImage',$sItem->image_path)}}
                      {{Form::file('fImageFile',['class'=>'fileupload-v1-file hidden'])}}
                      <input type="text" class="form-control fileupload-v1-path" placeholder="File Path..." disabled="">
                      <span class="input-group-btn">
                        <button class="btn fileupload-v1-btn" type="button"><i class="fa fa-folder"></i> Choose File</button>
                      </span>
                    </div>

                    <div class="row">
                      <div class="form-group form-animate-checkbox">
                        <input type="checkbox" class="checkbox" value="D" id="validate_agree" name="validate_agree">
                        <label>If you want to delete.</label>
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
        @if(!empty($sItems))
          {{ $sItems->links() }}
        @endif
      </div>

    </div>

  </div>
</div>

@endsection
