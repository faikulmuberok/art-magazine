@extends('layouts.app')
@section('content')
<h2>New Category</h2>
@if($errors->any())<div class="muted">{{ implode(', ', $errors->all()) }}</div>@endif
<form action="{{ route('admin.categories.store') }}" method="post">@csrf
  <label>Name<input name="name" value="{{ old('name') }}"/></label>
  <label>Slug (optional)<input name="slug" value="{{ old('slug') }}"/></label>
  <div style="margin-top:10px"><button>Save</button> <a href="{{ route('admin.categories.index') }}">Cancel</a></div>
</form>
@endsection
