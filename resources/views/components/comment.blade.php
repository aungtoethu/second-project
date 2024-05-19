
<div class="text-danger">
    @auth
    @if($comment->count())
    <p>Comment - ({{$comment->count()}})</p>
    @else
    <p class="text-danger">NO comment yet</p>
    @endif
    @endauth
    @foreach($comment as $comments)
    <x-single-comment :comment="$comments" />
    @endforeach
    {{$comment->links()}}
</div>