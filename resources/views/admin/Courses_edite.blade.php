@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الدرس</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل الدرس</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


				<!-- row -->
				<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="main-content-label mg-b-5">
								تعديل الدرس
							</div>
							<form action="{{ route('topics.update', $topic->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PATCH')
								<div class="row row-sm">
									<div class="col-6">
										<div class="form-group mg-b-0">
											<label class="form-label">عنوان الدرس بالعربية: </label>
											<input class="form-control @error('title_ar') is-invalid @enderror" name="title_ar" placeholder="عنوان الدرس بالعربية" type="text" value="{{ old('title_ar', $topic->title_ar) }}" required>
											@error('title_ar')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label class="form-label">عنوان الدرس بالفرنسية: </label>
											<input class="form-control @error('title_fr') is-invalid @enderror" name="title_fr" placeholder="عنوان الدرس بالفرنسية" type="text" value="{{ old('title_fr', $topic->title_fr) }}" required>
											@error('title_fr')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="col-6">
										<div class="form-group">
											<label class="form-label">مجاني: </label>
											<select class="form-control @error('is_free') is-invalid @enderror" name="order">
												<option value="0" {{ old('is_free', $topic->is_free) == 1 ? 'selected' : "0" }}>نعم</option>
												<option value="1" {{ old('is_free', $topic->is_free) == 0 ? 'selected' :" 1" }}>لا</option>
											</select>
											@error('is_free')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label class="form-label">الدرس: </label>
											<input class="form-control @error('videos') is-invalid @enderror" name="videos" type="file" multiple value="{{ old('videos') }}">
											@error('videos')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>

								</div>
								<div class="form-group mb-0 mt-3 justify-content-end">
									<div>
										<button type="submit" class="btn btn-primary">حفظ التعديلات</button>
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
