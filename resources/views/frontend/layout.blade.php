<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <!-- font awesome 5 free -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- Poppins font from Google -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  {!! Html::style('public/fontend/app.css') !!}
  @yield('style')

  <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    
  <!--Hero ====================================== -->
  <header class="hero container-fluid border-bottom">
    <div class="alert alert-primary" role="alert">
      <marquee behavior="" direction="">{{ settingValue('fontend_msg') }}</marquee>   
    </div>
    <nav class="hero-nav container px-4 px-lg-0 mx-auto">
      <ul class="nav w-100 list-unstyled align-items-center p-0">
        <li class="hero-nav__item">
          <img class="hero-nav__logo" src="{{ url('/')}}/public/fontend/imgs/logo.jpg">
        </li>
        <li id="hero-menu" class="flex-grow-1 hero__nav-list hero__nav-list--mobile-menu ft-menu">
          <ul class="hero__menu-content nav flex-column flex-lg-row ft-menu__slider animated list-unstyled p-2 p-lg-0">
            <li class="flex-grow-1">
              <ul class="nav nav--lg-side list-unstyled align-items-center p-0">
                <li class="hero-nav__item">
                  <a href="#contact-us" class="hero-nav__link">Contact Us</a>
                </li>
                <li class="hero-nav__item">
                  <a href="#faq" class="hero-nav__link">FAQ</a>
                </li>
                <li class="hero-nav__item">
                  <a href="#pricing" class="hero-nav__link">Pricing</a>
                </li>
                <li class="hero-nav__item">
                  <a href="#testimonials" class="hero-nav__link">Testimonials</a>
                </li>
                <li class="hero-nav__item">
                  <a href="#features" class="hero-nav__link">Features</a>
                </li>
                @if (Auth::check())
                    <li class="hero-nav__item">
	                  <a href="{{ url('/home') }}" class="hero-nav__link">Dashboard</a>
	                </li>
                @else
	                {{-- <li class="hero-nav__item">
	                  <a href="{{ url('/register') }}" class="hero-nav__link">Register</a>
	                </li> --}}
	                <li class="hero-nav__item">
	                  <a href="{{ url('/login') }}" class="hero-nav__link">Login</a>
	                </li>
                @endif
                <li class="hero-nav__item">
                  <a href="#product" class="hero-nav__link">Product</a>
                </li>
              </ul>
            </li>
          </ul>
          <button onclick="document.querySelector('#hero-menu').classList.toggle('ft-menu--js-show')"
            class="ft-menu__close-btn animated">
            <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z"
                clip-rule="evenodd" />
              <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z"
                clip-rule="evenodd" />
            </svg>
          </button>
        </li>
        <li class="d-lg-none flex-grow-1 d-flex flex-row-reverse hero-nav__item">
          <button onclick="document.querySelector('#hero-menu').classList.toggle('ft-menu--js-show')"
            class="text-center px-2">
            <i class="fas fa-bars"></i>
          </button>
        </li>
      </ul>
    </nav>
    <div class="hero__content container mx-auto">
      <div class="row px-0 mx-0 align-items-center">
        <div class="col-lg-6 px-0">
          <h1 class="hero__title mb-3">
            OUR PRODUCT IS <span class="highlight">BETTER</span> THAN OTHER
          </h1>
          <p class="hero__paragraph mb-5">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's
            standard
          </p>
          <div class="hero__btns-container">
            <a class="hero__btn btn btn-primary mb-2 mb-lg-0" href="#">
              Get Free App
            </a>
            <a class="hero__btn btn btn-secondary mx-lg-3" href="#">
              Go Premium
            </a>
          </div>
        </div>
        <div class="col-lg-5 mt-5 mt-lg-0 mx-0">
          <div class="hero__img-container">
            <img src="{{ url('/')}}/public/fontend/imgs/img-1.png" class="hero__img w-100">
          </div>
        </div>
      </div>
    </div>
  </header>
@yield('content')
  <!-- =================================== -->

  <div class="block-44 py-5">
    <div class="container">
      <div class="row px-0 mx-0 justify-content-center align-items-center">
        <div class="block-44__logo-container">
          <img class="block-44__logo" src="{{ url('/')}}/public/fontend/imgs/logo.svg">
        </div>
        <ul class="block-44__list list-unstyled justify-content-center mb-0">
          <li class="block-44__li-1">
            <a href="#" class="block-44__link">Affiliate</a>
          </li>
          <li class="block-44__li-1">
            <a href="#" class="block-44__link">Entreprise</a>
          </li>
          <li class="block-44__li-1">
            <a href="#" class="block-44__link">Products</a>
          </li>
          <li class="block-44__li-1">
            <a href="#" class="block-44__link">Account</a>
          </li>
        </ul>
      </div>
    </div>
    <hr class="block-44__divider">
    <div class="container">
      <div class="row flex-column flex-md-row px-2 justify-content-center">
        <div class="flex-grow-1">
          <ul class="block-44__extra-links d-flex list-unstyled p-0">
            <li class="mx-2">
              <a href="#" class="block-44__link m-0">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="mx-2">
              <a href="#" class="block-44__link m-0">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li class="mx-2">
              <a href="#" class="block-44__link m-0">
                <i class="fas fa-envelope"></i>
              </a>
            </li>
          </ul>
        </div>
        <p class="block-41__copyrights">&copy; 2020 {{ config('app.name', 'Laravel') }}. All Rights Reserved.</p>
      </div>
    </div>
  </div>

  <!-- =================================== -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
@yield('script')

    {!! Html::script('public/fontend/app.js') !!}
</body>

</html>
