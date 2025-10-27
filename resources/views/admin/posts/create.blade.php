@extends('layouts.app')
@section('content')
<h2>New Post</h2>
@if($errors->any())
  <div class="muted">{{ implode(', ', $errors->all()) }}</div>
@endif
<form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <label>Title<input name="title" value="{{ old('title') }}"/></label>
  <label>Slug (optional)<input name="slug" value="{{ old('slug') }}"/></label>
  <label>Excerpt<textarea name="excerpt">{{ old('excerpt') }}</textarea></label>
  <label>Body<textarea name="body" rows="8">{{ old('body') }}</textarea></label>
  <label>Cover Image<input type="file" name="cover_image" /></label>
  <label>Status<select name="status"><option value="draft" {{ old('status')==='draft'?'selected':'' }}>draft</option><option value="published" {{ old('status')==='published'?'selected':'' }}>published</option></select></label>
  <label>Published At<input type="datetime-local" name="published_at" value="{{ old('published_at') }}"/></label>
  <label>Reading Time (min)<input type="number" name="reading_time" value="{{ old('reading_time') }}"/></label>
  <label>Category
    <select name="category_id">
      @foreach($categories as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
      @endforeach
    </select>
  </label>
  <label>Tags
    <select name="tags[]" multiple size="6">
      @foreach($tags as $t)
        <option value="{{ $t->id }}">{{ $t->name }}</option>
      @endforeach
    </select>
  </label>
  <div style="margin-top:10px">
    <button type="submit">Save</button>
    <a href="{{ route('admin.posts.index') }}">Cancel</a>
  </div>
</form>
@endsection
