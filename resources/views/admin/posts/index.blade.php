@extends('layouts.app')
@section('content')
<h2>Posts</h2>
<p><a href="{{ route('admin.posts.create') }}">+ New Post</a></p>
<table>
  <thead><tr><th>Title</th><th>Category</th><th>Status</th><th>Published</th><th></th></tr></thead>
  <tbody>
    @foreach($posts as $post)
      <tr>
        <td><a href="{{ route('admin.posts.show',$post->id) }}">{{ $post->title }}</a></td>
        <td>{{ $post->category->name ?? '-' }}</td>
        <td>{{ $post->status }}</td>
        <td>{{ optional($post->published_at)->format('Y-m-d') }}</td>
        <td>
          <a href="{{ route('admin.posts.edit',$post->id) }}">Edit</a>
          <form action="{{ route('admin.posts.destroy',$post->id) }}" method="post" style="display:inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('Delete?')">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div style="margin-top:12px">{{ $posts->links() }}</div>
@endsection
