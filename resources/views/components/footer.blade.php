@props([])

<footer class="bg-dark text-light pt-5 pb-4 mt-0">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <h4 class="fw-bold mb-3">
                    <i class="bi bi-buildings-fill text-primary me-2"></i>BuildFlow
                </h4>
                <p class="text-secondary">
                    Building tomorrow's infrastructure today. Trusted construction partner since 1998,
                    delivering quality craftsmanship and client satisfaction on every project.
                </p>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <h5 class="fw-bold mb-3">Quick Links</h5>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="{{ route('home') }}" class="text-secondary text-decoration-none">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-secondary text-decoration-none">About Us</a></li>
                    <li><a href="{{ route('projects.index') }}" class="text-secondary text-decoration-none">Projects</a></li>
                    <li><a href="{{ route('contact.index') }}" class="text-secondary text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="fw-bold mb-3">Our Services</h5>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    @php $footerServices = \App\Models\Service::orderBy('order')->take(4)->get(); @endphp
                    @forelse ($footerServices as $footerService)
                        <li>
                            <a href="{{ route('services.show', $footerService->slug) }}" class="text-secondary text-decoration-none">
                                {{ $footerService->title }}
                            </a>
                        </li>
                    @empty
                        <li><a href="{{ route('services.index') }}" class="text-secondary text-decoration-none">Residential Building</a></li>
                        <li><a href="{{ route('services.index') }}" class="text-secondary text-decoration-none">Commercial Projects</a></li>
                        <li><a href="{{ route('services.index') }}" class="text-secondary text-decoration-none">Renovation</a></li>
                        <li><a href="{{ route('services.index') }}" class="text-secondary text-decoration-none">Architecture</a></li>
                    @endforelse
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="fw-bold mb-3">Contact Us</h5>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li class="d-flex gap-2">
                        <i class="bi bi-geo-alt-fill text-primary mt-1"></i>
                        <span class="text-secondary">742 Evergreen Terrace, Springfield, IL 62701</span>
                    </li>
                    <li class="d-flex gap-2">
                        <i class="bi bi-telephone-fill text-primary mt-1"></i>
                        <span class="text-secondary">+1 (555) 334-6789</span>
                    </li>
                    <li class="d-flex gap-2">
                        <i class="bi bi-envelope-fill text-primary mt-1"></i>
                        <span class="text-secondary">contact@example.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="border-secondary my-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-secondary small">
            <p class="mb-0">&copy; {{ date('Y') }} BuildFlow. All Rights Reserved.</p>
            <div class="d-flex gap-3 mt-2 mt-md-0">
                <a href="#" class="text-secondary text-decoration-none">Privacy Policy</a>
                <a href="#" class="text-secondary text-decoration-none">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
