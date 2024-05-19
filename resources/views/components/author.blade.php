<div>
<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Author</a>
          <ul class="dropdown-menu">
            @foreach($author as $authors)
            <li><a class="dropdown-item" href="/?author={{$authors->name}}{{request('search')?'&search='.request('search'):''}}{{request('category')?'&category='.request('category'):''}}">{{$authors->name}}</li>
            @endforeach
          </ul>
</div>