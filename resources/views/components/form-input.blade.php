@props(['name','type'=>'text','value'=>''])
<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{ucwords($name)}}</label>
    <input type="{{$type}}" class="form-control" require name="{{$name}}" value="{{old($name,$value)}}">
    <x-error name='{{$name}}' />
  </div>