
@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الدورات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ محتوى الدورة</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

				<!-- row -->
				<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header pb-0">
							<div class="d-flex justify-content-between">
								<h4 class="card-title mg-b-0">إضافة محتوى الدورة</h4>
							</div>
						</div>
						<div class="card-body">
							<form action="{{ route('add.course.topc') }}" method="POST" enctype="multipart/form-data">
								@csrf

								<div class="form-group">
									<label for="course_id">اختر الدورة</label>
									<select class="form-control @error('course_id') is-invalid @enderror" name="course_id" required>
										<option value="">-- اختر الدورة --</option>
										@foreach(DB::table('courses')->get() as $course)
											<option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->title_ar }} / {{ $course->title_fr }}</option>
										@endforeach
									</select>
									@error('course_id')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="title_ar">عنوان المحور بالعربية</label>
									<input type="text" class="form-control @error('title_ar') is-invalid @enderror" name="title_ar" value="{{ old('title_ar') }}" required>
									@error('title_ar')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="title_fr">عنوان المحور بالفرنسية</label>
									<input type="text" class="form-control @error('title_fr') is-invalid @enderror" name="title_fr" value="{{ old('title_fr') }}" required>
									@error('title_fr')
										<div class="invalid-feedback">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
									<label for="order">ترتيب المحور</label>
									<input type="number" class="form-control @error('order') is-invalid @enderror" name="order" min="1" value="{{ old('order') }}"  >
								</div>

								<button type="submit" class="btn btn-primary">حفظ المحور</button>
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
