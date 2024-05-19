<nav class="navbar navbar-expand-lg bg-success">
  <div class="container-fluid">
    <div class="mr-3">
    <a class="navbar-brand text-warning ml" href="/">CodeBlogs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
</div>
    <div class="ml-1">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
        @can('admin')
        <li class="nav-item"><a class="nav-link active" href="/blog/create/admin">
        Admin
        </a>
        </li>
        @endcan
        @endauth  
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>

        <li class="nav-item dropdown">
          <x-author />
        </li>
        <li class="nav-item dropdown">
          <x-category-dropdown />
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link active" href="/register">Register</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link active" href="">{{auth()->user()->name}}</a>
        </li>
        @endguest
        @auth
        <li class="nav-item">
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="btn btn-link nav-link active">Logout</button>
        </form> 
      </li> 
      @else
      <li class="nav-item">
          <a class="nav-link active" href="/login">Login</a>
        </li>
      @endauth      
      </ul>
    </div>
    </div>
  </div>
</nav>