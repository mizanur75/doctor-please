@extends('admin-dashboard.home')
@section('heading','All Members Information')
@section('title',' Members & Patients > Members Information')
@section('content')

<div class="col-md-12">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      {!!Form::open(['url'=>'members-information','method'=>'get', 'enctype'=>'multipart/form-data'])!!}
      <div class="col-sm-6">
        {{ Form::text('txtSearchName',old("txtSearchName"),['class'=>'form-control','id'=>'date_from','placeholder' => 'User Name'])}}
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
        <span class="bold text-primary">Total number of member </span> ({{$qItems->total()}})
        <table class="table-striped" style="width:100%;">
          <tr>
            <td>#</td>
            <td>Image</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Gender</td>
            <td>Active</td>
            <td>View</td>
          </tr>

          @if(!empty($qItems))
            @foreach($qItems as $sItem)
            <tr>
              <td>{{$sItem->id}}</td>
              <td>
                @if(!empty($sItem->image_path))
                <img src="{{$sItem->image_path}}"  class="img img-responsive" style="width:100px;height:100px;"/>
                @else
                <img src="{{asset('images/2018/profile/profile.png')}}"  class="img img-responsive" style="width:100px;height:100px;"/>
                @endif
              </td>
              <td>{{$sItem->name}}</td>
              <td>{{$sItem->email}}</td>
              <td>{{'88'.$sItem->mobile}}</td>
              <td>
                <!-- if($sItem->gender =='M')
                <i class="fa fa-male text-success"></i>
                elseif($sItem->gender =='F')
                <i class="fa fa-female text-info"></i>
                else
                <span class="text-muted">N/A</span>
                endif -->
              </td>
              <td>
                @if($sItem->is_active=='Y')
                  <i class="fa fa-check-square-o text-success"></i>
                @elseif($sItem->is_active=='N')
                  <i class="fa fa-close text-danger"></i>
                @endif
              </td>

              <td>
                <button type="button" class="btn btn-round btn-info" ><i class="fa fa-eye"></i></button>
              </td>
            </tr>
            @endforeach
          @endif
        </table>
        @if(!empty($qItems))
          {{ $qItems->links() }}
        @endif
      </div>

    </div>

  </div>
</div>

@endsection
