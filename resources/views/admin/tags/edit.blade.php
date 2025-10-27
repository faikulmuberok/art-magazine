@extends('layouts.app')
@section('content')
<h2>Edit Tag</h2>
@if($errors->any())<div class="muted">{{ implode(', ', $errors->all()) }}</div>@endif
<form action="{{ route('admin.tags.update',$tag->id) }}" method="post">@csrf @method('PUT')
  <label>Name<input name="name" value="{{ old('name',$tag->name) }}"/></label>
  <label>Slug (optional)<input name="slug" value="{{ old('slug',$tag->slug) }}"/></label>
  <div style="margin-top:10px"><button>Update</button> <a href="{{ route('admin.tags.index') }}">Cancel</a></div>
</form>
@endsection
