<x-admin-blog>
    <table>
        <tr>
        <th>Count</th>
        <th>Slut</th>
        <th>Edit-Button</th>
</tr>
@foreach($blog as $blogs)
<tr>
    <td>{{$blogs->slug}}</td>
    <td>
        <form action="/blog/{{$blogs->slug}}/delete" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form></td>
    <td><a href="/blog/{{$blogs->slug}}/edit" class="btn btn-success">Edit</a></td>
</tr>
@endforeach
    </table>
</x-admin-blog>