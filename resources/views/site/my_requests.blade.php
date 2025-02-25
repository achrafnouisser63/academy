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
        body {
            direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};
        }
    </style>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu single_page_menu" style="direction: ltr;">
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
                                  <a class="nav-link active" href="{{ asset('/cources') }}">{{ __('app.courses')}}</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ asset('/blog') }}">{{ __('app.blog')}}</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link " href="{{ asset('/contact') }}">{{ __('app.contact')}}</a>
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
                            <h2>{{ __('app.my_requests') }}</h2>
                            <p>{{ __('app.home') }}<span>/</span>{{ __('app.my_requests') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>{{ __('app.my_requests') }}</p>
                        <h2>{{ __('app.my_requests') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($user_courses->isEmpty())
                    <div class="col-12 text-center">
                        <h3>{{ __('app.no_courses') }}</h3>
                        <p>{{ __('app.explore_courses') }}</p>
                        <a href="{{ asset('/cources') }}" class="btn_1">{{ __('app.explore_courses') }}</a>
                    </div>
                @else
                    @foreach($user_courses as $request)
                    @if(DB::table('courses')->where('id', $request->course_id)->where('status', 'active')->first())

                            <div class="col-sm-6 col-lg-4 mb-4">
                                <div class="single_special_cource">
                                    <img src="{{ asset($request->course->image) }}" class="special_img" alt="">
                                    <div class="special_cource_text">
                                        <a href="{{ route('course.details', $request->course->id) }}" class="btn_4">{{ __('app.view_course') }}</a>
                                        <a href="{{ route('course.details', $request->course->id) }}">
                                            <h3>{{ app()->getLocale() == 'ar' ? $request->course->title_ar : $request->course->title_fr }}</h3>
                                        </a>
                                        <p>{{ __('app.status') }}:
                                            @if($request->status == 'no')
                                                <span class="text-warning">{{ __('app.pending') }}</span>
                                            @elseif($request->status == 'yes')
                                                <span class="text-success">{{ __('app.accepted') }}</span>
                                            @else
                                                <span class="text-danger">{{ __('app.rejected') }}</span>
                                            @endif
                                        </p>
                                        <p>{{ __('app.request_date') }}: {{ $request->created_at->format('Y-m-d') }}</p>
                                        <a href="https://wa.me/{{ DB::table('settings')->first() ? DB::table('settings')->first()->site_whatsapp : '+212633442078' }}" class="btn btn-success" target="_blank">
                                            <i class="fab fa-whatsapp"></i> {{ __('app.contact_instructor') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--::blog_part end::-->

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
    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/masonry.pkgd.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
