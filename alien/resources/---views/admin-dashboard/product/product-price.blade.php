@extends('admin-dashboard.home')
@section('heading','Product Price')
@section('title',' Producr Settings > Product Price')
@section('content')

<div class="col-sm-12">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <div class="alert alert-{{ $msg }} alert-outline alert-dismissible fade in" role="alert">
        {{ Session::get('alert-' . $msg) }}   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">X</span></button>
      </div>
    @endif
  @endforeach
</div>

<div class="col-md-6">
  <div class="col-md-12 panel">
    <div class="col-md-12 panel-heading">
      <h4>Product Price Information</h4>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      {!!Form::open(['url'=>'product-price','method'=>'post', 'enctype'=>'multipart/form-data'])!!}

      <div class="form-group">
        {{ Form::label('product-cat', 'Product Category') }}
        {{Form::select('cmbProductCategory', $qProductCategory, null, ['class'=>'form-control','placeholder' => 'Select Product Category...','required'])}}

        @if ($errors->has('cmbProductCategory'))
            <span class="help-block text-danger">
                 <strong>{{ $errors->first('cmbProductCategory') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('product-info', 'Product Information') }}
        {{ Form::select('cmbProductInfo',[''=>'--- Select Product ---'],null,['class'=>'form-control','required']) }}

        @if ($errors->has('cmbProductInfo'))
          <span class="help-block text-danger">
             <strong>{{ $errors->first('cmbProductInfo') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        {{ Form::label('product-measurement', 'Product Measurement') }}
        {{Form::select('cmbProductMeasurement', $qProductMeasurement, null, ['class'=>'form-control','placeholder' => 'Select Product Measurement','required'])}}
        @if ($errors->has('cmbProductInfo'))
          <span class="help-block text-danger">
             <strong>{{ $errors->first('cmbProductInfo') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group">
        <div class="row">
          <div class="col-sm-4">
            {{ Form::text('txtProductPriceBDT',old("txtProductPriceBDT"),['class'=>'form-control','placeholder' => 'Product Price BDT','required'])}}
          </div>

          <div class="col-sm-4">
            {{ Form::text('txtProductPriceUSD',old("txtProductPriceUSD"),['class'=>'form-control','placeholder' => 'Product Price USD'])}}
          </div>

          <div class="col-sm-4">
            {{ Form::text('txtProductStock',old("txtProductStock"),['class'=>'form-control','placeholder' => 'Product Stock'])}}
          </div>
        </div>
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


      <div class="form-group pull-right margin-top40">
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
      <div class="col-sm-6">
        <h4>Product Price Information</h4>
      </div>

      <div class="col-sm-6">
        <a href="{{url('product-information')}}" class="btn btn-md btn-info pull-right"><i class="fa fa-exchange"></i> Product List</a>
      </div>
    </div>

    <div class="col-md-12 panel-body padding-bottom30">
      <table style="Width:100%;">
        <tr>
          <td><strong>#</td>
          <td><strong>Product Name</strong></td>
          <td class="text-success"><strong>Price (BDT)</strong></td>
          <td class="text-warning"><strong>Price (USD)</strong></td>
          <td class="text-danger"><strong>Stock</strong></td>
          <td><strong>Active</strong></td>
          <td><strong>Edit</strong></td>
        </tr>
        @if(!empty($qItems))
        @foreach($qItems as $sItem)
        <tr>
          <td><strong>{{$sItem->id}}</strong></td>
          <td><strong>{{$sItem->product_name_en}}</strong></td>
          <td class="text-muted"><strong>{{$sItem->product_price_tk.' TK'}}</strong></td>
          <td class="text-info"><strong>{{$sItem->product_price_usd.' $'}}</strong></td>
          <td><strong>{{$sItem->product_stock.' '.$sItem->measurement_name_en}}</strong></td>
          <td>
            @if($sItem->is_active=='Y')
            <i class="fa fa-check-square-o text-success"></i>
            @elseif($sItem->is_active=='N')
            <i class="fa fa-close text-danger"></i>
            @endif
          </td>
          <td><button type="button" class="btn btn-round btn-warning" data-toggle="modal" data-target="#myModal{{$sItem->id}}"><i class="fa fa-edit"></i></button></td>
        </tr>

        <!-- Modal -->
        <div id="myModal{{$sItem->id}}" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-info"> Update product price information</h4>
              </div>
              <div class="modal-body">
              {!!Form::open(['url'=>['product-price',$sItem->id],'method'=>'put', 'enctype'=>'multipart/form-data'])!!}

              <div class="form-group">
                {{ Form::label('product-cat', 'Product Category') }}
                {{Form::select('cmbProductCategory', $qProductCategory, ['cmbProductCategory'=>$sItem->product_category_id], ['class'=>'form-control','placeholder' => 'Select Product Category...','required'])}}
              </div>

              <div class="form-group">
                {{ Form::label('product-info', 'Product Information') }}
                {{ Form::select('cmbProductInfo',$qProduct,['cmbProductInfo'=>$sItem->product_name_en],['class'=>'form-control','required']) }}
              </div>

              <div class="form-group">
                {{ Form::label('product-measurement', 'Product Measurement') }}
                {{Form::select('cmbProductMeasurement', $qProductMeasurement, ['cmbProductMeasurement'=>$sItem->measurement_id], ['class'=>'form-control','placeholder' => 'Select Product Measurement','required'])}}
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-sm-4">
                    {{ Form::text('txtProductPriceBDT',$sItem->product_price_tk,['class'=>'form-control','placeholder' => 'Product Price BDT','required'])}}
                  </div>

                  <div class="col-sm-4">
                    {{ Form::text('txtProductPriceUSD',$sItem->product_price_usd,['class'=>'form-control','placeholder' => 'Product Price USD'])}}
                  </div>

                  <div class="col-sm-4">
                    {{ Form::text('txtProductStock',$sItem->product_stock,['class'=>'form-control','placeholder' => 'Product Stock'])}}
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-animate-radio">
                  {{ Form::label('active', 'Active : ', ['class'=>'radio']) }}

                  <label class="radio">
                  {{Form::radio('rdoIsActive', 'Y',$sItem->is_active=='Y'?'true':'')}}
                  <span class="outer">
                    <span class="inner"></span></span> Yes
                  </label>

                  <label class="radio">
                  {{Form::radio('rdoIsActive', 'N',$sItem->is_active=='N'?'true':'')}}
                  <span class="outer">
                    <span class="inner"></span></span> No
                  </label>
                </div>
              </div>


              <div class="form-group">
                <div class="form-animate-radio">
                  {{ Form::label('active', 'Show Home : ', ['class'=>'radio']) }}

                  <label class="radio">
                  {{Form::radio('rdoShowHome', 'Y',$sItem->show_home=='Y'?'true':'')}}
                  <span class="outer">
                    <span class="inner"></span></span> Yes
                  </label>

                  <label class="radio">
                  {{Form::radio('rdoShowHome', 'N',$sItem->show_home=='N'?'true':'')}}
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

<script type="text/javascript">
  $("select[name='cmbProductCategory']").change(function(){
      var cmbProductCategory = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('select-product') ?>",
          method: 'POST',
          data: {cmbProductCategory:cmbProductCategory, _token:token},
          success: function(data) {
            $("select[name='cmbProductInfo'").html('');
            $("select[name='cmbProductInfo'").html(data.options);
          }
      });
  });
</script>

@endsection
