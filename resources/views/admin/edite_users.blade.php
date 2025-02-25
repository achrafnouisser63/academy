@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل مستخدم</span>
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
									تعديل بيانات المستخدم
								</div>
								<p class="mg-b-20">قم بتعديل بيانات المستخدم</p>
								<form action="{{ route('update.user', $user->id) }}" method="POST">
									@csrf
									<div class="row row-sm">
										<div class="col-6">
											<div class="form-group mg-b-0">
												<label class="form-label">الاسم: <span class="tx-danger">*</span></label>
												<input class="form-control" name="name" value="{{ $user->name }}" placeholder="أدخل اسم المستخدم" required="" type="text">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="form-label">البريد الإلكتروني: <span class="tx-danger">*</span></label>
												<input class="form-control" name="email" value="{{ $user->email }}" placeholder="أدخل البريد الإلكتروني" required="" type="email">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="form-label">رقم الهاتف: <span class="tx-danger">*</span></label>
												<input class="form-control" name="phone" value="{{ $user->phone }}" placeholder="أدخل رقم الهاتف" required="" type="text">
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label class="form-label">كلمة المرور الجديدة:</label>
												<input class="form-control" name="password" placeholder="أدخل كلمة المرور الجديدة" type="password">
											</div>
										</div>
										<div class="col-12">
											<div class="form-group mb-0 mt-3 justify-content-end">
												<input type="submit" class="btn btn-primary" value="حفظ التغييرات">
												<a href="{{ route('users') }}" class="btn btn-secondary mr-2">إلغاء</a>
											</div>
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
