@extends('layouts.app')

@section('title', $blog->title)

@section('content')

    <section class="bg-navy text-white py-5">
        <div class="container py-4">
            <h1 class="fw-bold">{{ $blog->title }}</h1>
            <p class="text-light-emphasis mb-0">
                <a href="{{ route('home') }}" class="text-secondary">Home</a> /
                <a href="{{ route('blog.index') }}" class="text-secondary">Blog</a> / {{ $blog->title }}
            </p>
        </div>
    </section>

    <section class="section-py">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="img-fluid rounded shadow mb-4 w-100">

                    <div class="d-flex gap-3 mb-4 text-secondary small">
                        <span><i class="bi bi-person"></i> {{ $blog->author?->name ?? 'BuildFlow Team' }}</span>
                        <span><i class="bi bi-calendar3"></i> {{ $blog->published_at?->format('M d, Y') }}</span>
                        <span><i class="bi bi-folder"></i> {{ $blog->category?->name ?? 'General' }}</span>
                    </div>

                    <div class="text-secondary blog-content">
                        {!! $blog->content !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-4">
                        <h5 class="fw-bold mb-3">Recent Posts</h5>
                        <div class="d-flex flex-column gap-3">
                            @foreach ($recentBlogs as $recent)
                                <a href="{{ route('blog.show', $recent->slug) }}" class="d-flex gap-3 text-decoration-none text-dark">
                                    <img src="{{ $recent->image_url }}" class="rounded" style="width: 70px; height: 70px; object-fit: cover;">
                                    <div>
                                        <h6 class="fw-bold mb-0 small">{{ $recent->title }}</h6>
                                        <small class="text-secondary">{{ $recent->published_at?->format('M d, Y') }}</small>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
