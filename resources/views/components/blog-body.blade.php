@props(['name','value'=>''])
<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{ucwords($name)}}</label>
    <textarea  class="editor" name="{{$name}}" id="" width="200" height="100" >{{old($name,$value)}}</textarea>
  </div>