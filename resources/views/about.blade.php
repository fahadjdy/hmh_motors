@extends('layouts.base')

@section('title', $profile->name .' - About')

@section('meta_description', $profile->about)
@section('meta_keywords', $profile->name . ', rikshaw spare parts, auto parts')


@section('content')
 <!-- Breadcrumb Banner -->
    <section class="breadcrumb-banner">
        <div class="breadcrumb-container">
            <ul class="breadcrumb-list">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>About Us</li>
            </ul>
            <h1 class="breadcrumb-title">About Us</h1>
        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="about">
        <div class="about-container">
            <div class="about-image">
                <div class="image-grid">
                    <div class="grid-item medium" data-aos="fade-right">
                        <img loading="lazy" src="{{asset('img/profile/rikshaw-mumbai.png'); }}" alt="Frame">
                    </div>
                </div>
                <div class="floating-shapes">
                    <div class="shape shape-1"></div>
                    <div class="shape shape-2"></div>
                </div>
            </div>
            <div class="about-content">
                <h2>Welcome to {{ $profile->name }}</h2>
                <h3>{{ $profile->slogan }}</h3>
                <p>{{ $profile->about }}</p>

                <div class="about-services-grid">
                    <div class="about-service-item">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Fast Delivery</span>
                    </div>
                    <div class="about-service-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Quality Assured</span>
                    </div>
                    <div class="about-service-item">
                        <i class="fas fa-tools"></i>
                        <span>Expert Support</span>
                    </div>
                    <div class="about-service-item">
                        <i class="fas fa-medal"></i>
                        <span>Best Prices</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Call to Action -->
    <x-cta-section />


    
    <!-- Contact Section -->
    <x-contact-form />


@endsection
