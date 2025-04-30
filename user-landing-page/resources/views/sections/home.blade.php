@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <!-- Konten hero section -->
    </section>

    <!-- Clients Section -->
    <section id="clients" class="clients section">
        <!-- Konten clients section -->
    </section>

    <!-- About Section -->
    <section id="about" class="about section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-xl-center gy-5">
                <div class="col-xl-5 content">
                    <h3>{{ $about['title'] }}</h3>
                    <h2>{{ $about['heading'] }}</h2>
                    <p>{{ $about['description'] }}</p>
                    <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-xl-7">
                    <div class="row gy-4 icon-boxes">
                        @foreach($about['features'] as $feature)
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="bi {{ $feature['icon'] }}"></i>
                                <h3>{{ $feature['title'] }}</h3>
                                <p>{{ $feature['description'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $services['title'] }}</h2>
            <p>{{ $services['description'] }}</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                @foreach($services['items'] as $service)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi {{ $service['icon'] }}"></i></div>
                        <div>
                            <h4 class="title"><a href="{{ $service['link'] }}" class="stretched-link">{{ $service['title'] }}</a></h4>
                            <p class="description">{{ $service['description'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">
        <!-- Implementasi serupa untuk portfolio -->
    </section>

    <!-- Team Section -->
    <section id="team" class="team section light-background">
        <!-- Implementasi serupa untuk team -->
    </section>

    <!-- Blog Section -->
    <section id="blog" class="blog-posts section">
        <!-- Implementasi serupa untuk blog -->
    </section>
@endsection
