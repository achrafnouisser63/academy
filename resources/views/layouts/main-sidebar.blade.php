<!-- main-sidebar -->
    @if(Auth::user()->role == 'admin')
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo" style="width: 100%; height: auto;"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
							<span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">
                        الرئيسية
                    </li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/admin/dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">الصفحة الرئيسية</span></a>
					</li>
					<li class="side-item side-item-category">الزوار</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span class="side-menu__label">الزوار</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
                            <li><a class="slide-item" href="{{ url('/users') }}">الزوار</a></li>
							<li><a class="slide-item" href="{{ url('/pending-purchase-orders') }}">طلبات الشراء المعلقة</a><span class="badge badge-warning side-badge">{{ DB::table('user_courses')->where('status', 'no')->count() }}</span></li>
							<li><a class="slide-item" href="{{ url('/completed-purchase-orders') }}">طلبات الشراء المكتملة</a></li>
							<li><a class="slide-item" href="{{ url('/rejected-purchase-orders') }}">طلبات الشراء المرفوضة</a>
                                <span class="badge badge-danger side-badge">{{ DB::table('user_courses')->where('status', 'rejected')->count() }}</span>
                            </li>
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" opacity=".3"/><path d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg><span class="side-menu__label">الدورات</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('/all-course') }}">جميع الدورات</a></li>
							<li><a class="slide-item" href="{{ url('/active-courses') }}">الدورات النشطة</a></li>
							<li><a class="slide-item" href="{{ url('/all-courses-suspended') }}">الدورات المعلقة</a></li>
							<li><a class="slide-item" href="{{ url('/add-course') }}">اضافة دورة جديدة</a></li>
                            {{-- <li><a class="slide-item" href="{{ url('/add-topics') }}">اضافة محاور دورة </a></li> --}}
                            <li><a class="slide-item" href="{{ url('/course-v') }}">اضافة دروس دورة </a></li>
                            <li><a class="slide-item" href="{{ url('/course-edite') }}">تعديل دروس دورة </a></li>

							<li><a class="slide-item" href="{{ url('/course-categories') }}">تصنيفات الدورات</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='course-instructors') }}">المدربين</a></li>
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4C9.24 4 7 6.24 7 9c0 2.85 2.92 7.21 5 9.88 2.11-2.69 5-7 5-9.88 0-2.76-2.24-5-5-5zm0 7.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" opacity=".3"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg><span class="side-menu__label">الرسائل</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('/all-messages') }}">كل الرسائل</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</aside>
    @endif
