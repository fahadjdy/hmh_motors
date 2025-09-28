 <section id="contact" class="contact">
        <div class="contact-container">
            <div class="contact-info">
                <h2>Get in Touch</h2>
                <div class="contact-details">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>{{ $profile->email }}</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+91 {{ $profile->contact }}</span> ||
                        <span>+91 9316808435</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $profile->location ?? null }}, {{ $profile->city ?? null }}, {{ $profile->state ?? null }} {{ $profile->pincode ?? null }}</span>
                    </div>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d910.8722310751365!2d72.39090127521462!3d24.049081219878424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDAyJzU2LjciTiA3MsKwMjMnMzEuNiJF!5e0!3m2!1sen!2sin!4v1758127777947!5m2!1sen!2sin" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="contact-form">
                <h3>Need a Custom Solution?</h3>
               <form>
                <input type="text" placeholder="Your Name" required name="name">
                <div class="error"></div>

                <input type="email" placeholder="Your Email" required name="email">
                <div class="error"></div>

                <input type="tel" placeholder="Your Mobile" name="mobile" pattern="[0-9]{10}" required>
                <div class="error"></div>

                    <textarea placeholder="Your Message" rows="5" required name="description"></textarea>
                    <div class="error"></div>

                <button type="submit">Send Message</button>
                </form>

            </div>
        </div>
    </section>
