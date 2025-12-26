@extends('layouts.layout')

@section('content')
<div class="container" style="margin-top: 2rem;">
    <div class="card">
        <h2 style="margin-bottom: 2rem;">Edit Post</h2>
        <form action="/edit-post/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-input" value="{{$post->title}}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Content</label>
                <textarea name="body" class="form-textarea" required>{{$post->body}}</textarea>
            </div>
            <div style="display: flex; gap: 1rem;">
                <button class="btn btn-primary">Save Changes</button>
                <a href="/" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection