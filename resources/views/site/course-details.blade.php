<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ app()->getLocale() == 'ar' ? (DB::table('settings')->first() ? DB::table('settings')->first()->site_name_ar : 'اكادمية بحباح') : (DB::table('settings')->first() ? DB::table('settings')->first()->site_name_fr : 'ACADEMIE BAHBAH') }}</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">bo
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
   <header class="main_menu single_page_menu" style="direction: ltr;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ asset('img/logo.png') }}" alt="logo" style="max-width: 300px;"> </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('/') }}">{{ __('app.home')}}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('/about') }}">{{ __('app.about')}}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link active" href="{{ url('/cources') }}">{{ __('app.courses')}}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('/blog') }}">{{ __('app.blog')}}</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ url('/contact') }}">{{ __('app.contact')}}</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{ __('app.language')}}
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('lang','fr') }}">Français</a>
                                  <a class="dropdown-item" href="{{ route('lang','ar') }}">العربية</a>
                              </div>
                          </li>
                          @guest
                              <li class="d-none d-lg-block">
                                  <a class="btn_1" href="{{ route('login') }}">{{ __('app.login')}}</a>
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
                            <h2>{{ app()->getLocale() == 'ar' ? $course->title_ar : $course->title_fr }}</h2>
                            <p>{{ __('app.home') }}<span>/</span>{{ __('app.course_details') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="{{ asset($course->image) }}" alt="" style="border: 1px solid #100445; border-radius: 10px;">
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title_top">{{ app()->getLocale() == 'ar' ? $course->title_ar : $course->title_fr }}</h4>
                        <div class="content">
                            {{ app()->getLocale() == 'ar' ? $course->description_ar : $course->description_fr }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 right-contents">
                    <div class="sidebar_top">
                        <ul>
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>{{ __('app.instructor') }}</p>
                                    <span class="color">{{ app()->getLocale() == 'ar' ? $course->professor_ar : $course->professor_fr }}</span>
                                </a>
                            </li>

                            @if(!auth()->check() || !DB::table('user_courses')->where('user_id', auth()->user()->id)->where('course_id', $course->id)->where('status', 'yes')->exists())
                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>{{ __('app.course_price') }}</p>
                                    <span>{{ $course->price }} {{ __('app.currency') }}</span>
                                </a>
                            </li>

                            <li>
                                <a class="justify-content-between d-flex" href="#">
                                    <p>{{ __('app.course_duration') }}</p>
                                    <span>{{ DB::table('videos')->where('course_id', $course->id)->where('status', 'active')->count() }} {{ __('app.videos') }}</span>
                                </a>
                            </li>
                        </ul>



                        <a href="{{ route('course.enroll', $course->id) }}" class="btn_1 d-block">{{ __('app.enroll_course') }}</a>

@endif
@if(auth()->check() && DB::table('user_courses')->where('user_id', auth()->user()->id)->where('course_id', $course->id)->where('status', 'no')->exists())
<a href="https://wa.me/{{ DB::table('settings')->first() ? DB::table('settings')->first()->site_whatsapp : '' }}" style="display: block; background-color: #25D366; color: white; padding: 12px 20px; text-align: center; border-radius: 3px; text-decoration: none; font-weight: 500; margin-top: 10px;" target="_blank">{{ __('app.contact_instructor') }}</a>
@endif


                        @if(session('error'))
                            <div class="alert alert-danger mt-3" >
                                {{ session('error') }}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course_details_area">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="course_content text-center">
                        <h4 class="title mb-4" style="color: #002347; font-weight: bold;">{{ __('app.course_content') }}</h4>

                        @if(DB::table('videos')->where('course_id', $course->id)->where('status', 'active')->count() > 0)

                            <div class="card mb-3" style="border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                <div class="card-header bg-light" style="border-bottom: 2px solid #f0f0f0;">

                                </div>

                                <div class="card-body" style="padding: 20px;">

                                        @foreach(DB::table('videos')->where('course_id', $course->id)->where('status', 'active')->get() as $video)
                                        <div class="video-item d-flex justify-content-between align-items-center mb-2" style="padding: 10px; border-bottom: 1px solid #eee;">
                                            <div>
                                                <i class="ti-control-play ml-2" style="color: #002347;"></i>
                                                <span style="color: #002347; font-weight: 500;">{{ app()->getLocale() == 'ar' ? $video->title_ar : $video->title_fr }}</span>
                                            </div>
                                            @if($video->status == 'active')
                                                @if(auth()->check() && DB::table('user_courses')->where('user_id', auth()->user()->id)->where('course_id', $course->id)->where('status', 'yes')->exists() || $video->order == 0)
                                                    <a href="#" class="btn btn-sm btn-success" style="background-color: #fdc632; border-color: #fdc632; color: #002347;" data-toggle="modal" data-target="#videoModal{{ $video->id }}">{{ __('app.watch') }}</a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="videoModal{{ $video->id }}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel{{ $video->id }}" aria-hidden="true" style="direction: ltr">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #002347; color: white;">
                                                                    <h5 class="modal-title" id="videoModalLabel{{ $video->id }}" style="color: white;">{{ app()->getLocale() == 'ar' ? $video->title_ar : $video->title_fr }}</h5>
                                                                     <button type="button" class="close" data-dismiss="modal" onclick="document.getElementById('videoPlayer{{ $video->id }}').pause();" aria-label="Close" style="color: white;">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="padding: 0;">
                                                                    <div class="embed-responsive embed-responsive-16by9">
                                                                        <video id="videoPlayer{{ $video->id }}"
                                                                               class="embed-responsive-item"
                                                                               controlsList="nodownload noplaybackrate"
                                                                               disablePictureInPicture
                                                                               oncontextmenu="return false;"
                                                                               controls>
                                                                            <source src="{{ asset($video->video_url) }}" type="video/mp4">
                                                                            {{ __('app.browser_not_support') }}
                                                                        </video>
                                                                    </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                @else
                                                    <button class="btn btn-sm btn-secondary" style="background-color: #6c757d; border: none;" disabled>{{ __('app.locked') }}</button>
                                                @endif
                                               @else
                                                <button class="btn btn-sm btn-secondary" style="background-color: #6c757d; border: none;" disabled>{{ __('app.locked') }}</button>
                                            @endif
                                           </div>
                                        @endforeach

                                </div>
                            </div>

                        @else
                            <p style="color: #6c757d; font-style: italic;">{{ __('app.no_content') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

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
    <script src="{{ asset('js/jquery-1.12.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/masonry.pkgd.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
    function stopVideo(videoId) {
        document.getElementById(videoId).pause();
        document.getElementById(videoId).currentTime = 0;
    }
    </script>
</body>

</html>
