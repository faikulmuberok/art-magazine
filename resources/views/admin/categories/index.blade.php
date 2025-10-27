@extends('layouts.app')
@section('content')
<h2>Categories</h2>
<p><a href="{{ route('admin.categories.create') }}">+ New Category</a></p>
<table>
  <thead><tr><th>Name</th><th>Slug</th><th></th></tr></thead>
  <tbody>
  @foreach($categories as $c)
    <tr>
      <td>{{ $c->name }}</td>
      <td>{{ $c->slug }}</td>
      <td>
        <a href="{{ route('admin.categories.edit',$c->id) }}">Edit</a>
        <form action="{{ route('admin.categories.destroy',$c->id) }}" method="post" style="display:inline">@csrf @method('DELETE')<button onclick="return confirm('Delete?')">Delete</button></form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<div style="margin-top:12px">{{ $categories->links() }}</div>
@endsection
