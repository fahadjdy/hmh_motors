<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="{{ url('/') }}">
                <h4>HMH MOTORS</h4>
            </a>
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{ url('/products') }}" class="nav-link">Products</a></li>
            <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
        </ul>
        <button class="download-btn">
            <i class="fas fa-download"></i> Brochure
        </button>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>
