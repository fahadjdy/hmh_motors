<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="{{ url('/') }}">
                @if($profile && $profile->logo)
                <img src="{{ Storage::url($profile->logo) }}" alt="{{ $profile->name}}" height="50">
                @else
                <h4>HMH MOTORS</h4>
                @endif
            </a>
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{ url('/products') }}" class="nav-link">Products</a></li>
            <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
        </ul>
        <button class="download-btn">
           <a href="{{ url('/products/brochure') }}" target="_blank">  <i class="fas fa-download"></i> Brochure </a>
        </button>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>
