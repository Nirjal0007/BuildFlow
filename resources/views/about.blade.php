@extends('layouts.app')

@section('title', 'About Us')

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">About Us</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> / About Us
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row align-items-center g-5 mb-5">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=700&q=80"
                         class="img-fluid rounded shadow" alt="Construction site overview">
                </div>
                <div class="col-lg-6">
                    <span class="section-title-eyebrow">Who We Are</span>
                    <h2 class="mt-2 mb-4">Building Trust, One Project at a Time</h2>
                    <p class="text-secondary mb-4">
                        Founded in 1998, BuildFlow has grown from a small residential contractor into a full-service
                        construction company handling residential, commercial, and infrastructure projects. Our mission
                        is simple: deliver quality work, on time and on budget, every time.
                    </p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="border-start border-primary border-4 ps-3">
                                <div class="fw-bold fs-3">25+</div>
                                <small class="text-secondary">Years Experience</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border-start border-primary border-4 ps-3">
                                <div class="fw-bold fs-3">850+</div>
                                <small class="text-secondary">Projects Completed</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="text-center p-4 border rounded h-100">
                        <i class="bi bi-bullseye text-primary fs-1 mb-3 d-block"></i>
                        <h5 class="fw-bold">Our Mission</h5>
                        <p class="text-secondary small mb-0">To deliver safe, sustainable, and high-quality construction solutions that exceed client expectations.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4 border rounded h-100">
                        <i class="bi bi-eye-fill text-primary fs-1 mb-3 d-block"></i>
                        <h5 class="fw-bold">Our Vision</h5>
                        <p class="text-secondary small mb-0">To be the most trusted construction partner in every market we serve.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4 border rounded h-100">
                        <i class="bi bi-gem text-primary fs-1 mb-3 d-block"></i>
                        <h5 class="fw-bold">Our Values</h5>
                        <p class="text-secondary small mb-0">Integrity, safety, craftsmanship, and accountability guide every decision we make.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-py bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-title-eyebrow">Meet The Experts</span>
                <h2 class="mt-2">Our Team</h2>
            </div>
            <div class="row g-4">
                @forelse ($team as $member)
                    <div class="col-md-6 col-lg-3">
                        <x-team-card :member="$member" />
                    </div>
                @empty
                    <p class="text-center text-secondary">Team info coming soon.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
