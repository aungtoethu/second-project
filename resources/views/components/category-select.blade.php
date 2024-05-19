@props(['category'])
<select name="category_id" id="">
    @foreach($category as $categorys)
<option {{$categorys->id == old('category_id',$categorys->id)?'selected':'' }} value="{{$categorys->id}}">{{$categorys->title}}</option>
    @endforeach
   </select>