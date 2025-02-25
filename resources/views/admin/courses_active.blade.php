@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الدورات
                            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الدورات النشطة
                            </span>
						</div>
					</div>

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="main-content-label mg-b-5">
								الدورات النشطة
							</div>
							<p class="mg-b-20">قائمة بجميع الدورات النشطة حالياً</p>

							<div class="table-responsive">
								<table class="table table-bordered mg-b-0 text-md-nowrap">
									<thead>
										<tr>
											<th>#</th>
											<th>عنوان الدورة</th>
											<th>المدرب</th>
											<th>السعر</th>
											<th>المدة</th>
											<th> الوصف</th>

											<th>الحالة</th>
											<th>العمليات</th>
										</tr>
									</thead>
									<tbody>
										@foreach(DB::table('courses')->where('status', 'active')->get() as $course)

										<tr>
											<th scope="row">{{ $loop->iteration }}</th>
											<td>{{ $course->title_ar }}</td>
											<td>{{ $course->professor_ar }}</td>
											<td>{{ $course->price }}</td>
											<td>{{ $course->heur }} ساعة</td>

											<td>{{ $course->description_ar }}</td>
											<td><span class="badge badge-success">نشط</span></td>
											<td>
												<div class="d-flex justify-content-center">
													<a href="{{ route('suspend.course', $course->id) }}" class="btn btn-warning mx-1" onclick="return confirm('هل أنت متأكد من تعليق هذه الدورة؟')"><i class="las la-pause"></i></a>
													<a href="{{ route('edit.course', $course->id) }}" class="btn btn-info mx-1"><i class="las la-pen"></i></a>
													<a href="{{ route('delete.course', $course->id) }}" class="btn btn-danger mx-1" onclick="return confirm('هل أنت متأكد من حذف هذه الدورة؟')"><i class="las la-trash"></i></a>
												</div>
											</td>
										</tr>

										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
