@extends('admin-dashboard.home')
@section('heading','Product Information')
@section('title',' Producr Settings > Producr Information')
@section('content')

<div class="col-md-12">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      <div class="col-md-4">
        <h4>Product List</h4>
      </div>
      {!!Form::open(['url'=>'product-information','method'=>'get', 'enctype'=>'multipart/form-data'])!!}

      <div class="col-sm-4">
        <div class="row">
          {{Form::select('cmbProductCategory', $qProductCategory, null, ['class'=>'form-control','placeholder' => 'Select Product Category...'])}}
        </div>
      </div>
      <div class="col-sm-2">
        <div class="row">
          {{Form::submit('Search',['class'=>'submit btn btn-info'])}}
        </div>
      </div>

      {!! Form::close() !!}

      <div class="col-sm-2">
        <a href="{{url('product-information','create')}}" class="btn btn-md btn-info"><i class="fa fa-plus"></i> Creat New Product</a>
      </div>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      <div class="col-md-12">
        <span class="bold text-primary">Total number of prodict </span> ({{$qItems->total()}})
        <table class="table-striped" style="width:100%;">
          <tr>
            <td>ID</td>
            <td>Image</td>
            <td>Product Name Eng.</td>
            <td>Product Brief Bng</td>
            <td>Product Name Bng</td>
            <td>Product Brief Bng</td>
            <td>Active</td>
            <td>Edit</td>
          </tr>

          @if(!empty($qItems))
          @foreach($qItems as $qItem)
          <tr>
            <td>{{$qItem->id}}</td>
            <td><img src="{{asset($qItem->product_small_image)}}" class="img img-responsive" style="Width:85px;Height:100px;"/></td>
            <td>{{$qItem->product_name_en}}</td>
            <td>{{$qItem->product_brief_en}}</td>
            <td>{{$qItem->product_name_bn}}</td>
            <td>{{$qItem->product_brief_bn}}</td>
            <td>
              @if($qItem->is_active=='Y')
              <i class="fa fa-check-square-o text-success"></i>
              @elseif($qItem->is_active=='N')
              <i class="fa fa-close text-danger"></i>
              @endif
            </td>
            <td>
              <a href="{{url('product-information', $qItem->id)}}" class="btn btn-round btn-warning"><i class="fa fa-edit"></i></a>
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
