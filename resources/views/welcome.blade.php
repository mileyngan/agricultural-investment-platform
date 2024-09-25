<!-- resources/views/landing.blade.php -->
@extends('layouts.app')

@section('content')

<section class="bg">
    <nav>
        <div class="logo">
           <h1>Logo Here</h1>
        </div>
        <div class="navigation">
                <div class="btns">
                    <a href="#service" class="links">Services</a>
                    <a href="#contact" class="links">Contact Us</a>
                    <a href="{{ route('login') }}" class="button is-primary">Login</a>
                    <!-- <a href="{{ route('register') }}" class="button is-primary">Register</a> -->
                </div>

        </div>
    </nav>

</section>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hcontainer">
            <div class="hero-body">
                <h1 class="title is-1">The <span class="color">Importance</span> of <br><span class="color">Agriculture</span> in Cameroon</h1>
                <p class="subtitle is-4">Agriculture is the backbone of Cameroon's economy, providing employment opportunities and food for the population.By investing in agricultural projects, you are contributing to the growth and development of Cameroon's economy.</p>
                <div>
                    <button class="button is-primary is-large">Learn More</button>
                    <a href="#contact"><button class="button is-primary is-larges">Know More</button></a>
                </div>
            </div>
            <div class="himage">
                <!-- <img src="{{ asset('images/pexels-anastasia-shuraeva-5126301.jpg') }}" width="100%" height="100%" alt="heroimage.png"/> -->
            </div>
        </div>
    </section>

    <!-- Why Invest Section -->
    <section class="sectionabout" id="service">
        <div class="">
            <h2 class="title is-2">Why <span class="color">Invest</span> in Cameroon?</h2>
            <p class="text">By investing in agricultural projects, you are supporting local farmers and contributing to the growth of Cameroon's agricultural sector.</p>
            <div class="aboutcolumns is-multiline">
                <div class="column is-one-third">
                    <div class="card">
                        <div class="cardImg">
                            <img src="{{ asset('images/pexels-zen-chung-5529765.jpg')}}" atl=""/>
                        </div>
                        <div class="card-content">
                            <h3 class="title is-4">Diversify Your Portfolio</h3>
                            <p>Investing in agricultural projects in Cameroon provides a unique opportunity to diversify your portfolio and reduce risk.</p>
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="card">
                    <div class="cardImg">
                            <img src="{{ asset('images/pexels-zen-chung-5529765.jpg')}}" atl=""/>
                        </div>
                        <div class="card-content">
                            <h3 class="title is-4">Support Local Farmers</h3>
                            <p>By investing in agricultural projects, you are supporting local farmers and contributing to the growth of Cameroon's agricultural sector.</p>
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="card">
                    <div class="cardImg">
                            <img src="{{ asset('images/pexels-zen-chung-5529765.jpg')}}" atl=""/>
                        </div>
                        <div class="card-content">
                            <h3 class="title is-4">High Returns on Investment</h3>
                            <p>Agricultural projects in Cameroon offer high returns on investment, making it a lucrative opportunity for investors.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="aboutcolumns is-multiline">
                <div class="column is-one-third">
                    <div class="card">
                        <div class="cardImg">
                            <img src="{{ asset('images/pexels-zen-chung-5529765.jpg')}}" atl=""/>
                        </div>
                        <div class="card-content">
                            <h3 class="title is-4">Diversify Your Portfolio</h3>
                            <p>Investing in agricultural projects in Cameroon provides a unique opportunity to diversify your portfolio and reduce risk.</p>
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="card">
                    <div class="cardImg">
                            <img src="{{ asset('images/pexels-zen-chung-5529765.jpg')}}" atl=""/>
                        </div>
                        <div class="card-content">
                            <h3 class="title is-4">Support Local Farmers</h3>
                            <p>By investing in agricultural projects, you are supporting local farmers and contributing to the growth of Cameroon's agricultural sector.</p>
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="card">
                    <div class="cardImg">
                            <img src="{{ asset('images/pexels-zen-chung-5529765.jpg')}}" atl=""/>
                        </div>
                        <div class="card-content">
                            <h3 class="title is-4">High Returns on Investment</h3>
                            <p>Agricultural projects in Cameroon offer high returns on investment, making it a lucrative opportunity for investors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Call to Action Section -->
    <section class="text-center calltoaction">
        <div class="containers">
            <h2 class="title is-2" style="color: #fff;">Get Started Today!</h2>
            <p style="color: #fff;">Invest in agricultural projects in Cameroon and contribute to the growth and development of the country's economy.</p>
            <button class="button is-primary is-large" style="background-color: #FFC107; color: #fff;margin: 30px 0 0 0">Invest Now</button>
        </div>
    </section>


    <!-- Ongoing Projects Section -->
    <section class="section projects" style="background-color: #F7F7F7; padding: 60px 0;">
        <div class="container">
            <h2 class="title is-2">Ongoing Projects</h2>
            <div class="columns is-multiline">
                @foreach ($projects as $project)
                    <div class="column is-one-third">
                        <div class="card">
                            <div class="card-content">
                                <h3 class="title is-4">{{ $project->title }}</h3>
                                <p>{{ $project->description }}</p>
                                @if (!Auth::check())
                                    <button class="button is-primary">Donate</button>
                                @else
                                    <button class="button is-primary">Invest</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11259.259668708624!2d11.508954403052776!3d3.863851334420287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bcf00317212d7%3A0x166c6d3f2ac82dff!2sDamas!5e0!3m2!1sen!2scm!4v1716690829681!5m2!1sen!2scm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div><!-- End Google Maps -->

        <!-- <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>A145 Yaounde Street, Damas, C 3944</p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>contact@example.com</p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+237 645-768-465</p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sat:</strong> 11AM - 23PM;
                  <strong>Sunday:</strong> Closed
                </div>
              </div>
            </div>
          </div>

        </div> -->

        <form action="#" method="post" role="form" class="php-email-form p-3 p-md-4">
          <div class="row">
            <div class="col-xl-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form><!--End Contact Form -->

      </div>
    </section><!-- End Contact Section -->


      <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

<div class="container">
  <div class="row gy-3">
    <div class="col-lg-3 col-md-6 d-flex">
      <i class="bi bi-geo-alt icon"></i>
      <div>
        <h4>Address</h4>
        <p>
          A108 Yaounde Street <br>
          Damas, C 3944 - Yaounde<br>
        </p>
      </div>

    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
      <i class="bi bi-telephone icon"></i>
      <div>
        <h4>Reservations</h4>
        <p>
          <strong>Phone:</strong> +237 678-675-967<br>
          <strong>Email:</strong> farm@example.com<br>
        </p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
      <i class="bi bi-clock icon"></i>
      <div>
        <h4>Opening Hours</h4>
        <p>
          <strong>Mon-Sat: 11AM</strong> - 23PM<br>
          Sunday: Closed
        </p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links">
      <h4>Follow Us</h4>
      <div class="social-links d-flex">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

  </div>
</div>

<div class="container">
  <div class="copyright">
    &copy; Copyright <strong><span>FarmWork</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    Designed by TECHTEAM
  </div>
</div>

</footer><!-- End Footer -->
<!-- End Footer -->

@endsection