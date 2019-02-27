@extends('patient-dashboard.patient-home')
@section('heading','Order Medicine')
@section('title','Order Medicine')
@push('css')

@endpush
@section('content')



<div class="panel-body box">
  {!!Form::open(['url'=>'order-confirmation','method'=>'post'])!!}

    <div class="col-md-12 mar-top10 academic">
      <div class="row">
        <div class="col-sm-2"> {{ Form::label('receiver-name', 'Name') }} <i class="fa fa-star text-danger" aria-hidden="true"></i> </div>
        <div class="col-sm-6">
          {!! Form::text('txtReceiverName',old("txtReceiverName"),['class'=>'form-control','maxlength'=>'69','placeholder' => 'যে ঔষধ গ্রহন করবে তার নাম।','required']) !!}
          @if ($errors->has('txtReceiverName'))
          <span class="text-danger">
            <strong>{{ $errors->first('txtReceiverName') }}</strong>
          </span>
          @endif
        </div>

        <div class="col-sm-1"> {{ Form::label('phone-number', 'Phone') }} <i class="fa fa-star text-danger" aria-hidden="true"></i> </div>
        <div class="col-sm-3">
          {{ Form::text('txtPhoneNumber',old("txtPhoneNumber"),['class'=>'form-control','maxlength'=>'69','placeholder' => 'যে ঔষধ গ্রহন করবে তার মোবাইল নম্বর।','required'])}}
          @if ($errors->has('txtPhoneNumber'))
          <span class="text-danger">
            <strong>{{ $errors->first('txtPhoneNumber') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-2"> {{ Form::label('address', 'Address') }} <i class="fa fa-star text-danger" aria-hidden="true"></i></div>
        <div class="col-sm-10">
          {{ Form::text('txtAddress',old("txtAddress"),['class'=>'form-control','placeholder' => 'যে ঔষধ গ্রহন করবে তার ঠিকানা।','required'])}}
          @if ($errors->has('txtAddress'))
          <span class="text-danger">
            <strong>{{ $errors->first('txtAddress') }}</strong>
          </span>
          @endif
        </div>
      </div>
  </div>

  <div class="col-md-12">
    <div class="card-body">
      <div class="row table-responsive">
        <table class="table table-sm table-bordered">
          <thead>
            <tr>
              <th style="width: 20%;">Category</th>
              <th style="width: 20%;">Medicine Name</th>
              <th style="width: 20%;">Measurment</th>
              <th style="width: 13%;">Price</th>
              <th style="width: 10%;">Qty</th>
              <th style="width: 15%;">Line Total</th>
              <th style="width: 2%;">
                <input type="button" class="form-control form-control-sm addRow" name="dis" style="background-color: green; color: white;" value="+ Add"/>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="form-group">
                <select name="cmbProductCategory[]" class="form-control" required>
                  <option value="" selected="false">Category</option>
                  @foreach($qProductCategory as  $key=>$value)
                  <option value="{{$key}}">{{$value}}</option>
                  @endforeach

                </select>
                <span class="text-danger">প্রথমে ক্যাটেগরি নির্বাচন করুন।</span>
                @if ($errors->has('cmbProductCategory'))
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('cmbProductCategory') }}</strong>
                </span>
                @endif
              </td>
              <td>
                <select name="cmbProductInfo[]" class="form-control duplicat" required>
                  <option value="" selected="false">Select</option>
                </select>
                <span class="text-danger">এরপর ঔষুধের নাম নির্বাচন করুন।</span>
                @if ($errors->has('cmbProductInfo'))
                <span class="help-block text-danger">
                  <strong>{{ $errors->first('cmbProductInfo') }}</strong>
                </span>
                @endif
              </td>
              <td>
                <select name="cmbMeasurment[]" class="form-control form-control-sm measurement" required>
                  <option value="" selected="false">Select</option>
                </select>
                <span class="text-danger">তারপর ঔষুধের পরিমান নির্বাচন করুন।</span>
              </td>
              <td>
                <input type="text" name="price[]" readonly class="form-control form-control-sm price" required />
              </td>
              <td>
                <input type="text" name="qty[]" class="form-control form-control-sm qty" required />
                <span class="text-danger">এখন সংখ্যা প্রবেশ করান।।</span>
              </td>
              <td>
                <input type="text" name="lineTotal[]" class="form-control form-control-sm lineTotal" disabled>
              </td>
              <td><input type="button" class="form-control form-control-sm remove" name="dis" style="background-color: red; color: white; font-weight: bold;" value="x"/></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"></td>
              <td style="font-weight: bold;">Total</td>
              <td class="total"></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <!-- Prescription Footer -->
    <div class="row text-center" style="border-top:1px solid black;padding:5px;">
      <span" ><a class="text-danger href="{{url('condition-online-health-service')}}">শর্ত প্রযোজ্য</a></span>
      {{Form::submit('Confirm Order',['class'=>'pull-right btn btn-primary'])}}
    </div>
  </div>
  {!!Form::close()!!}
</div>

@endsection

@push('scripts')

