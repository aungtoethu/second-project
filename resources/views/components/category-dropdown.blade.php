<div>
@props(['category'])
<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu">
            @foreach($category as $categorys)
            <li><a class="dropdown-item" href="/?category={{$categorys->slug}}{{request('author')?'&author='.request('author'):''}}{{request('search')?'&search='.request('search'):''}}">{{$categorys->slug}}</a></li>
            @endforeach
          </ul>
</div>