@extends('layouts.app')
@section('content')
<h2>New Tag</h2>
@if($errors->any())<div class="muted">{{ implode(', ', $errors->all()) }}</div>@endif
<form action="{{ route('admin.tags.store') }}" method="post">@csrf
  <label>Name<input name="name" value="{{ old('name') }}"/></label>
  <label>Slug (optional)<input name="slug" value="{{ old('slug') }}"/></label>
  <div style="margin-top:10px"><button>Save</button> <a href="{{ route('admin.tags.index') }}">Cancel</a></div>
</form>
@endsection
