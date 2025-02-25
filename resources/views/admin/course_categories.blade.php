@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
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
								تصنيفات الدورات
							</div>
							<p class="mg-b-20">قائمة بجميع تصنيفات الدورات المتاحة</p>

							<div class="d-flex justify-content-end mb-3">
								<button class="btn btn-primary">إضافة تصنيف جديد</button>
							</div>

							<div class="table-responsive">
								<table class="table table-bordered mg-b-0 text-md-nowrap">
									<thead>
										<tr>
											<th>#</th>
											<th>اسم التصنيف</th>
											<th>الوصف</th>
											<th>عدد الدورات</th>
											<th>الحالة</th>
											<th>العمليات</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row">1</th>
											<td>برمجة</td>
											<td>دورات في مجال البرمجة وتطوير البرمجيات</td>
											<td>15</td>
											<td><span class="badge badge-success">نشط</span></td>
											<td>
												<div class="d-flex justify-content-center">
													<button class="btn btn-info mx-1"><i class="las la-pen"></i></button>
													<button class="btn btn-danger mx-1"><i class="las la-trash"></i></button>
												</div>
											</td>
										</tr>
										<tr>
											<th scope="row">2</th>
											<td>تصميم</td>
											<td>دورات في مجال التصميم الجرافيكي</td>
											<td>8</td>
											<td><span class="badge badge-success">نشط</span></td>
											<td>
												<div class="d-flex justify-content-center">
													<button class="btn btn-info mx-1"><i class="las la-pen"></i></button>
													<button class="btn btn-danger mx-1"><i class="las la-trash"></i></button>
												</div>
											</td>
										</tr>
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
