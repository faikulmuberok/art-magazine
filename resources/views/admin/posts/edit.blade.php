@extends('layouts.app')
@section('content')
<h2>Edit Post</h2>
@if($errors->any())
  <div class="muted">{{ implode(', ', $errors->all()) }}</div>
@endif
<form action="{{ route('admin.posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
  @csrf @method('PUT')
  <label>Title<input name="title" value="{{ old('title',$post->title) }}"/></label>
  <label>Slug (optional)<input name="slug" value="{{ old('slug',$post->slug) }}"/></label>
  <label>Excerpt<textarea name="excerpt">{{ old('excerpt',$post->excerpt) }}</textarea></label>
  <label>Body<textarea name="body" rows="8">{{ old('body',$post->body) }}</textarea></label>
  <label>Cover Image<input type="file" name="cover_image" /></label>
  @if($post->cover_image)
    <img src="{{ asset('storage/'.$post->cover_image) }}" style="width:200px;margin:6px 0"/>
  @endif
  <label>Status<select name="status"><option value="draft" {{ old('status',$post->status)==='draft'?'selected':'' }}>draft</option><option value="published" {{ old('status',$post->status)==='published'?'selected':'' }}>published</option></select></label>
  <label>Published At<input type="datetime-local" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}"/></label>
  <label>Reading Time (min)<input type="number" name="reading_time" value="{{ old('reading_time',$post->reading_time) }}"/></label>
  <label>Category
    <select name="category_id">
      @foreach($categories as $c)
        <option value="{{ $c->id }}" {{ $post->category_id==$c->id?'selected':'' }}>{{ $c->name }}</option>
      @endforeach
    </select>
  </label>
  <label>Tags
    <select name="tags[]" multiple size="6">
      @foreach($tags as $t)
        <option value="{{ $t->id }}" {{ $post->tags->pluck('id')->contains($t->id)?'selected':'' }}>{{ $t->name }}</option>
      @endforeach
    </select>
  </label>
  <div style="margin-top:10px">
    <button type="submit">Update</button>
    <a href="{{ route('admin.posts.index') }}">Cancel</a>
  </div>
</form>
@endsection
