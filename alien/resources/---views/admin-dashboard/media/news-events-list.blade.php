@extends('admin-dashboard.home')
@section('heading','News & Events Information')
@section('title',' Media > News & Events Information')
@section('content')

<div class="col-md-12">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      <div class="col-md-10">
        <h4>News List</h4>
      </div>

      <div class="col-sm-2">
        <a href="{{url('news-events','create')}}" class="btn btn-md btn-info"><i class="fa fa-plus"></i> New News & Events</a>
      </div>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      <div class="col-md-12">
        <span class="bold text-primary">Total number of post </span> ({{$qItems->total()}})
        <table class="table-striped" style="width:100%;">
          <tr>
            <td>ID</td>
            <td>Image</td>
            <td>News Name Eng.</td>
            <td>News Brief Bng</td>
            <td>News Name Bng</td>
            <td>News Brief Bng</td>
            <td>Active</td>
            <td>Edit</td>
          </tr>

          @if(!empty($qItems))
          @foreach($qItems as $qItem)
          <tr>
            <td>{{$qItem->id}}</td>
            <td><img src="{{asset($qItem->news_small_image)}}" class="img img-responsive" style="Width:250px;Height:150px;"/></td>
            <td>{{$qItem->news_title_bn}}</td>
            <td>{{$qItem->news_brief_bn}}</td>
            <td>{{$qItem->news_title_en}}</td>
            <td>{{$qItem->news_brief_en}}</td>
            <td>
              @if($qItem->is_active=='Y')
              <i class="fa fa-check-square-o text-success"></i>
              @elseif($qItem->is_active=='N')
              <i class="fa fa-close text-danger"></i>
              @endif
            </td>
            <td>
              <a href="{{url('news-events', $qItem->id)}}" class="btn btn-round btn-warning"><i class="fa fa-edit"></i></a>
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
