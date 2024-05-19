@props(['category'])
<x-admin-blog>
  
<h3>This is create_blog form</h3>
    <form class="form-control" action='/blog/create/admin' method="POST" enctype="multipart/form-data">
        @csrf

      <x-form-input name="title" />
      <x-form-input name="slug" />
      <x-form-input name="intro" />
      <x-blog-body name="body" />
      <x-form-input name="photo" type="file"/>
      <x-category-select :category=$category />
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</x-admin-blog>