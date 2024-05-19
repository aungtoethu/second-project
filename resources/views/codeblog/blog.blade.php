<x-layout>
    <h2>This is Single Blog</h2>
    <p>{{$blog->body}}</p><br>
     @auth
    <form action="/blog/{{$blog->slug}}/subscribe" method="POST">
        @csrf
        
        @if(auth()->user()->isSubscribe($blog))
        <button type="submit" class="btn btn-warning">unsubscribt</button>
        @else
       <button type="submit" class="btn btn-danger">subscribe</button>
       @endif
    </form>
    @endauth
    <x-comment-form :blog="$blog"/>
    <x-comment :comment="$blog->comment()->latest()->paginate(3)" />
    <a href="/" class="btn btn-link">back</a>
     
</x-layout>