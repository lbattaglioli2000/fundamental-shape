@extends('layouts.master')

@section('title')
The Fundamental Shape
@endsection

@section('content')

<body id="page-top">
    @include('layouts.nav')

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container text-center my-auto">
        <h1 class="mb-1">The Fundamental Shape</h1>
        <h3 class="mb-5">
          <em>Web design and application development</em>
        </h3>
        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
      </div>
      <div class="overlay"></div>
    </header>

    <!-- About -->
    <section class="content-section bg-light" id="about">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2>We build simple and elegant websites and web apps for startups and small businesses.</h2>
            <p class="lead mb-5">
              As a web design company, we know and value how important it is to have a stunning internet presence. This means you should have an elegant, responsive, simple, and easy to use website that is chock-full of information that is relevant to your business, which helps your customers find what they’re looking for, and ultimately make you more money.
            </p>
            <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">What We Offer</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section class="content-section bg-primary text-white text-center" id="services">
      <div class="container">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">Services</h3>
          <h2 class="mb-5">What We Offer</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-question"></i>
            </span>
            <h4>
              <strong>Extensive Support</strong>
            </h4>
            <p class="text-faded mb-0">We have a supportive and knowledgeable staff who will move mountains to help you. We’ll be with you every step of the way.</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fas fa-microchip"></i>
            </span>
            <h4>
              <strong>Modern Technology</strong>
            </h4>
            <p class="text-faded mb-0">
              All of our developers are well versed in the latest web technologies including HTML, CSS, JS and PHP.
            </p>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fas fa-server"></i>
            </span>
            <h4>
              <strong>Server Management</strong>
            </h4>
            <p class="text-faded mb-0">
              We'll help you to deploy your website or webapp to a server (we really like DigitalOcean), and we'll point your domain name to your server as well!
            </p>
          </div>
          <div class="col-lg-3 col-md-6">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="far fa-credit-card"></i>
            </span>
            <h4>
              <strong>Simple Pricing</strong>
            </h4>
            <p class="text-faded mb-0">We want you to know how much you pay right up front so we don't surprise you with charges either. Payment is also handled online, and is really simple.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio -->
    <section class="content-section" id="portfolio">
      <div class="container">
        <div class="content-section-heading text-center">
          <h3 class="text-secondary mb-0">Portfolio</h3>
          <h2 class="mb-5">Recent Projects</h2>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6">
            <a class="portfolio-item" href="http://www.AccuFrame.com" target="_blank">
              <span class="caption">
                <span class="caption-content">
                  <h2>AccuFrame&reg; Energy Seal</h2>
                  <p class="mb-0">AccuFrame&reg; Energy Seal is a new economical innovation designed to help provide a solution to the increased energy efficiency demands required in new home construction.</p>
                </span>
              </span>
              <img class="img-fluid" src="img/portfolio-1.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Pricing -->
    <section class="content-section bg-primary text-white text-center" id="pricing">
      <div class="container">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">Pricing</h3>
          <h2 class="mb-5">Plans</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fab fa-html5"></i>
            </span>
            <h4>
              <strong>Basic</strong>
            </h4>
            <p class="text-faded mb-0">
              Our basic plan provides you with everything you need to have an internet presence. We'll build you a simple, static website that is responsive, simple, and beautiful. We'll be with you from start to finish whether it be buying a domain name, getting a hosting provider, deploying your site, or configuring your domain settings. We'll help you with it all! Any site or application modifications with the basic plan are between $35 or $55 dollars, depending on what needs to be done.
            </p>
            <h4>$100 to $190</h4>
          </div>

          <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fab fa-laravel"></i>
            </span>
            <h4>
              <strong>Professional</strong>
            </h4>
            <p class="text-faded mb-0">
              Our professional plan provides you with a beautiful and responsive website with complex features that can be configured to your every need. We can build full web applications for you using the Laravel PHP framework. We'll work with you to get a domain, set up a DigitalOcean VPS to host your application, and we'll configure your domain settings too. Any site or application modifications with the professional plan are between $25 or $45 dollars, depending on what needs to be done.
            </p>
            <h4>$300 to $450</h4>
          </div>

          <div class="col-lg-4 col-md-4 mb-4 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fas fa-plus-circle"></i>
            </span>
            <h4>
              <strong>Professional Plus</strong>
            </h4>
            <p class="text-faded mb-0">
              Our professional plus plan provides you with all of the amazing benefits of the professional plan, with more! We'll work with you beyond the development cycle. We'll help you with basic search engine optimization, DNS management, and more. We'll stick around with you long after your site has been published, and we'll keep in contact with you to make sure you're happy with your service. Any site or application modifications with the professional plus plan are $15 dollars, no matter how big!
            </p>
            <h4>$400 to $500</h4>
          </div>
        </div>
      </div>
    </section>

    <!-- Callout -->
    <section class="callout" id="contact">
      <div class="container text-center">
        <h2 style="color:white;" class="mx-auto mb-5">What're you waiting for?</h2>

        <a class="btn btn-primary btn-xl" href="{{ route('register') }}">Register your Business Today!</a>
    </section>

    <!-- Login -->
    <section id="login" class="content-section bg-primary text-white">
      <div class="container text-center">
        <h2 class="mb-4">Existing Customer?</h2>
        <a href="{{ route('login') }}" class="btn btn-xl btn-dark">Login</a>
      </div>
    </section>

    @include('layouts.footer')
<script>
  window.fcWidget.init({
    token: "8370be82-968a-4b56-8db3-96d6e72b8415",
    host: "https://wchat.freshchat.com"
  });
</script>
  </body>
@endsection