@extends('layouts.app')

@section('content')
<article style="max-width:800px;margin:0 auto">
  <div class="muted">{{ optional($post->published_at)->format('F j, Y') }}</div>
  <h1 style="margin:6px 0 10px">{{ $post->title }}</h1>
  <div style="margin-bottom:12px">
    <span class="badge">{{ $post->category->name ?? 'Uncategorized' }}</span>
    @foreach($post->tags as $t)
      <a href="{{ route('tag.show',$t->slug) }}" class="badge" style="background:#ecfeff;color:#155e75;margin-left:6px">{{ $t->name }}</a>
    @endforeach
  </div>
  @if($post->cover_image)
    <img src="{{ asset('storage/'.$post->cover_image) }}" alt="cover" style="width:100%;height:380px;object-fit:cover;border-radius:8px" />
  @endif
  <div style="margin-top:16px;line-height:1.7">{!! nl2br(e($post->body)) !!}</div>
</article>
@endsection
