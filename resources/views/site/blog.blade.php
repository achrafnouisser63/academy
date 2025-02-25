<!doctype html>
<html lang="en">

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

        /* Center all content */
        body {
            text-align: center;
        }

        .container {
            margin: 0 auto;
        }

        .navbar-nav {
            margin: 0 auto;
        }

        .blog_item_img img {
            margin: 0 auto;
        }

        .blog_details {
            text-align: center;
        }

        .blog-info-link {
            justify-content: center;
        }

        .blog_right_sidebar {
            text-align: center;
        }

        .footer-area {
            text-align: center;
        }

        .social_icon {
            justify-content: center;
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
                              <a class="nav-link active" href="{{ asset('/blog') }}">{{ __('app.blog')}}</a>
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
<!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>{{ __('app.latest_educational_news')}}</h2>
                            <p>{{ __('app.home')}}<span>/</span>{{ __('app.blog')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img text-center">
                                <img class="card-img rounded-0 mx-auto" src="img/blog/programming_course.jpg" alt="">
                                <a href="#" class="blog_item_date" style="width: 90%; margin: 0 auto;">
                                    <h3>20</h3>
                                    <p>Mar</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2>{{ __('app.programming_course_launch') }}</h2>
                                </a>
                                <p>{{ __('app.programming_course_desc') }}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="far fa-user"></i> {{ __('app.programming_education') }}</a></li>

                                </ul>
                            </div>
                        </article>

                        <article class="blog_item">
                            <div class="blog_item_img text-center">
                                <img class="card-img rounded-0" src="img/blog/language_course.jpg" alt="">
                                <a href="#" class="blog_item_date" style="width: 90%;">
                                    <h3>18</h3>
                                    <p>Mar</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2>{{ __('app.intensive_english_course')}}</h2>
                                </a>
                                <p>{{ __('app.english_course_desc')}}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="far fa-user"></i>{{ __('app. Languages, Education ')}}</a></li>
                                </ul>
                            </div>
                        </article>

                        <article class="blog_item">
                            <div class="blog_item_img text-center">
                                <img class="card-img rounded-0" src="img/blog/business_course.jpg" alt="">
                                <a href="#" class="blog_item_date" style="width: 90%;">
                                    <h3>15</h3>
                                    <p>Mar</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2>{{ __('app.business_management_program') }}</h2>
                                </a>
                                <p>{{ __('app.business_program_desc') }}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="far fa-user"></i> {{ __('app.business_management') }}</a></li>

                                </ul>
                            </div>
                        </article>

                        <article class="blog_item">
                            <div class="blog_item_img text-center">
                                <img class="card-img rounded-0" src="img/blog/digital_marketing.jpg" alt="">
                                <a href="#" class="blog_item_date" style="width: 90%;">
                                    <h3>12</h3>
                                    <p>Mar</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2>{{ __('app.digital_marketing_masterclass') }}</h2>
                                </a>
                                <p>{{ __('app.digital_marketing_desc') }}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="far fa-user"></i> {{ __('app.marketing_digital') }}</a></li>

                                </ul>
                            </div>
                        </article>



                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                               <div class="form-group">
                                  <div class="input-group mb-3">
                                     <input type="text" class="form-control" placeholder='{{ __("app.search_courses") }}'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ __("app.search_courses") }}'">
                                     <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                     </div>
                                  </div>
                               </div>
                               <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">{{ __('app.search') }}</button>
                            </form>
                         </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">{{ __('app.course_tags') }}</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex justify-content-center">
                                        <p>{{ __('app.programming') }}</p>
                                        <p>(15)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-center">
                                        <p>{{ __('app.languages') }}</p>
                                        <p>(12)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-center">
                                        <p>{{ __('app.business') }}</p>
                                        <p>(8)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-center">
                                        <p>{{ __('app.marketing') }}</p>
                                        <p>(10)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-center">
                                        <p>{{ __('app.design') }}</p>
                                        <p>(7)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-center">
                                        <p>{{ __('app.technology') }}</p>
                                        <p>(5)</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">{{ __('app.popular_courses') }}</h3>
                            <div class="media post_item">
                                {{-- <img src="img/post/python_course.jpg" alt="post"> --}}
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{{ __('app.python_beginners') }}</h3>
                                    </a>
                                    <p>{{ __('app.starting_march') }}</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                {{-- <img src="img/post/english_course.jpg" alt="post"> --}}
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{{ __('app.business_english') }}</h3>
                                    </a>
                                    <p>{{ __('app.starting_april_1') }}</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                {{-- <img src="img/post/marketing_course.jpg" alt="post"> --}}
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{{ __('app.digital_marketing') }}</h3>
                                    </a>
                                    <p>{{ __('app.starting_april_5') }}</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                {{-- <img src="img/post/web_dev_course.jpg" alt="post"> --}}
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{{ __('app.web_development') }}</h3>
                                    </a>
                                    <p>{{ __('app.starting_april_10') }}</p>
                                </div>
                            </div>
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">{{ __('app.course_tags') }}</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">{{ __('app.programming') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('app.languages') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('app.technology') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('app.business') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('app.marketing') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('app.design') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('app.development') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('app.certification') }}</a>
                                </li>
                            </ul>
                        </aside>


                        {{-- <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">Student Gallery</h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/student_1.jpg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/student_2.jpg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/student_3.jpg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/student_4.jpg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/student_5.jpg" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/student_6.jpg" alt="">
                                    </a>
                                </li>
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!-- footer part start-->
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
    <!-- swiper js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>
