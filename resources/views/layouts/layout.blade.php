<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel Blog') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="/" style="color: inherit;">MyBlog</a>
            </div>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="/blogs">Blogs</a>
                @auth
                    <form action="/logout" method="POST" style="display: inline;">
                        @csrf
                        <button class="btn btn-outline" style="font-size: 0.9rem; padding: 0.5rem 1rem;">Log Out</button>
                    </form>
                @else
                    <a href="/login" class="btn btn-outline" style="border:none;">Log In</a>
                    <a href="/register" class="btn btn-primary">Register</a>
                @endauth
            </div>
        </nav>
    </header>

    <main>
        @if (session('success'))
            <div style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                {{ session('success') }}
            </div>
        @endif
        
        @if (session('failure'))
            <div style="background-color: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                {{ session('failure') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} MyBlog. All rights reserved.</p>
    </footer>
</body>
</html>
