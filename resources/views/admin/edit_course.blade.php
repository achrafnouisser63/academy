@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الدورات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل دورة</span>
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
								تعديل الدورة
							</div>
							<p class="mg-b-20">قم بتعديل بيانات الدورة</p>
							@if(session('success'))
								<div class="alert alert-success">
									{{ session('success') }}
								</div>
							@endif
							<form action="{{ route('update.course', $course->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row row-sm">
									<div class="col-6">
										<div class="form-group mg-b-0">
											<label class="form-label">عنوان الدورة بالعربية: <span class="tx-danger">*</span></label>
											<input class="form-control" name="title_ar" value="{{ $course->title_ar }}" placeholder="عنوان الدورة بالعربية" required="" type="text">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group mg-b-0">
											<label class="form-label">عنوان الدورة بالفرنسية: <span class="tx-danger">*</span></label>
											<input class="form-control" name="title_fr" value="{{ $course->title_fr }}" placeholder="عنوان الدورة بالفرنسية" required="" type="text">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label class="form-label">المدرب بالعربية: <span class="tx-danger">*</span></label>
											<input class="form-control" name="instructor_ar" value="{{ $course->professor_ar }}" placeholder="اسم المدرب بالعربية" required="" type="text">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label class="form-label">المدرب بالفرنسية: <span class="tx-danger">*</span></label>
											<input class="form-control" name="instructor_fr" value="{{ $course->professor_fr }}" placeholder="اسم المدرب بالفرنسية" required="" type="text">
										</div>
									</div>
									<div class="col-6 mg-t-20">
										<div class="form-group mg-b-0">
											<label class="form-label">السعر: <span class="tx-danger">*</span></label>
											<input class="form-control" name="price" value="{{ $course->price }}" placeholder="سعر الدورة" required="" type="number">
										</div>
									</div>
									<div class="col-6 mg-t-20">
										<div class="form-group">
											<label class="form-label">المدة بالساعات: <span class="tx-danger">*</span></label>
											<input class="form-control" name="duration" value="{{ $course->heur }}" placeholder="مدة الدورة" required="" type="number">
										</div>
									</div>
									<div class="col-12 mg-t-20">
										<div class="form-group">
											<label class="form-label">وصف الدورة بالعربية: <span class="tx-danger">*</span></label>
											<textarea class="form-control" name="description_ar" placeholder="وصف الدورة بالعربية" rows="3" required="">{{ $course->description_ar }}</textarea>
										</div>
									</div>
									<div class="col-12 mg-t-20">
										<div class="form-group">
											<label class="form-label">وصف الدورة بالفرنسية: <span class="tx-danger">*</span></label>
											<textarea class="form-control" name="description_fr" placeholder="وصف الدورة بالفرنسية" rows="3" required="">{{ $course->description_fr }}</textarea>
										</div>
									</div>
									<div class="col-12 mg-t-20">
										<div class="form-group">
											<label class="form-label">صورة الدورة:</label>
											<input class="form-control" name="image" type="file">
											<img src="{{ asset($course->image) }}" class="mt-3" width="150">
										</div>
									</div>
									<div class="col-12 mg-t-20">
										<button class="btn btn-main-primary pd-x-20" type="submit">تحديث الدورة</button>
									</div>
								</div>
							</form>
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
