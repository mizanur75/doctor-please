@extends('doctor-dashboard.doctor-home')
@section('title',' Patients Information > Prescribe Medicine')
@push('css')
<!-- <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"> -->
@endpush
@section('content')
<div class="form-element" id="app">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-body">
        {!!Form::open(['url'=>'prescription','method'=>'post', 'enctype'=>'multipart/form-data'])!!}
          <div class="col-md-12">
            <div class="row">
              <span style="font-size:2.5em;">{{Auth::user()->name}}</span><br />
              <span style="font-size:1.2em;">
                {{$qDoctor->degree}}<br />
                {{$qDoctor->tarining}}<br />
                <strong style="color: green;">GK Pharma (Unani) Limited</strong>
              </span>
            </div>

            <div class="row" style="padding:5px 0px 5px 0px;border-top:1px solid black;border-bottom:1px solid black;">


              	<input type="hidden" name="patientId" value="{{$qPatient->id}}">
              	<div class="col-sm-5" style="border-right:1px solid black;">Name : {{$qPatient->name}}</div>
              	<div class="col-sm-2" style="border-right:1px solid black;">Age : {{$qPatient->age}}</div>
                <div class="col-sm-2" style="border-right:1px solid black;">Sex : {{$qPatient->gender}}</div>
              	<div class="col-sm-2"> Date : {{date('d-m-Y', strtotime($qPatient->date))}}</div>
              	<div class="col-sm-3">
              
                    <input type="hidden" name="historyId" value="{!!$historyId!!}">

              </div>
            </div>

            <div class="row">
              <div class="col-sm-2">
              	<br>
                <p>BP <b style="margin-left: 50px;">:</b> {{$qPatient->bp}}</p>
                <p>Diabetes<b style="margin-left: 20px;">:</b>{{$qPatient->diabetes}}</p>
                <p>Other<b style="margin-left: 39px;">:</b>{{$qPatient->problem}}</p>
                <br>
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <textarea class="form-control col-md-12 col-sm-12" name="comment" style="min-height: 200px;"></textarea>
                  </div>
                </div>
              </div>

              <div class="col-sm-10" style="min-height:400px;font-size:1.2em;padding-top:5px;border-left:1px solid black;">
                <div class="table-responsive">
                  <table class="table">
                  	<thead>
                  		<tr>
                  			<th>Category</th>
                  			<th>Medicine</th>
                  			<th>Doses</th>
                  			<th>Qty</th>
                  			<th>Qty Type</th>
                  			<th>Eat Time</th>
                  			<th>Duration</th>
                  			<th>Dur. Time</th>
                  			<th>
                  				<input type="button" class="form-control form-control-sm addRow" name="dis" style="background-color: green; color: white;" value="+ Add"/>
                  			</th>
                  		</tr>
                  	</thead>
                    <tbody>
                      <tr>
                        <td>
                            <select name="cmbProductCategory" class="form-control" required>
                             <option value="" selected="false">Category</option>
                             @foreach($qProductCategory as  $key=>$value)
                               <option value="{{$key}}">{{$value}}</option>
                             @endforeach
                              
                            </select>
                            @if ($errors->has('cmbProductCategory'))
                                <span class="help-block text-danger">
                                     <strong>{{ $errors->first('cmbProductCategory') }}</strong>
                                </span>
                            @endif
                        </td>
                        <td>
                            <select name="cmbProductInfo[]" class="form-control duplicat" required>
                              <option value="" selected="false">Medicine</option>
                            </select>
                            @if ($errors->has('cmbProductInfo'))
                              <span class="help-block text-danger">
                                 <strong>{{ $errors->first('cmbProductInfo') }}</strong>
                              </span>
                            @endif
                        </td>
                        <td>
                            <select name="cmbDose[]" class="form-control form-control-sm" required>
                                <option value="" selected="false">Select</option>
                                <option value="1+1+1">1+1+1</option>
                                <option value="1+1+0">1+1+0</option>
                                <option value="1+0+0">1+0+0</option>
                                <option value="0+1+1">0+1+1</option>
                                <option value="0+0+1">0+0+1</option>
                                <option value="0+1+0">0+1+0</option>
                                <option value="1+0+1">1+0+1</option>
                                <option value="1+1+1+1">1+1+1+1</option>
                            </select>
                        </td>
                        <td>
                            <select name="cmbQty[]" class="form-control form-control-sm" required>
                                <option value="" selected="false">Select</option>
                                <?php
                                  $i=1;
                                  for($i=1; $i<5; $i++){
                                    
                                    echo "<option value='$i'>".$i."</option>";
                                  }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="cmbQtyType[]" class="form-control form-control-sm" required>
                                <option value="" selected="false">Select</option>
                                <option value="চামচ">চামচ</option>
                                <option value="টি">টি</option>
                            </select>
                        </td>
                        <td>
                            <select name="cmbEat[]" class="form-control form-control-sm" required>
                                <option value="" selected="false">Select</option>
                                <option value="খাবার পর">খাবার পর</option>
                                <option value="খাবার আগে">খাবার আগে</option>
                            </select>
                        </td>
                        <td>
                            <select name="eatDuration[]" class="form-control form-control-sm" required>
                              <?php
                                $i=1;
                                echo "<option selected='false'> Select </option>";
                                for($i=1; $i<22; $i++){
                                  
                                  echo "<option value='$i'>".$i."</option>";
                                }
                              ?>
                            </select>
                        </td>
                        <td>
                            <select name="cmbEatDurationType[]" class="form-control form-control-sm" required>
                                <option value="" selected="false">Select</option>
                                <option value="দিন">দিন</option>
                                <option value="মাস">মাস</option>
                            </select>
                        </td>
                        <td><input type="button" class="form-control form-control-sm remove" name="dis" style="background-color: red; color: white; font-weight: bold;" value="x"/></td>
                      </tr>
                    </tbody>
                  </table>
                 </div>
              </div>
            </div>
            
            <!-- Prescription Footer -->
            <div class="row text-center" style="border-top:1px solid black;padding:5px;">
              This is computer generated Prescription.Generated by <a href="http://doctorplease.com.bd">doctorplease.com.bd</a>
              {{Form::submit('Prescribed',['class'=>'pull-right btn btn-primary'])}}
            </div>
            <div class="col-sm-12">
            	
            </div>
          </div>
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')

