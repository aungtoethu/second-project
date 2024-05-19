@props(['blog'])
<x-layout>
  <h3>This is Blog Update Form</h3>
<form class="form-control" action='/blog/{{$blog->slug}}/edit/admin' method="POST" enctype="multipart/form-data">
        @csrf
         @method('PATCH')
      <x-form-input name="title" value="{{$blog->title}}" />
      <x-form-input name="slug" value="{{$blog->slug}}" />
      <x-form-input name="intro" value="{{$blog->intro}}" />
      <x-blog-body name="body" value="{{$blog->body}}" />
      <x-form-input name="photo" type="file"/>
      <img src="/storage/{{$blog->photo}}" alt="" width="200" height="100">
      <x-category-select :category=$category />
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</x-layout>