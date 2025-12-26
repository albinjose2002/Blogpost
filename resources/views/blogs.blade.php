@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 style="text-align: center; margin-bottom: 2rem;">Latest Stories</h1>

    @if(count($posts) > 0)
        <div style="display: grid; gap: 2rem;">
            @foreach ($posts as $post)
                <div class="card">
                    <h2>{{$post['title']}}</h2>
                    <div class="post-meta">
                        By <span style="color: var(--text-main); font-weight: 500;">{{ $post->user ? $post->user->name : 'Unknown' }}</span> 
                        &bull; {{ $post->created_at->format('M d, Y') }}
                    </div>
                    <p style="margin-bottom: 1rem;">{{ $post['body'] }}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="card" style="text-align: center; color: var(--text-muted);">
            <p>No stories found yet. Be the first to write one!</p>
            @auth
                <a href="/" class="btn btn-primary" style="margin-top: 1rem;">Create Post</a>
            @else
                <a href="/register" class="btn btn-primary" style="margin-top: 1rem;">Start Writing</a>
            @endauth
        </div>
    @endif
</div>
@endsection
