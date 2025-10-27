@extends('layouts.app')
@section('content')
<h2>Post Detail</h2>
<p><strong>Title:</strong> {{ $post->title }}</p>
<p><strong>Slug:</strong> {{ $post->slug }}</p>
<p><strong>Status:</strong> {{ $post->status }}</p>
<p><strong>Category:</strong> {{ $post->category->name ?? '-' }}</p>
@if($post->cover_image)
  <img src="{{ asset('storage/'.$post->cover_image) }}" style="width:300px"/>
@endif
<div style="margin-top:10px">{!! nl2br(e($post->body)) !!}</div>
<p><a href="{{ route('admin.posts.edit',$post->id) }}">Edit</a> | <a href="{{ route('admin.posts.index') }}">Back</a></p>
@endsection
