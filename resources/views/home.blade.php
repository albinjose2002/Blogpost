@extends('layouts.layout')

@section('content')
    @auth
        <div class="container">
            <h1 class="hero-title" style="font-size: 2rem; text-align: left; margin-bottom: 0.5rem;">Hello, {{ auth()->user()->name }}!</h1>
            <p style="margin-bottom: 2rem; color: var(--text-muted);">Welcome back to your dashboard.</p>

            <div class="card">
                <h2>Create a New Post</h2>
                <form action="/createPost" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-input" placeholder="My Awesome Post" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Content</label>
                        <textarea name="body" class="form-textarea" placeholder="What's on your mind?" required></textarea>
                    </div>
                    <button class="btn btn-primary">Save Post</button>
                </form>
            </div>

            <h2 style="margin-top: 3rem;">My Posts</h2>
            @if(count($posts) > 0)
                <div style="display: grid; gap: 1.5rem;">
                    @foreach ($posts as $post)
                        <div class="card" style="margin-bottom: 0;">
                            <h3>{{$post['title']}}</h3>
                            <div class="post-meta">Posted on {{ $post->created_at->format('M d, Y') }}</div>
                            <p style="margin-bottom: 1rem;">{{ Str::limit($post['body'], 200) }}</p>
                            <div style="display: flex; gap: 1rem; align-items: center;">
                                <a href="/edit-post/{{$post->id}}" class="btn btn-outline" style="font-size: 0.875rem; padding: 0.5rem 1rem;">Edit</a>
                                <form action="/delete-post/{{$post->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" style="font-size: 0.875rem; padding: 0.5rem 1rem;">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="card" style="text-align: center; color: var(--text-muted);">
                    <p>You haven't posted anything yet.</p>
                </div>
            @endif
        </div>
    @else
        <div class="hero-section">
            <h1 class="hero-title">Share Your Story with the World</h1>
            <p class="hero-subtitle">Join our community of writers and readers. Create, share, and discover amazing content.</p>
            <div style="display: flex; gap: 1rem; justify-content: center;">
                <a href="/register" class="btn btn-primary" style="font-size: 1.25rem; padding: 1rem 2rem;">Get Started</a>
                <a href="/blogs" class="btn btn-outline" style="font-size: 1.25rem; padding: 1rem 2rem;">Read Blogs</a>
            </div>
        </div>

        <div class="container">
            <h2 style="text-align: center; margin-bottom: 2rem;">Why Join Us?</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                <div class="card" style="text-align: center;">
                    <h3>✍️ Write</h3>
                    <p>Express yourself with our easy-to-use editor.</p>
                </div>
                <div class="card" style="text-align: center;">
                    <h3>🌍 Connect</h3>
                    <p>Reach a global audience with your stories.</p>
                </div>
                <div class="card" style="text-align: center;">
                    <h3>🚀 Grow</h3>
                    <p>Build your personal brand and following.</p>
                </div>
            </div>
        </div>
    @endauth
@endsection