<form action="">
    <label for="search">Search</label>
    <input type="text" name="search" value="{{request('search')}}">
    @if(request('category'))
     <input type="hidden" name="category" value="{{request('category')}}">
    @endif
    @if(request('author'))
    <input type="hidden" name="author" value="{{request('author')}}">
    @endif
    <button type="submit">search</button>
</form>