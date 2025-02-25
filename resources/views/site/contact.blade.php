<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ app()->getLocale() == 'ar' ? (DB::table('settings')->first() ? DB::table('settings')->first()->site_name_ar : 'اكادمية بحباح') : (DB::table('settings')->first() ? DB::table('settings')->first()->site_name_fr : 'ACADEMIE BAHBAH') }}</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .nav-link.active {
            color: #FFD700 !important;
        }
        @if(app()->getLocale() == 'ar')
        body {
            direction: rtl;
            text-align: right;
        }
        @endif



    </style>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu single_page_menu"  style="direction: ltr;">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-12">
                  <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ asset('/') }}"> <img src="img/logo.png" alt="logo"style="max-width: 300px;"> </a>

                      <button class="navbar-toggler" type="button" data-toggle="collapse"
                          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                          aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>

                      <div class="collapse navbar-collapse main-menu-item justify-content-end"
                          id="navbarSupportedContent">
                          <ul class="navbar-nav align-items-center">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ asset('/') }}">{{ __('app.home')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ asset('/about') }}">{{ __('app.about')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ asset('/cources') }}">{{ __('app.courses')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ asset('/blog') }}">{{ __('app.blog')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ asset('/contact') }}">{{ __('app.contact')}}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('app.language')}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('lang','fr') }}" >Français</a>
                                    <a class="dropdown-item" href="{{ route('lang','ar') }}" >العربية</a>
                                </div>
                            </li>
                            @guest
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="{{ route('login') }}" style="display: inline-block; padding: 10px 20px; font-size: 14px;">{{ __('app.login')}}</a>
                                </li>
                                @else
                                @if(Auth::user()->role != 'admin')
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('my_profile') }}">{{ __('app.my_account')}}</a>
                                        <a class="dropdown-item" href="{{ route('my_courses') }}">{{ __('app.my_courses')}}</a>
                                        <a class="dropdown-item" href="{{ route('my_requests') }}">{{ __('app.my_requests')}}</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                            {{ __('app.logout')}}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endif
                                @endguest

                        </ul>
                      </div>
                  </nav>
              </div>
          </div>
      </div>
  </header>
    <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>{{ __('app.contact_us') }}</h2>
                            <p>{{ __('app.home') }}<span>/<span>{{ __('app.contact_us') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



  <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;">

        <iframe src="{{ DB::table('settings')->first()?->localisation ?? 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26689.73293074077!2d-7.589643927956634!3d33.26082091986209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sma!4v1732401453872!5m2!1sfr!2sma' }}" width="100%" height="450" style="border:2px solid #ddd; border-radius:8px; box-shadow:0 2px 4px rgba(0,0,0,0.1); margin-top:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div></div>

      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">{{ __('app.get_in_touch') }}</h2>
        </div>

        <div class="col-lg-8">
            @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
            @endif
          @if(Auth::check())
          <form class="form-contact contact_form" action="{{ route('send.message') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100 @error('message') is-invalid @enderror" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('app.enter_message') }}'" placeholder = '{{ __('app.enter_message') }}'>{{ old('message') }}</textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text" value="{{ Auth::user()->name }}" readonly>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" value="{{ Auth::user()->email }}" readonly>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __('app.enter_subject') }}'" placeholder = '{{ __('app.enter_subject') }}' value="{{ old('subject') }}">
                  @error('subject')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="submit" class="button button-contactForm btn_1" value="{{ __('app.send_message') }}">
            </div>
          </form>
          @else
          <div class="alert alert-info">
            {{ __('app.please') }} <a href="{{ route('login') }}">{{ __('app.login') }}</a> {{ __('app.to_send_message') }}
          </div>
          @endif
        </div>

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3 class="mr-4 ml-4">{{ __('app.address_text') }}</h3>
              <p>{{ app()->getLocale() == 'ar' ? (DB::table('settings')->first()->site_address_ar ?? __('app.address_line2')) : (DB::table('settings')->first()->site_address_fr ?? __('app.address_line2')) }}</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>{{ __('app.phone_number') }}</h3>
              <p>{{ DB::table('settings')->first()?->site_phone ?? '' }} /{{ DB::table('settings')->first()?->site_phone2 ?? '' }}</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>{{ __('app.support_email') }}</h3>
              <p>{{ DB::table('settings')->first()?->site_email ?? 'info@bahbahacademy.com' }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

  <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer_1">
                        <a href="index.html"> <img src="img/logo.png" alt=""> </a>
                        <p>{{ app()->getLocale() == 'ar' ? (DB::table('settings')->first()->site_description_ar ?? __('app.t1s')) : (DB::table('settings')->first()->site_description_fr ?? __('app.t1s')) }}</p>

                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>{{ __('app.newsletter') }}</h4>
                        <p>{{ __('app.newsletter_desc') }}</p>
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='{{ __('app.enter_email') }}'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = '{{ __('app.enter_email') }}'"
                                        id="newsletter-email">
                                    <div class="input-group-append">
                                        <button class="btn btn_1" type="button" onclick="subscribeNewsletter()">
                                            <i class="ti-angle-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <div class="social_icon">
                            <a href="{{ DB::table('settings')->first()?->facebook ?? '#' }}"> <i class="ti-facebook"></i> </a>
                            <a href="{{ DB::table('settings')->first()?->twitter ?? '#' }}"> <i class="ti-twitter-alt"></i> </a>
                            <a href="{{ DB::table('settings')->first()?->instagram ?? '#' }}"> <i class="ti-instagram"></i> </a>
                            <a href="{{ DB::table('settings')->first()?->linkedin ?? '#' }}"> <i class="ti-linkedin"></i> </a>
                            <a href="{{ DB::table('settings')->first()?->youtube ?? '#' }}"> <i class="ti-youtube"></i> </a>
                            <a href="{{ DB::table('settings')->first()?->tiktok ?? '#' }}"> <i class="ti-video-camera"></i> </a>
                            <a href="{{ DB::table('settings')->first()?->telegram ?? '#' }}"> <i class="ti-location-arrow"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>{{ __('app.contact') }}</h4>
                        <div class="contact_info">
                            <table style="direction: {{ session()->get('dir') }}; text-align: {{ session()->get('dir') == 'rtl' ? 'right' : 'left' }};">
                                <tr>
                                    <td><span style="font-weight: bold; color: #ff9100;">{{ __('app.address_text') }}:</span></td>
                                    <td>{{ app()->getLocale() == 'ar' ? (DB::table('settings')->first()->site_address_ar ?? __('app.address')) : (DB::table('settings')->first()->site_address_fr ?? __('app.address')) }}</td>
                                </tr>
                                <tr>
                                    <td><span style="font-weight: bold; color: #ff9100;">{{ __('app.phone') }}:</span></td>
                                    <td>{{ DB::table('settings')->first()?->site_phone ?? '' }} /{{ DB::table('settings')->first()?->site_phone2 ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><span style="font-weight: bold; color: #ff9100;">{{ __('app.email') }}:</span></td>
                                    <td>{{ DB::table('settings')->first()?->site_email ?? 'info@bahbahacademy.com' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0">{{ __('app.footer_text') }}<script>document.write(new Date().getFullYear());</script> | {{ __('app.academy') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

<!-- jquery plugins here-->
<!-- jquery -->
<script src="js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="js/swiper.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<!-- swiper js -->
<script src="js/masonry.pkgd.js"></script>
<!-- particles js -->
<script src="js/owl.carousel.min.js"></script>
<!-- contact js -->
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/contact.js"></script>

<!-- slick js -->
<script src="js/slick.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
</body>

</html>
