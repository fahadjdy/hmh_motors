<footer class="footer">
    <div class="footer-container">
        <div class="footer-column">
            <div class="footer-logo">
                {{-- <img src="{{ asset('img/profile/rikshaw-mumbai.png') }}" alt="AutoRikshaw Parts"> --}}
                 <h4>HMH MOTORS</h4>
            </div>
            <p>Leading manufacturer and retailer of premium HMH Motors Industry with over 7 years of experience.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>

        <div class="footer-column">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Latest Products</h4>
            <ul>
                @foreach ($categories as $key => $category)
                        <li>
                            <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a>
                        </li>
                        @if ($key == 3) @break  @endif
                @endforeach
            </ul>
        </div>

        <div class="footer-column">
            <h4>Subscribe</h4>
            <p>Get updates on new products and offers</p>
            <div class="subscribe-form">
                <input type="email" placeholder="Your email">
                <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} {{ $profile->name }}. All rights reserved. | Developed by : <a target="_blank" href="https://fahad-jadiya.com/" class="text-white">Fahad Jadiya</a></p>
    </div>
</footer>
