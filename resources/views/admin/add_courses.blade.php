@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الدورات </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة دورة جديدة</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				@if(session('success'))
					<div class="alert alert-success" role="alert">
						{{ session('success') }}
					</div>
				@endif

				<!-- row -->
				<div class="row">

				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="main-content-label mg-b-5">
								إضافة دورة جديدة
							</div>
							<p class="mg-b-20">قم بإدخال معلومات الدورة</p>
							<form action="{{ route('add.course') }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="row row-sm">
									<div class="col-6">
										<div class="form-group mg-b-0">
											<label class="form-label">عنوان الدورة بالعربية: <span class="tx-danger">*</span></label>
											<input class="form-control" name="title_ar" placeholder="أدخل عنوان الدورة بالعربية" required="" type="text">
											@error('title_ar')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-6">
										<div class="form-group mg-b-0">
											<label class="form-label">عنوان الدورة بالفرنسية: <span class="tx-danger">*</span></label>
											<input class="form-control" name="title_fr" placeholder="Entrez le titre du cours en français" required="" type="text">
											@error('title_fr')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label class="form-label">المدرب بالعربية: <span class="tx-danger">*</span></label>
											<input class="form-control" name="instructor_ar" placeholder="أدخل اسم المدرب بالعربية" required="" type="text">
											@error('instructor_ar')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label class="form-label">المدرب بالفرنسية: <span class="tx-danger">*</span></label>
											<input class="form-control" name="instructor_fr" placeholder="Entrez le nom de l'instructeur en français" required="" type="text">
											@error('instructor_fr')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label class="form-label">السعر: <span class="tx-danger">*</span></label>
											<input class="form-control" name="price" placeholder="أدخل سعر الدورة" required="" type="number">
											@error('price')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label class="form-label">المدة: <span class="tx-danger">*</span></label>
											<input class="form-control" name="duration" placeholder="مدة الدورة بالساعات" required="" type="number">
											@error('duration')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label class="form-label">وصف الدورة بالعربية: <span class="tx-danger">*</span></label>
											<textarea class="form-control" name="description_ar" placeholder="أدخل وصف الدورة بالعربية" required="" rows="3"></textarea>
											@error('description_ar')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label class="form-label">وصف الدورة بالفرنسية: <span class="tx-danger">*</span></label>
											<textarea class="form-control" name="description_fr" placeholder="Entrez la description du cours en français" required="" rows="3"></textarea>
											@error('description_fr')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label class="form-label">صورة الدورة: <span class="tx-danger">*</span></label>
											<input type="file" name="image" class="form-control" required="">
											@error('image')
												<div class="text-danger">{{ $message }}</div>
											@enderror
										</div>

									</div>
									<div class="col-12">
										<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">إضافة الدورة</button>
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
