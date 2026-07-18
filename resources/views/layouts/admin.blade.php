<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') | Admin Panel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body class="bg-light">

    <div class="d-flex">
        {{-- SIDEBAR --}}
        <aside class="admin-sidebar text-white d-flex flex-column flex-shrink-0">
            <div class="px-4 py-4 border-bottom border-secondary border-opacity-25">
                <a href="{{ route('admin.dashboard') }}" class="text-white text-decoration-none fw-bold fs-5 d-flex align-items-center">
                    <i class="bi bi-buildings-fill text-primary me-2"></i> BuildFlow
                </a>
                <small class="text-secondary">Admin Panel</small>
            </div>

            <nav class="nav flex-column py-3 flex-grow-1 overflow-auto">
                <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <a href="{{ route('admin.projects.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="bi bi-building"></i> Projects
                </a>
                <a href="{{ route('admin.services.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="bi bi-tools"></i> Services
                </a>
                <a href="{{ route('admin.team.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.team.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> Team
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="bi bi-chat-quote"></i> Testimonials
                </a>
                <a href="{{ route('admin.faqs.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <i class="bi bi-question-circle"></i> FAQs
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                    <i class="bi bi-journal-text"></i> Blog
                </a>
                <a href="{{ route('admin.ai-blog.create') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.ai-blog.*') ? 'active' : '' }}">
                    <i class="bi bi-stars"></i> AI Blog Generator
                </a>
                <a href="{{ route('admin.categories.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="bi bi-tags"></i> Categories
                </a>

                <hr class="border-secondary border-opacity-25 mx-3">

                <a href="{{ route('admin.contacts.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <i class="bi bi-envelope"></i> Messages
                </a>
                <a href="{{ route('admin.quotes.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}">
                    <i class="bi bi-receipt"></i> Quote Requests
                </a>
                <a href="{{ route('admin.users.index') }}" class="nav-link d-flex align-items-center {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="bi bi-person-gear"></i> Users
                </a>
            </nav>

            <div class="px-4 py-3 border-top border-secondary border-opacity-25">
                <a href="{{ route('home') }}" class="nav-link text-secondary d-flex align-items-center mb-2" target="_blank">
                    <i class="bi bi-box-arrow-up-right"></i> View Site
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link text-secondary d-flex align-items-center border-0 bg-transparent p-0">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <div class="flex-grow-1" style="min-width: 0; margin-left: 260px;">
            <header class="bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                <h4 class="fw-bold mb-0">@yield('title', 'Dashboard')</h4>
                <div class="d-flex align-items-center gap-3">
                    <span class="text-secondary">{{ auth()->user()->name }}</span>
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="p-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