<!-- show product by category first -->
<script type="text/javascript">
  $("select[name='cmbProductCategory']").change(function(){
      var cmbProductCategory = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('select-product') ?>",
          method: 'POST',
          data: {cmbProductCategory:cmbProductCategory, _token:token},
          success: function(data) {
            $("select[name='cmbProductInfo[]'").html(data.options);
          }
      });
  });
</script>
<!-- Show Product by category when add new row-->
<script type="text/javascript">
	$('tbody').delegate('#cat','change', function(){
		var tr = $(this).parent().parent();
		var id = tr.find('#cat').val();
		var dataId = {'id':id};
	    var token = $("input[name='_token']").val();
	    $.ajax({
	        url: "<?php echo route('select-product') ?>",
	        method: 'POST',
	        data: {cmbProductCategory:dataId, _token:token},
	        success: function(data) {
	          $("#pName").html(data.options);
	        }
	    });
	});

// Add new Row and function

	$('.addRow').click(function() {
	  addRow();
	});
	function addRow(){
	  var addRow = '<tr>'+
	                  '<td>'+
	                      '<select name="cmbProductCategory" id="cat" class="form-control form-control-sm" required>'+
	                          '<option>Category</option>'+
	                          '@foreach($qProductCategory as  $key=>$value)'+
	                            '<option value="{{$key}}">{{$value}}</option>'+
	                          '@endforeach'+
	                      '</select>'+
	                  '</td>'+
	                  '<td>'+
	                      '<select name="cmbProductInfo[]" id="pName" class="form-control duplicat" required>'+
	                          '<option>Medicine</option>'+
	                      '</select>'+
	                  '</td>'+
	                  '<td>'+
	                      '<select name="cmbDose[]" class="form-control form-control-sm">'+
	                          '<option selected="true" value="">Select</option>'+
	                          '<option value="1+1+1">1+1+1</option>'+
	                          '<option value="1+1+0">1+1+0</option>'+
	                          '<option value="1+0+0">1+0+0</option>'+
	                          '<option value="0+1+1">0+1+1</option>'+
	                          '<option value="0+0+1">0+0+1</option>'+
	                          '<option value="0+1+0">0+1+0</option>'+
	                          '<option value="1+0+1">1+0+1</option>'+
	                          '<option value="1+1+1+1">1+1+1+1</option>'+
	                      '</select>'+
	                  '</td>'+
	                  '<td>'+
	                      '<select name="cmbQty[]" class="form-control form-control-sm">'+
	                          '<option selected="true" value="">Select</option>'+
	                          '<option value="1">1</option>'+
	                          '<option value="2">2</option>'+
	                          '<option value="3">3</option>'+
	                          '<option value="4">4</option>'+
	                      '</select>'+
	                  '</td>'+
	                  '<td>'+
	                      '<select name="cmbQtyType[]" class="form-control form-control-sm">'+
	                          '<option selected="true" value="">Select</option>'+
	                          '<option value="চামচ">চামচ</option>'+
	                          '<option value="টি">টি</option>'+
	                      '</select>'+
	                  '</td>'+
	                  '<td>'+
	                      '<select name="cmbEat[]" class="form-control form-control-sm">'+
	                          '<option selected="true" value="">Select</option>'+
	                          '<option value="খাবার পর">খাবার পর</option>'+
	                          '<option value="খাবার আগে">খাবার আগে</option>'+
	                      '</select>'+
	                  '</td>'+
	                  '<td>'+
	                      '<select name="eatDuration[]" class="form-control form-control-sm">'+
                          '<option value="" selected="false">Select</option>'+
                            '<option value="1">1</option>'+
                            '<option value="2">2</option>'+
                            '<option value="3">3</option>'+
                            '<option value="4">4</option>'+
                            '<option value="5">5</option>'+
                            '<option value="6">6</option>'+
                            '<option value="7">7</option>'+
                            '<option value="8">8</option>'+
                            '<option value="9">9</option>'+
                            '<option value="10">10</option>'+
                            '<option value="11">11</option>'+
                            '<option value="12">12</option>'+
                            '<option value="13">13</option>'+
                            '<option value="14">14</option>'+
                            '<option value="15">15</option>'+
                            '<option value="16">16</option>'+
                            '<option value="17">17</option>'+
                            '<option value="18">18</option>'+
                            '<option value="19">19</option>'+
                            '<option value="20">20</option>'+
                            '<option value="21">21</option>'+
                        '</select>'+
	                  '</td>'+
	                  '<td>'+
	                      '<select name="cmbEatDurationType[]" class="form-control form-control-sm">'+
	                          '<option selected="true" value="">Select</option>'+
	                          '<option value="দিন">দিন</option>'+
	                          '<option value="মাস">মাস</option>'+
	                      '</select>'+
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
