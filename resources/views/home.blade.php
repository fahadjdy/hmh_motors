@extends('layouts.base')

@section('title', $profile->name .' - Home')

@section('content')
   
    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-background">
            <div class="bubble bubble-1"></div>
            <div class="bubble bubble-2"></div>
            <div class="bubble bubble-3"></div>
            <div class="bubble bubble-4"></div>
        </div>
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">{{ $profile->name }}</h1>
                <p class="hero-slogan">All types of Rikshaw Body Parts manufacturer.</p>
                <p class="hero-description">Leading manufacturer and retailer of premium HMH Motors Industry. We
                    provide durable, high-quality components for all your three-wheeler needs.</p>
                <a href="#about" class="cta-button">
                    Get Started
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="hero-image" data-aos="fade-left">
                <img laoding="lazy" src="{{asset('img/profile/ev-rikshaw.png'); }}" alt="AutoRikshaw Family">
                <div class="floating-icons">
                    <i class="fas fa-cog icon-1"></i>
                    <i class="fas fa-wrench icon-2"></i>
                    <i class="fas fa-tools icon-3"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="about-container">
            <div class="about-image">
                <div class="image-grid">
                    <div class="grid-item medium" data-aos="fade-right">
                        <img laoding="lazy" src="{{asset('img/profile/rikshaw-mumbai.png'); }}" alt="Frame">
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

    <!-- Services Choose Us -->
    <section class="services" data-aos="fade-up">
        <div class="services-container">
            <h2 data-aos="fade-down">Our Services</h2>
            <!-- <p>Comprehensive solutions for all your autorikshaw needs</p> -->
            <div class="features-grid">
                <div class="feature-item" data-aos="zoom-in" data-aos-delay="100">
                    <i class="fas fa-award"></i>
                    <h3>Premium Quality</h3>
                    <p>ISO certified manufacturing with stringent quality control</p>
                </div>
                <div class="feature-item" data-aos="zoom-in" data-aos-delay="200">
                    <i class="fas fa-clock"></i>
                    <h3>Timely Delivery</h3>
                    <p>Fast and reliable delivery across all major cities</p>
                </div>
                <div class="feature-item" data-aos="zoom-in" data-aos-delay="300">
                    <i class="fas fa-dollar-sign"></i>
                    <h3>Competitive Pricing</h3>
                    <p>Best prices in the market without compromising quality</p>
                </div>
                <div class="feature-item" data-aos="zoom-in" data-aos-delay="400">
                    <i class="fas fa-users"></i>
                    <h3>Expert Team</h3>
                    <p>Experienced professionals with deep industry knowledge</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Browse by Category -->
    <section class="categories">
        <div class="categories-container">
            <h2>Browse by Category</h2>
            <div class="category-slider">
                @foreach ($categories as $category)
                <a href="{{ route('category', $category->slug) }}">
                    <div class="category-item">
                            <img laoding="lazy" src="{{ asset('storage/' . $category->primary_image) }}" alt="{{ $category->name }}">
                            <span>{{ $category->name }}</span>
                        </div>
                    </a>
                @endforeach


                {{-- <div class="category-item">
                    <img src="assets/img/profile/rikshaw-mumbai.png" alt="Engine Parts">
                    <span>Engine Parts</span>
                </div>
                <div class="category-item">
                    <img src="assets/img/profile/rikshaw-mumbai.png" alt="Wheels">
                    <span>Wheels</span>
                </div>
                <div class="category-item">
                    <img src="assets/img/profile/rikshaw-mumbai.png" alt="Lights">
                    <span>Lights</span>
                </div>
                <div class="category-item">
                    <img src="assets/img/profile/rikshaw-mumbai.png" alt="Seats">
                    <span>Seats</span>
                </div>
                <div class="category-item">
                    <img src="assets/img/profile/rikshaw-mumbai.png" alt="Dashboard">
                    <span>Dashboard</span>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Product Listing -->
    <section class="products">
        <div class="products-container">
            <h2>Featured Products</h2>
            <div class="products-grid">
                <!-- Product cards will be generated here -->
            </div>
            <div class="pagination">
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="section-label">WHY CHOOSE </div>
                    <h2 class="main-heading">HMH Motors ? </sub></h2>
                    <p class="description">
                        Delivering high-quality autorickshaw body parts with<br>
                        durability, precision, and unmatched customer trust.
                    </p>
                </div>
                <div class="col-8" data-aos="fade-left">
                    <img laoding="lazy" src="{{ asset('img/profile/HD-group-rikshaw.png'); }}" alt="AutoRikshaw Family">
                </div>
            </div>

            <div class="features-grid">
                <div class="feature">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20" />
                        <path d="M2 12h20" />
                    </svg>
                    <h3 class="feature-title">Wide Reach</h3>
                    <p class="feature-description">
                        Supplying spare parts across multiple<br>
                        cities with consistent quality standards.
                    </p>
                </div>

                <div class="feature">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                        <line x1="16" x2="16" y1="2" y2="6" />
                        <line x1="8" x2="8" y1="2" y2="6" />
                        <line x1="3" x2="21" y1="10" y2="10" />
                        <path d="M8 14h.01" />
                        <path d="M12 14h.01" />
                        <path d="M16 14h.01" />
                        <path d="M8 18h.01" />
                        <path d="M12 18h.01" />
                    </svg>
                    <h3 class="feature-title">Easy Tracking</h3>
                    <p class="feature-description">
                        Track your orders & shipments<br>
                        directly from our support system.
                    </p>
                </div>

                <div class="feature">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <rect width="20" height="14" x="2" y="5" rx="2" />
                        <line x1="2" x2="22" y1="10" y2="10" />
                    </svg>
                    <h3 class="feature-title">Affordable Pricing</h3>
                    <p class="feature-description">
                        Get the best prices with assured<br>
                        quality and genuine spare parts.
                    </p>
                </div>

                <div class="feature">
                    <svg class="feature-icon" viewBox="0 0 24 24">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                    <h3 class="feature-title">Secure Deals</h3>
                    <p class="feature-description">
                        Reliable transactions with<br>
                        guaranteed delivery assurance.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Call to Action -->
    <x-cta-section />


    <!-- Contact Section -->
     <x-contact-form />

    <!-- Testimonials Section -->
    @if($testimonials->isNotEmpty())
    <section class="testimonials">
        <div class="testimonials-container">
            <h2>What Our Clients Say</h2>

            <!-- Swiper -->
            <div class="swiper testimonial-slider">
                <div class="swiper-wrapper">

                    <!-- Testimonial Item 1 -->
                    @foreach ($testimonials as $item) 
                        
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="ornamental-border"></div>
                            <div class="testimonial-content">
                                <p>{{ $item->content ?? $profile->name }}</p>
                            </div>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    {{ strtoupper(substr($item->name, 0, 1)) }}{{ strtoupper(substr(strrchr($item->name, ' '), 1, 1)) }}
                                </div>
                                <div class="author-info">
                                    <h4>
                                        {{ $item->name ?? 'HMH Motors' }}
                                    </h4>
                                    <span>
                                        {{ $item->designation ?? 'AutoRikshaw Spare Parts Manufacturer' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Pagination Dots -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    @endif

    <script>
          window.products = @json($products);
    </script>
@endsection
