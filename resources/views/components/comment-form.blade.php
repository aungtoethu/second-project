@auth
<form action="/blog/{{$blog->slug}}/comment" method="POST">
  @csrf
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">comment area</label><br>
   <textarea name="body" id="exampleInputPassword1" width="300px" height="150px"></textarea>
  </div>
  <x-error name="body" />
  <button type="submit" class="btn btn-primary  content-left">Submit</button>
  
</form>
@endauth