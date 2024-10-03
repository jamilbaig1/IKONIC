<?php
/**
 * Template Name: Home Page Template
 *
 * Description: A custom home page template.
 *
 * @package YourThemeName
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1>Better Solutions For Your Business</h1>
            <p>We are team of talented designers making websites with Bootstrap</p>
            
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img">
            <img src="<?=get_template_directory_uri().'/images/hero-img.png'?>" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section>

<section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" >
        <h2>Services</h2>
        <p class="section-para">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container boxes-row">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4>Lorem Ipsum</h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4>Sed ut perspici</h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4>Magni Dolores</h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4>Nemo Enim</h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section>

<section id="call-to-action" class="call-to-action section dark-background">

      <img src="<?=get_template_directory_uri().'/images/cta-bg.jpg'?>" alt="">

      <div class="container">

        <div class="row">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Call To Action</h3>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>

    </section>

		<section id="why-us" class="sec-pad">
<div class="container" bis_skin_checked="1">
<div class="row" bis_skin_checked="1">
<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-12" bis_skin_checked="1">
<div class="why-us-content text-center" bis_skin_checked="1">
<img class="mb-4" src="<?=get_template_directory_uri().'/images/best-offer.png'?>" alt="">
<h3>Best Price Guarantee</h3>
<p>Our Best Price Guarantee means that you can be sure of booking at the best rate</p>
</div>
</div>
<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-12" bis_skin_checked="1">
<div class="why-us-content text-center" bis_skin_checked="1">
<img class="mb-4" src="<?=get_template_directory_uri().'/images/chat.png'?>" alt="">
<h3>Live Chat Support</h3>
<p>Our services help different sectors where specific issues need to be logged</p>
</div>
</div>
<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-12" bis_skin_checked="1">
<div class="why-us-content text-center" bis_skin_checked="1">
<img class="mb-4" src="<?=get_template_directory_uri().'/images/booking.png'?>" alt="">
<h3>Fast &amp; Secure Booking</h3>
<p>Secure online booking system, you’re in control of your secure booking system security</p>
</div>
</div>
<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-12" bis_skin_checked="1">
<div class="why-us-content text-center" bis_skin_checked="1">
<img class="mb-4" src="<?=get_template_directory_uri().'/images/booking-1.png'?>" alt="">
<h3>Secure Online Booking</h3>
<p>Secure online booking system, you’re in control of your secure booking system security</p>
</div>
</div>
</div>
</div>
</section>

<div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form">
              	<input type="email" name="email" class="name-field">
              	<input type="submit" value="Subscribe" class="submit-btn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
	
	</main><!-- #main -->

<?php
get_footer();
