<!doctype html>
<html lang="{{ app()->getLocale() }} {{ session()->get('dir') }}">

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
            color: #FFD700 !important; /* اللون الأصفر الذهبي */
        }
    </style>
    @if(session()->has('dir'))
    <style>
        body {
            direction: {{ session()->get('dir') }};
        }
    </style>
    @endif
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu" style="direction: ltr ;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ asset('/') }}"> <img src="img/logo.png" alt="logo"style="max-width: 300px;" > </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link " href="{{ asset('/') }}">{{ __('app.home')}}</a>
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
                                    <a class="nav-link" href="{{ asset('/contact') }}">{{ __('app.contact')}}</a>
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

                                {{-- @guest
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="{{ route('login') }}">Login</a>
                                </li>
                                @endguest --}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part" style="direction: ltr; margin-left: 50px; background-color: red; @media (max-width: 1000px) { display: none; }">
        <div class="container">
            <div class="carousel slide" data-ride="carousel" id="carouselExampleControls">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-xl-5">
                                <div class="banner_text">
                                    <div class="banner_text_iner" style="margin-top: 10px;">
                                        <h1 style="text-align: center;">{{ __('app.train_at_your_pace') }}</h1>
                                        <p style="text-align: center;font-size: 22px;">{{ __('app.flexibility') }}</p>
                                        <div style="text-align: center;">
                                            <a href="{{ route('courses') }}" class="btn_1">{{ __('app.view_course') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="banner_img">
                                    <img src="{{ asset('img/banner_img.jpeg') }}" alt="Banner Image" class="d-block " style="margin-top: 0px; @media (max-width: 1000px) { display: none; }">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ __('app.train_at_your_pace') }}</h5>
                            <p>{{ __('app.flexibility') }}</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-xl-5">
                                <div class="banner_text">
                                    <div class="banner_text_iner" style="margin-top: 10px;">
                                        <h1 style="text-align: center;">{{ __('app.explore_new_skills') }}</h1>
                                        <p style="text-align: center;font-size: 22px;">{{ __('app.discover_your_potential') }}</p>
                                        <div style="text-align: center;">
                                            <a href="{{ route('courses') }}" class="btn_1">{{ __('app.explore_now') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="banner_img">
                                    <img src="{{ asset('img/banner_img.jpeg') }}" alt="Banner Image" class="d-block " style="margin-top: 0px; @media (max-width: 1000px) { display: none; }">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ __('app.explore_new_skills') }}</h5>
                            <p>{{ __('app.discover_your_potential') }}</p>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                </ol>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!-- banner part start-->

   <!-- feature_part start-->
   <section class="feature_part single_feature_padding" style="margin-top: 0px; padding-top: 0px;">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-xl-4" >
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-layers"></i></span>
                        <h3>{{ __('app.vision') }}</h3>
                        <ul>
                            <li>{{ __('app.t2') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon"><i class="ti-new-window"></i></span>
                        <h3>{{ __('app.mission') }}</h3>
                        <ul>
                            <li>{{ __('app.t3') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="single_feature">
                    <div class="single_feature_part single_feature_part_2">
                        <span class="single_service_icon style_icon"><i class="ti-light-bulb"></i></span>
                        <h>{{ __('app.values') }}</h3>
                            <ul>
                            <li style="font-size: 20px;">{{ __('app.quality') }}</li>
                            {{-- <li>{{ __('app.innovation') }}</li> --}}
                            <li style="font-size: 20px;">{{ __('app.transparency') }}</li>
                            <li style="font-size: 20px;">{{ __('app.passion') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- upcoming_event part start-->

     {{-- <!-- learning part start-->
     <section class="learning_part" style="direction: ltr;">
        <div class="container">
            <div class="row align-items-sm-center align-items-lg-stretch">
                <div class="col-md-7 col-lg-7">
                    <div class="learning_img">
                        <img src="img/learning_img.png" alt="">
                    </div>
                </div>
                <div class="col-md-5 col-lg-5" >
                    <div class="learning_member_text">
                        <h5 class="text-center">{{ __('app.why_us') }}</h5>
                        <h2 class="text-center">{{ __('app.why_us') }}
                        </h2>
                        <p style="font-size: 22px; text-align: center;">{{ __('app.why_us_text') }}</p>
                        <table style="direction: {{ session()->get('dir') }}; text-align: {{ session()->get('dir') == 'ltr' ? 'left' : 'right' }};">
                            <tr style="direction: {{ session()->get('dir') }}; border-top: 1px solid #ddd; border-bottom: 1px solid #ccc; padding-top: 10px;">
                                <td><span class="ti-crown" style="color: #ffd700; font-size: 20px; margin: 0 10px 0 0;"></span></td>
                                <td><a style="font-size: 18px;">{{ __('app.why_us_points.trainers') }}</a></td>
                            </tr>
                            <tr style="direction: {{ session()->get('dir') }}; border-top: 1px solid #ddd; border-bottom: 1px solid #ccc; padding-top: 10px;">
                                <td><span class="ti-book" style="color: #ffd700; font-size: 20px; margin-right: 10px;"></span></td>
                                <td><strong style="font-size: 18px;">{{ __('app.why_us_points.courses') }}</strong></td>
                            </tr>
                            <tr style="direction: {{ session()->get('dir') }}; border-top: 1px solid #ddd; border-bottom: 1px solid #ccc; padding-top: 10px;">
                                <td><span class="ti-time" style="color: #ffd700; font-size: 20px; margin-right: 10px;"></span></td>
                                <td><strong style="font-size: 18px;">{{ __('app.why_us_points.flexibility') }}</strong></td>
                            </tr>
                            <tr style="direction: {{ session()->get('dir') }}; border-top: 1px solid #ddd; border-bottom: 1px solid #ccc; padding-top: 10px;">
                                <td><span class="ti-medall" style="color: #ffd700; font-size: 20px; margin-right: 10px;"></span></td>
                                <td><strong style="font-size: 18px;">{{ __('app.why_us_points.certificates') }}</strong></td>
                            </tr>
                            <tr style="direction: {{ session()->get('dir') }}; border-top: 1px solid #ddd; border-bottom: 1px solid #ccc; padding-top: 10px;">
                                <td><span class="ti-headphone-alt" style="color: #ffd700; font-size: 20px; margin-right: 10px;"></span></td>
                                <td><strong style="font-size: 18px;">{{ __('app.why_us_points.support') }}</strong></td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end--> --}}



    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        {{-- <p>popular courses</p> --}}
                        <h2 style="font-size: 60px;">{{ __('app.popular_courses') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="direction: {{ session()->get('dir') }};">

                @foreach(DB::table('courses')->where('status', 'active')->inRandomOrder()->take(6)->get() as $course)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource" style="direction: {{ session()->get('dir') }};text-align: {{ session()->get('dir') == 'ltr' ? 'left' : 'right' }};">
                        <img src="{{ asset($course->image) }}" class="special_img" alt=""   style="display: block; margin: 0 auto; border-radius: 10px; border: 1px solid #0f0153;" >
                        <div class="special_cource_text">
                            <table style="width: 100%; direction: {{ session()->get('dir') }};">
                                <tr>
                                    <td colspan="2">
                                        <a href="{{ route('course.details', $course->id) }}" class="btn_4" style="font-size: 20px;">{{ __('app.join_course') }}</a>
                                    </td>

                                    <td colspan="2">
                                        <h4>{{ $course->price }} {{ __('app.dhs') }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="{{ route('course.details', $course->id) }}" style="text-align: {{ session()->get('dir') == 'ltr' ? 'right' : 'left' }}; display: block; direction: {{ session()->get('dir') == 'ltr' ? 'rtl' : 'ltr' }};">
                                            <h3 style="text-align: {{ session()->get('dir') == 'ltr' ? 'left' : 'right' }};">{{ app()->getLocale() == 'ar' ? $course->title_ar : $course->title_fr }}</h3>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>{{ Str::limit(app()->getLocale() == 'ar' ? $course->description_ar : $course->description_fr, 100) }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="author_info">
                                            <div class="author_img">
                                                <div class="author_info_text">
                                                    <p><strong>{{ __('app.instructor') }}: {{ app()->getLocale() == 'ar' ? $course->professor_ar : $course->professor_fr }}</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            <div class="text-center mt-5">
                <a href="{{ route('courses') }}" class="btn_1">{{ __('app.view_more') }}</a>
            </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
     <!-- member_counter counter start -->
     <section class="member_counter" style="margin-top: 10px; padding-top: 10px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">51</span>
                        <h4>{{ __('app.all_trainers') }}</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">1780</span>
                        <h4>{{ __('app.all_students') }}</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">1020</span>
                        <h4>{{ __('app.online_students') }}</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_member_counter">
                        <span class="counter">760</span>
                        <h4>{{ __('app.classroom_students') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- member_counter counter end -->





    {{-- <!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>Our Blog</p>
                        <h2>Students Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="img/blog/blog_1.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#" class="btn_4">Design</a>
                                <a href="blog.html">
                                    <h5 class="card-title">Dry beginning sea over tree</h5>
                                </a>
                                <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                                <ul>
                                    <li> <span class="ti-comments"></span>2 Comments</li>
                                    <li> <span class="ti-heart"></span>2k Like</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="img/blog/blog_2.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#" class="btn_4">Developing</a>
                                <a href="blog.html">
                                    <h5 class="card-title">All beginning air two likeness</h5>
                                </a>
                                <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                                <ul>
                                    <li> <span class="ti-comments"></span>2 Comments</li>
                                    <li> <span class="ti-heart"></span>2k Like</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="img/blog/blog_3.png" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#" class="btn_4">Design</a>
                                <a href="blog.html">
                                    <h5 class="card-title">Form day seasons sea hand</h5>
                                </a>
                                <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                                <ul>
                                    <li> <span class="ti-comments"></span>2 Comments</li>
                                    <li> <span class="ti-heart"></span>2k Like</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::--> --}}

    <!-- footer part start-->
    <footer class="footer-area" style="text-align: {{ session()->get('dir') == 'ltr' ? 'left' : 'right' }};">
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
                            @if(DB::table('settings')->first()?->facebook)
                                <a href="{{ DB::table('settings')->first()->facebook }}"> <i class="ti-facebook"></i> </a>
                            @endif
                            @if(DB::table('settings')->first()?->twitter)
                                <a href="{{ DB::table('settings')->first()->twitter }}"> <i class="ti-twitter-alt"></i> </a>
                            @endif
                            @if(DB::table('settings')->first()?->instagram)
                                <a href="{{ DB::table('settings')->first()->instagram }}"> <i class="ti-instagram"></i> </a>
                            @endif
                            @if(DB::table('settings')->first()?->linkedin)
                                <a href="{{ DB::table('settings')->first()->linkedin }}"> <i class="ti-linkedin"></i> </a>
                            @endif
                            @if(DB::table('settings')->first()?->youtube)
                                <a href="{{ DB::table('settings')->first()->youtube }}"> <i class="ti-youtube"></i> </a>
                            @endif
                            @if(DB::table('settings')->first()?->tiktok)
                                <a href="{{ DB::table('settings')->first()->tiktok }}"> <i class="ti-video-camera"></i> </a>
                            @endif
                            @if(DB::table('settings')->first()?->telegram)
                                <a href="{{ DB::table('settings')->first()->telegram }}"> <i class="ti-location-arrow"></i> </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4" style="direction: {{ session()->get('dir') }}; text-align: center;">
                    <div class="single-footer-widget footer_2">
                        <h4>{{ __('app.contact') }}</h4>
                        <div class="contact_info" style="direction: {{ session()->get('dir') }}; text-align: {{ session()->get('dir') == 'rtl' ? 'right' : 'left' }};">


                            <table style="direction: {{ session()->get('dir') }}; text-align: {{ session()->get('dir') == 'rtl' ? 'right' : 'left' }};">
                                <tr>
                                    <td><span style="font-weight: bold; color: #ff9100;">{{ __('app.address_text') }}:</span></td> </tr>
                                </tr>   <td>{{ app()->getLocale() == 'ar' ? (DB::table('settings')->first()->site_address_ar ?? __('app.address')) : (DB::table('settings')->first()->site_address_fr ?? __('app.address')) }}</td>
                                </tr>
                                <tr style="text-align: {{ session()->get('dir') == 'rtl' ? 'right' : 'left' }};">
                                    <td><span style="font-weight: bold; color: #ff9100;">{{ __('app.phone') }}:</span></td></tr>
                                    <tr>
                                    <td>{{ DB::table('settings')->first()?->site_phone ?? '' }}
                                          {{ DB::table('settings')->first()?->site_phone2 ? '/' : '' }}
                                             {{ DB::table('settings')->first()?->site_phone2 ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><span style="font-weight: bold; color: #ff9100;">{{ __('app.email') }}:</span></td></tr>
                                    <tr>
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
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script>
        function subscribeNewsletter() {
            var email = document.getElementById('newsletter-email').value;
            if (!email) {
                alert("{{ __('app.enter_email') }}");
                return;
            }
            // TODO: Add API call to subscribe email
            alert("{{ __('app.newsletter_thanks') }}");
            document.getElementById('newsletter-email').value = '';
        }
        </script>
</body>

</html>
