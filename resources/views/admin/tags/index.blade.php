@extends('layouts.app')
@section('content')
<h2>Tags</h2>
<p><a href="{{ route('admin.tags.create') }}">+ New Tag</a></p>
<table>
  <thead><tr><th>Name</th><th>Slug</th><th></th></tr></thead>
  <tbody>
  @foreach($tags as $t)
    <tr>
      <td>{{ $t->name }}</td>
      <td>{{ $t->slug }}</td>
      <td>
        <a href="{{ route('admin.tags.edit',$t->id) }}">Edit</a>
        <form action="{{ route('admin.tags.destroy',$t->id) }}" method="post" style="display:inline">@csrf @method('DELETE')<button onclick="return confirm('Delete?')">Delete</button></form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<div style="margin-top:12px">{{ $tags->links() }}</div>
@endsection
