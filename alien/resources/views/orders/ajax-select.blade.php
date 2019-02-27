<option selected="false">--- Select Item ---</option>
@if(!empty($qItem))
  @foreach($qItem as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
