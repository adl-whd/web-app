@extends('master.layout')
@section('content')

<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">

    <img src="assets/img/main-wall.jpg" alt="Swift Retreat Luxury Hotel" data-aos="fade-in">

    <div class="container d-flex flex-column align-items-center justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
      <h1>Welcome to Swift Retreat</h1>
      <p><span class="typed" data-typed-items="Luxury Accommodation, Ocean View Rooms, Spa & Wellness, Fine Dining"></span></p>
      <a href="#booking" class="btn-book scrollto">Book Your Stay</a>
    </div>

  </section><!-- /Hero Section -->

  <!-- Booking Form Section -->
  <section id="booking" class="booking section">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Book Your Stay</h2>
        <p>Find the perfect room for your vacation</p>
      </div>

      <div class="booking-form">
        <form action="/book" method="post">
          <div class="row gy-4">
            <div class="col-md-3">
              <label for="check-in">Check-In</label>
              <input type="text" id="check-in" name="check-in" class="form-control datepicker" placeholder="Check-In Date" required>
            </div>
            <div class="col-md-3">
              <label for="check-out">Check-Out</label>
              <input type="text" id="check-out" name="check-out" class="form-control datepicker" placeholder="Check-Out Date" required>
            </div>
            <div class="col-md-2">
              <label for="adults">Adults</label>
              <select id="adults" name="adults" class="form-control" required>
                <option value="1">1</option>
                <option value="2" selected>2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="children">Children</label>
              <select id="children" name="children" class="form-control">
                <option value="0" selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button type="submit" class="btn-check">Check Availability</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section><!-- /Booking Form Section -->

  <!-- Rooms Section -->
  <section id="rooms" class="rooms section">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Rooms & Suites</h2>
        <p>Experience luxury in every detail</p>
      </div>

      <div class="row gy-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="room-item">
            <img src="assets/img/rooms/deluxe-room.jpg" class="img-fluid" alt="Deluxe Room" style="width: 100%; height: 250px;">
            <div class="room-info">
              <h3>Deluxe Room</h3>
              <p class="price">From $199/night</p>
              <ul>
                <li><i class="bi bi-check-circle"></i> King Size Bed</li>
                <li><i class="bi bi-check-circle"></i> Ocean View</li>
                <li><i class="bi bi-check-circle"></i> 45 sqm</li>
              </ul>
              <a href="#booking" class="btn-book scrollto">Book Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="room-item">
            <img src="assets/img/rooms/executive-room.jpg" class="img-fluid" alt="Executive Suite" style="width: 100%; height: 250px;">
            <div class="room-info">
              <h3>Executive Suite</h3>
              <p class="price">From $349/night</p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Separate Living Area</li>
                <li><i class="bi bi-check-circle"></i> Private Balcony</li>
                <li><i class="bi bi-check-circle"></i> 75 sqm</li>
              </ul>
              <a href="#booking" class="btn-book scrollto">Book Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="room-item">
            <img src="assets/img/rooms/presidential-room.jpg" class="img-fluid" alt="Presidential Suite" style="width: 100%; height: 250px;">
            <div class="room-info">
              <h3>Presidential Suite</h3>
              <p class="price">From $599/night</p>
              <ul>
                <li><i class="bi bi-check-circle"></i> Two Bedrooms</li>
                <li><i class="bi bi-check-circle"></i> Panoramic Views</li>
                <li><i class="bi bi-check-circle"></i> 120 sqm</li>
              </ul>
              <a href="#booking" class="btn-book scrollto">Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /Rooms Section -->

  <!-- Amenities Section -->
  <section id="amenities" class="amenities section accent-background">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Our Amenities</h2>
        <p>Everything you need for a perfect stay</p>
      </div>

      <div class="row gy-4">
        <div class="col-lg-3 col-md-6">
          <div class="amenity-item">
            <div class="icon">
              <i class="bi bi-umbrella"></i>
            </div>
            <h3>Infinity Pool</h3>
            <p>Stunning ocean-view infinity pool with swim-up bar</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="amenity-item">
            <div class="icon">
              <i class="bi bi-cup-hot"></i>
            </div>
            <h3>Spa & Wellness</h3>
            <p>Full-service spa with massage treatments and sauna</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="amenity-item">
            <div class="icon">
              <i class="bi bi-egg-fried"></i>
            </div>
            <h3>Fine Dining</h3>
            <p>Gourmet restaurants with international cuisine</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="amenity-item">
            <div class="icon">
              <i class="bi bi-wifi"></i>
            </div>
            <h3>High-Speed WiFi</h3>
            <p>Complimentary high-speed internet throughout the hotel</p>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /Amenities Section -->

  <!-- Gallery Section -->
  <section id="gallery" class="gallery section">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Gallery</h2>
        <p>Explore our beautiful property</p>
      </div>

      <div class="row gy-4">
        <div class="col-lg-4 col-md-6">
          <div class="gallery-item">
            <img src="assets/img/gallery/pool-area.jpg" class="img-fluid" alt="Pool Area">
            <div class="gallery-info">
              <h4>Infinity Pool</h4>
              <a href="assets/img/gallery/pool-area.jpg" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="gallery-item">
            <img src="assets/img/gallery/restaurant.jpg" class="img-fluid" alt="Restaurant">
            <div class="gallery-info">
              <h4>Ocean View Restaurant</h4>
              <a href="assets/img/gallery/restaurant.jpg" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="gallery-item">
            <img src="assets/img/gallery/spa.jpg" class="img-fluid" alt="Spa">
            <div class="gallery-info">
              <h4>Luxury Spa</h4>
              <a href="assets/img/gallery/spa.jpg" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /Gallery Section -->

  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section accent-background">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Guest Reviews</h2>
        <p>What our guests say about us</p>
      </div>

      <div class="swiper init-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="assets/img/profile-img.jpg" class="testimonial-img" alt="Guest 1">
              <h3>John Doe</h3>
              <h4>New York</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>Absolutely stunning property with exceptional service. The ocean view from our room was breathtaking and the staff went above and beyond to make our stay memorable.</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/guest2.jpg" class="testimonial-img" alt="Guest 2">
              <h3>Michael Chen</h3>
              <h4>San Francisco</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>The best hotel experience we've ever had. The attention to detail was remarkable, from the turndown service to the personalized welcome note. We'll definitely be back!</span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section><!-- /Testimonials Section -->

  <!-- Contact Section -->
  <section id="contact" class="contact section">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Contact Us</h2>
        <p>Get in touch with our team</p>
      </div>

      <div class="row gy-5">
        <div class="col-lg-4">
          <div class="info-item d-flex align-items-center">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Address</h3>
              <p>123 Ocean View Drive, Paradise Island</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="info-item d-flex align-items-center">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Reservations</h3>
              <p>+1 800 123 4567</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="info-item d-flex align-items-center">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email</h3>
              <p>reservations@swiftretreat.com</p>
            </div>
          </div>
        </div>
      </div>

      <form action="/contact" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="300">
        <div class="row gy-4">
          <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="col-md-6">
            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
          </div>
          <div class="col-md-12">
            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
          </div>
          <div class="col-md-12">
            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
          </div>
          <div class="col-md-12 text-center">
            <button type="submit">Send Message</button>
          </div>
        </div>
      </form>
    </div>
  </section><!-- /Contact Section -->

</main>

@endsection
