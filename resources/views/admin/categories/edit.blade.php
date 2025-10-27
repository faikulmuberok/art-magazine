@extends('layouts.app')
@section('content')
<h2>Edit Category</h2>
@if($errors->any())<div class="muted">{{ implode(', ', $errors->all()) }}</div>@endif
<form action="{{ route('admin.categories.update',$category->id) }}" method="post">@csrf @method('PUT')
  <label>Name<input name="name" value="{{ old('name',$category->name) }}"/></label>
  <label>Slug (optional)<input name="slug" value="{{ old('slug',$category->slug) }}"/></label>
  <div style="margin-top:10px"><button>Update</button> <a href="{{ route('admin.categories.index') }}">Cancel</a></div>
</form>
@endsection
