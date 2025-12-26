@extends('layouts.layout')

@section('content')
<div class="container" style="max-width: 500px; margin-top: 4rem;">
    <div class="card">
        <h2 style="text-align: center; margin-bottom: 2rem;">Create Account</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-input" value="{{ old('name') }}" required>
                @error('name')
                    <span style="color: var(--error-color); font-size: 0.875rem;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" value="{{ old('email') }}" required>
                @error('email')
                    <span style="color: var(--error-color); font-size: 0.875rem;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" required>
                @error('password')
                    <span style="color: var(--error-color); font-size: 0.875rem;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-input" required>
            </div>
            <button class="btn btn-primary" style="width: 100%;">Register</button>
        </form>
        <p style="text-align: center; margin-top: 1rem; color: var(--text-muted);">
            Already have an account? <a href="/login">Log in</a>
        </p>
    </div>
</div>
@endsection
