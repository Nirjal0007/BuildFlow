@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- 1. HERO SECTION --}}
    <x-hero-section />

    {{-- 2. STATISTICS COUNTER --}}
    <section class="stats-strip py-4">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <div class="stat-number">{{ $stats['years_experience'] }}+</div>
                    <div class="stat-label">Years Experience</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number">{{ $stats['projects_completed'] }}+</div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number">{{ $stats['expert_team'] }}+</div>
                    <div class="stat-label">Expert Team</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-number">{{ $stats['industry_awards'] }}+</div>
                    <div class="stat-label">Industry Awards</div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. ABOUT COMPANY --}}
    <section class="section-py">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=700&q=80"
                             class="img-fluid rounded shadow" alt="Construction worker on site">
                        <div class="position-absolute bottom-0 end-0 bg-primary text-white rounded p-3 m-3 text-center">
                            <div class="fw-bold fs-4">25+</div>
                            <div class="small">Years of Excellence</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <span class="section-title-eyebrow"><i class="bi bi-buildings me-1"></i> About BuildFlow</span>
                    <h2 class="mt-2 mb-4">We Build With Precision, Passion &amp; Purpose</h2>
                    <p class="text-secondary mb-4">
                        Since 1998, we have been delivering world-class construction services across residential,
                        commercial, and infrastructure sectors. Our commitment to quality craftsmanship and client
                        satisfaction shows in everything we do.
                    </p>
                    <div class="row g-4 mb-4">
                        <div class="col-md-6 d-flex gap-2">
                            <i class="bi bi-patch-check-fill text-primary fs-4"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Licensed &amp; Insured</h6>
                                <small class="text-secondary">Fully certified and compliant for every project.</small>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex gap-2">
                            <i class="bi bi-clock-fill text-primary fs-4"></i>
                            <div>
                                <h6 class="fw-bold mb-1">On-Time Delivery</h6>
                                <small class="text-secondary">Proven track record of completing on schedule.</small>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex gap-2">
                            <i class="bi bi-people-fill text-primary fs-4"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Expert Workforce</h6>
                                <small class="text-secondary">Over 120 skilled professionals across disciplines.</small>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex gap-2">
                            <i class="bi bi-trophy-fill text-primary fs-4"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Award Winning</h6>
                                <small class="text-secondary">Recognized with 35+ industry awards.</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="{{ route('quote.create') }}" class="btn btn-primary rounded-pill px-4">Start Your Project</a>
                        <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary rounded-pill px-4">View Our Work</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. SERVICES --}}
    <section class="section-py bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-title-eyebrow">What We Offer</span>
                <h2 class="mt-2">Our Services</h2>
                <p class="text-secondary mx-auto" style="max-width: 600px;">
                    From ground-breaking to handover, we offer end-to-end construction services tailored to your needs.
                </p>
            </div>
            <div class="row g-4">
                @forelse ($services as $service)
                    <div class="col-md-6 col-lg-4">
                        <x-service-card :service="$service" />
                    </div>
                @empty
                    <p class="text-center text-secondary">Services coming soon.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- 5. COMPANY ACHIEVEMENTS --}}
    <section class="section-py">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <span class="section-title-eyebrow">Our Track Record</span>
                    <h2 class="mt-2 mb-3">Numbers That Speak for Our Commitment</h2>
                    <p class="text-secondary mb-4">
                        Every project we complete adds to a track record built on safety, quality, and client trust.
                    </p>
                    <a href="{{ route('projects.index') }}" class="fw-semibold text-primary">
                        View Our Projects <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="border rounded p-4 d-flex gap-3 align-items-center h-100">
                                <i class="bi bi-bar-chart-fill text-primary fs-2"></i>
                                <div>
                                    <div class="fw-bold fs-4">{{ $stats['projects_completed'] }}+</div>
                                    <small class="text-secondary">Projects Delivered</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-4 d-flex gap-3 align-items-center h-100">
                                <i class="bi bi-emoji-smile-fill text-primary fs-2"></i>
                                <div>
                                    <div class="fw-bold fs-4">620+</div>
                                    <small class="text-secondary">Satisfied Clients</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-4 d-flex gap-3 align-items-center h-100">
                                <i class="bi bi-person-workspace text-primary fs-2"></i>
                                <div>
                                    <div class="fw-bold fs-4">{{ $stats['expert_team'] }}+</div>
                                    <small class="text-secondary">Skilled Workers</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-4 d-flex gap-3 align-items-center h-100">
                                <i class="bi bi-award-fill text-primary fs-2"></i>
                                <div>
                                    <div class="fw-bold fs-4">{{ $stats['industry_awards'] }}+</div>
                                    <small class="text-secondary">Industry Awards</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 6. PROJECTS PORTFOLIO --}}
    <section class="section-py bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-title-eyebrow">Our Work</span>
                <h2 class="mt-2">Our Projects</h2>
                <p class="text-secondary mx-auto" style="max-width: 600px;">
                    A selection of residential, commercial, and infrastructure projects we're proud to have delivered.
                </p>
            </div>
            <div class="row g-4">
                @forelse ($featuredProjects as $project)
                    <div class="col-md-6 col-lg-4">
                        <x-project-card :project="$project" />
                    </div>
                @empty
                    <p class="text-center text-secondary">Projects coming soon.</p>
                @endforelse
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('projects.index') }}" class="btn btn-primary rounded-pill px-4">View All Projects</a>
            </div>
        </div>
    </section>

    {{-- 7. HOW WE WORK --}}
    <section class="section-py">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-title-eyebrow">Our Process</span>
                <h2 class="mt-2">How We Work</h2>
                <p class="text-secondary mx-auto" style="max-width: 600px;">
                    A clear, structured process from first consultation to final handover.
                </p>
            </div>
            <div class="row g-4 text-center">
                @php
                    $steps = [
                        ['icon' => 'bi-chat-dots-fill', 'title' => 'Consultation', 'desc' => 'We discuss your goals, budget, and vision for the project.'],
                        ['icon' => 'bi-pencil-square', 'title' => 'Planning & Design', 'desc' => 'Our architects draft detailed plans and design concepts.'],
                        ['icon' => 'bi-cone-striped', 'title' => 'Construction', 'desc' => 'Skilled crews execute the build with quality oversight.'],
                        ['icon' => 'bi-key-fill', 'title' => 'Project Handover', 'desc' => 'Final walkthrough, inspection, and handover of keys.'],
                    ];
                @endphp
                @foreach ($steps as $index => $step)
                    <div class="col-md-6 col-lg-3 process-step">
                        <div class="step-number mb-2">0{{ $index + 1 }}</div>
                        <div class="step-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi {{ $step['icon'] }} fs-3"></i>
                        </div>
                        <h5 class="fw-bold">{{ $step['title'] }}</h5>
                        <p class="text-secondary small">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 8. TEAM MEMBERS --}}
    <section class="section-py bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-title-eyebrow">Meet The Experts</span>
                <h2 class="mt-2">Our Team</h2>
                <p class="text-secondary mx-auto" style="max-width: 600px;">
                    Experienced professionals dedicated to bringing your construction vision to life.
                </p>
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

    {{-- 9. TESTIMONIALS --}}
    <section class="section-py">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-title-eyebrow">What Clients Say</span>
                <h2 class="mt-2">Client Testimonials</h2>
            </div>
            <div class="row g-4">
                @forelse ($testimonials->take(3) as $testimonial)
                    <div class="col-md-6 col-lg-4">
                        <x-testimonial-card :testimonial="$testimonial" />
                    </div>
                @empty
                    <p class="text-center text-secondary">No testimonials yet.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- 10. FAQ --}}
    <section class="section-py bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-title-eyebrow">Got Questions?</span>
                <h2 class="mt-2">Frequently Asked Questions</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if ($faqs->isNotEmpty())
                        <x-faq-accordion :faqs="$faqs" />
                    @else
                        <p class="text-center text-secondary">FAQs coming soon.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- 11. CONTACT FORM --}}
    <section class="section-py">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Get In Touch</h2>
                <p class="text-secondary">Have a project in mind? Send us a message and we'll respond within 24 hours.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('contact.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                   placeholder="Your Name" value="{{ old('name') }}">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                   placeholder="Your Email" value="{{ old('email') }}">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" class="form-control form-control-lg" placeholder="Phone Number" value="{{ old('phone') }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="subject" class="form-control form-control-lg" placeholder="Subject" value="{{ old('subject') }}">
                        </div>
                        <div class="col-12">
                            <textarea name="message" rows="5" class="form-control form-control-lg @error('message') is-invalid @enderror"
                                      placeholder="Your Message">{{ old('message') }}</textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
