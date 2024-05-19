@props(['blogs'])
<x-searchbar />
@if(session('success'))
<div class="alert alert-success text-center">
     {{session('success')}}
</div>
@endif
<div class="container">
<div class="card-group">
    @forelse($blogs as $blog)
  <div class="card">
    <img src='{{asset("/storage/$blog->photo")}}' class="card-img-top" alt="...">  
      <div class="card-body">
      <h5 class="card-title mt-2px">{{$blog->title}}</h5>
      <p class="mt-3px">Author - <a href="/?author={{$blog->author->name}}{{request('category')?'&category='.request('category'):''}}{{request('search')?'&search='.request('search'):''}}">{{$blog->author->name}}</a></p><br>
      <p>Read-More <a href="/blog/{{$blog->slug}}">{{$blog->slug}}</a></p><br>
      <p>Category - <a href="/?category={{$blog->category->slug}}{{request('author')?'&author='.request('author'):''}}{{request('search')?'&search='.request('search'):''}}"> {{$blog->category->slug}}</a></p>
      <p class="card-text"><small class="text-body-secondary">{{$blog->created_at->diffForHumans()}}</small></p>
     </div> 
  </div>
  @empty
  <p class="text-danger">No Book Found !</p>
  @endforelse
</div>
{{$blogs->links()}}
  </div>