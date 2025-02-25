@extends('layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">لوحة تحكم الادمن</h2>
						  <p class="mg-b-0">مرحبا بك في لوحة التحكم.</p>
						</div>
					</div>
					<div class="main-dashboard-header-right">

					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">عدد شراء الدورات</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{ DB::table('user_courses')->where('status', 'yes')->count() }}</h4>
											<p class="mb-0 tx-12 text-white op-7">اجمالي عدد شراء الدورات</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-shopping-cart text-white"></i>
											<span class="text-white op-7">الدورات</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">عدد طلبات الغير مكتملة</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{ DB::table('user_courses')->where('status', 'no')->count() }}</h4>
											<p class="mb-0 tx-12 text-white op-7">اجمالي عدد الطلبات الغير مكتملة</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-shopping-cart text-white"></i>
											<span class="text-white op-7">الطلبات</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">عدد المستخدمين</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{ DB::table('users')->count() }}</h4>
											<p class="mb-0 tx-12 text-white op-7">إجمالي عدد المستخدمين</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-users text-white"></i>
											<span class="text-white op-7">المستخدمين</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">عدد الدورات</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{ DB::table('courses')->count() }}</h4>
											<p class="mb-0 tx-12 text-white op-7">إجمالي عدد الدورات</p>
										</div>
										<span class="float-right my-auto mr-auto">
											<i class="fas fa-graduation-cap text-white"></i>
											<span class="text-white op-7">الدورات</span>
										</span>
									</div>
								</div>
							</div>
							<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
				</div>
				<!-- row closed -->





				<!-- row opened -->
				<div class="row row-sm row-deck">
					<div class="col-md-12 col-lg-4 col-xl-4">
						<div class="card card-dashboard-eight pb-2">
							<h6 class="card-title">أكثر الدورات مبيعاً</h6><span class="d-block mg-b-10 text-muted tx-12">أداء مبيعات الدورات</span>
							<div class="list-group">
								@foreach(DB::table('user_courses')
									->where('status', 'yes')
									->select('course_id', DB::raw('count(*) as total'))
									->groupBy('course_id')
									->orderByDesc('total')
									->limit(6)
									->get() as $course)
									@php
										$courseDetails = DB::table('courses')->find($course->course_id);
										$courseName = $courseDetails ? $courseDetails->title_ar : 'غير متوفر';
									@endphp
									<div class="list-group-item {{ $loop->first ? 'border-top-0' : '' }} {{ $loop->last ? 'border-bottom-0 mb-0' : '' }}">
										<i class="fas fa-graduation-cap"></i>
										<p>{{ $courseName }}</p>
										<span>{{ $course->total }} مشترك</span>
									</div>
								@endforeach
							</div>
						</div>
					</div>



					<div class="col-md-12 col-lg-8 col-xl-8">
						<div class="card card-table-two">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mb-1">طلبات الشراء المعلقة</h4>
								<i class="mdi mdi-dots-horizontal text-gray"></i>
							</div>
							<span class="tx-12 tx-muted mb-3 ">قائمة طلبات الشراء المعلقة التي تحتاج إلى موافقة</span>
							<div class="table-responsive country-table">
								<table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
									<thead>
										<tr>
											<th class="wd-lg-25p">اسم الطالب</th>
											<th class="wd-lg-25p tx-right">اسم الدورة</th>
											<th class="wd-lg-25p tx-right">السعر</th>
											<th class="wd-lg-25p tx-right">تاريخ الطلب</th>
										</tr>
									</thead>
									<tbody>
                                        @if(DB::table('user_courses')->where('status', 'no')->count() > 0)
										@foreach(DB::table('user_courses')
											->where('user_courses.status', 'no')
											->join('users', 'user_courses.user_id', '=', 'users.id')
											->join('courses', 'user_courses.course_id', '=', 'courses.id')
											->select('users.name as user_name', 'courses.title_ar as course_title', 'courses.price', 'user_courses.created_at')
											->orderBy('user_courses.created_at', 'desc')
											->limit(5)
											->get() as $order)
										<tr>
											<td>{{ $order->user_name }}</td>
											<td class="tx-right tx-medium tx-inverse">{{ $order->course_title }}</td>
											<td class="tx-right tx-medium tx-inverse">{{ $order->price }} درهم</td>
											<td class="tx-right tx-medium tx-inverse">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
										</tr>
										@endforeach
                                        @endif
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
