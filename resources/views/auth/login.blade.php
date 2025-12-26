@extends('layouts.layout')

@section('content')
<div class="container" style="max-width: 400px; margin-top: 4rem;">
    <div class="card">
        <h2 style="text-align: center; margin-bottom: 2rem;">Welcome Back</h2>
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="loginname" class="form-input" required>
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="loginpassword" class="form-input" required>
            </div>
            <button class="btn btn-primary" style="width: 100%;">Log In</button>
        </form>
        <p style="text-align: center; margin-top: 1rem; color: var(--text-muted);">
            Don't have an account? <a href="/register">Register</a>
        </p>
    </div>
</div>
@endsection
