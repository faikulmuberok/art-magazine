@extends('layouts.app')

@section('content')
<div class="hero">
  <div class="muted">January 1, 2025</div>
  <h1>ART<br/>MAGAZINE</h1>
</div>
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;gap:10px;flex-wrap:wrap">
  <form class="inline" action="/search" method="get">
    <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Search articles..." />
    <button type="submit">Search</button>
  </form>
  <div>
    @foreach(($categories ?? []) as $c)
      <a class="badge" href="{{ route('category.show',$c->slug) }}" style="margin-right:6px">{{ $c->name }}</a>
    @endforeach
  </div>
</div>

<div class="grid">
  @forelse($posts as $post)
    <a class="card" href="{{ route('posts.show',$post->slug) }}">
      <img src="{{ $post->cover_image ? asset('storage/'.$post->cover_image) : 'https://picsum.photos/600/400?random='.($post->id%50) }}" alt="cover" />
      <div class="p">
        <div class="muted" style="font-size:12px">{{ optional($post->published_at)->format('F j, Y') ?? 'Draft' }}</div>
        <div style="display:flex;justify-content:space-between;align-items:center">
          <div class="badge">{{ $post->category->name ?? 'Uncategorized' }}</div>
          <div class="muted" style="font-size:12px">{{ $post->reading_time ?? 3 }} min read</div>
        </div>
        <h3 style="margin:10px 0 6px">{{ $post->title }}</h3>
        <p class="muted">{{ $post->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($post->body), 120) }}</p>
      </div>
    </a>
  @empty
    <p>No posts.</p>
  @endforelse
</div>
<div style="margin-top:16px">{{ $posts->links() }}</div>
@endsection