<!-- Dropqown product measurement change by category first -->
<script type="text/javascript">
  $("select[name='cmbProductCategory[]']").change(function(){
    var cmbProductCategory = $(this).val();
    var token = $("input[name='_token']").val();
    $.ajax({
      url: "<?php echo route('select-product') ?>",
      method: 'POST',
      data: {cmbProductCategory:cmbProductCategory, _token:token},
      success: function(data) {
        $("select[name='cmbProductInfo[]'").html(data.options);

        $("select[name='cmbProductInfo[]']").change(function(){
          var cmbProductId = $(this).val();
          var token = $("input[name='_token']").val();
          $.ajax({
            url: "<?php echo route('select-measurment') ?>",
            method: 'POST',
            data: {cmbProductId:cmbProductId, _token:token},
            success: function(data){
              $("select[name='cmbMeasurment[]']").html(data.options)

              $("select[name='cmbMeasurment[]']").change(function(){
                var cmbMeasurmentId = $(this).val();
                var cmbProduct = cmbProductId;
                $.ajax({
                  url: "<?php echo route('select-price') ?>",
                  method: "POST",
                  dataType: "json",
                  data: {cmbProduct:cmbProduct, cmbMeasurement:cmbMeasurmentId, _token:token},
                  success: function(data){
                    $('.price').val(data.price);
                  }
                });
              });
            }
          });
        });
      }
    });
  });
</script>




<!--Calculating Price -->
<script type="text/javascript">

  $('tbody').delegate('.measurement','change', function(){
    var tr = $(this).parent().parent();
    // tr.find('.qty').focus();
  });

  $('tbody').delegate('.measurement','change', function(){
    var tr = $(this).parent().parent();
    tr.find('.qty').focus();
  });

  
  $('tbody').delegate('.price,.qty','keyup',function(){
    var tr = $(this).parent().parent();
    var price = tr.find('.price').val();
    var qty = tr.find('.qty').val();
    var lineTotal = (price * qty);
    tr.find('.lineTotal').val(lineTotal);
    total();
  });
  
</script>

<!-- Add new row and function -->


<!-- Dropqown product measurement change by category when add new row -->
<script type="text/javascript">
  $('tbody').delegate('#cat','change', function(){
    var tr = $(this).parent().parent();
    var id = tr.find('#cat').val();
    var token = $("input[name='_token']").val();
    $.ajax({
      url: "<?php echo route('select-product') ?>",
      method: 'POST',
      data: {cmbProductCategory:id, _token:token},
      success: function(data) {
        $("#pName").html(data.options);

        $('#pName').change(function(){
          var pID = $(this).val();
          $.ajax({
            url: "<?php echo route('select-measurment') ?>",
            method: "POST",
            data: {cmbProductId:pID, _token:token},
            success: function(data){
              $('#measurment').html(data.options);

              $("#measurment").change(function(){
                var cmbMeasurmentId = $(this).val();
                var cmbProduct = pID;
                $.ajax({
                  url: "<?php echo route('select-price') ?>",
                  method: "POST",
                  dataType: "json",
                  data: {cmbProduct:cmbProduct, cmbMeasurement:cmbMeasurmentId, _token:token},
                  success: function(data){
                    $('#price').val(data.price);
                  }
                });
              });
            }
          });
        });
      }
    });
  });

  $('.addRow').click(function() {
    addRow();
  });
  function total(){
    var total = 0;
    $('.lineTotal').each(function(i,e){
      var amount =$(this).val() -0;
      total+=amount;
    })
    $('.total').html(total);
  }

  function addRow(){
    var addRow = '<tr>'+
                    '<td>'+
                    '<select name="cmbProductCategory[]" id="cat" class="form-control form-control-sm" required>'+
                    '<option>Category</option>'+
                    '@foreach($qProductCategory as  $key=>$value)'+
                    '<option value="{{$key}}">{{$value}}</option>'+
                    '@endforeach'+
                    '</select>'+
                    '</td>'+
                    '<td>'+
                    '<select name="cmbProductInfo[]" id="pName" class="form-control" required>'+
                    '<option>Medicine</option>'+
                    '</select>'+
                    '</td>'+
                    '<td>'+
                    '<select name="cmbMeasurment[]" id="measurment" class="form-control form-control-sm measurement" required>'+
                    '<option selected="false">Select</option>'+
                    '</select>'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="price[]" readonly id="price" class="form-control form-control-sm price" required />'+
                    '</td>'+
                    '<td>'+
                    '<input name="qty[]" class="form-control form-control-sm qty" required />'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="lineTotal[]" class="form-control form-control-sm lineTotal" disabled />'+
                    '</td>'+
                    '<td><input type="button" class="form-control form-control-sm remove" style="background-color: red; color: white;" name="dis" value="x"/></td>'+
                  '</tr>';
    $('tbody').prepend(addRow);
  };
  $('table').delegate('.remove','click', function(){
    var l = $('tbody tr').length;
    if (l==1) {
      alert('You can not remove last one');
    }else{
      $(this).parent().parent().remove();
    }
  });
</script>

@endpush
