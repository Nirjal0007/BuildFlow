@props(['transparent' => false])

<nav class="navbar navbar-expand-lg {{ $transparent ? 'navbar-transparent' : 'navbar-light bg-white shadow-sm' }} sticky-top py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="{{ route('home') }}">
            <i class="bi bi-buildings-fill text-primary me-2"></i>
            BuildFlow
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('team.index') ? 'active' : '' }}" href="{{ route('team.index') }}">Team</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Pages</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('testimonials.index') }}">Testimonials</a></li>
                        <li><a class="dropdown-item" href="{{ route('faq.index') }}">FAQ</a></li>
                        <li><a class="dropdown-item" href="{{ route('blog.index') }}">Blog</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact.index') ? 'active' : '' }}" href="{{ route('contact.index') }}">Contact</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                <a href="tel:+15553347899" class="d-none d-lg-flex align-items-center text-dark fw-semibold text-decoration-none">
                    <i class="bi bi-telephone-fill text-primary me-2"></i> +1 (555) 334-6789
                </a>
                <a href="{{ route('quote.create') }}" class="btn btn-primary rounded-pill px-4">Get Estimate</a>
            </div>
        </div>
    </div>
</nav>
