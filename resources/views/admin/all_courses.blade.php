@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الدورات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/  جميع الدورات </span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">


					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- rofw -->
				<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="main-content-label mg-b-5">
								جميع الدورات
							</div>
							<p class="mg-b-20">قائمة بجميع الدورات المتاحة</p>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card-body">
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="ابحث عن دورة...">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button" onclick="searchCourses()">
                <i class="las la-search"></i> بحث
            </button>
        </div>
    </div>
</div>



							<div class="table-responsive">
								<table class="table table-bordered mg-b-0 text-md-nowrap">
									<thead>
										<tr>
											<th>#</th>
											<th>عنوان الدورة</th>
											<th>المدرب</th>
											<th>السعر</th>
											<th>المدة</th>
											<th>الصورة</th>
											<th>العمليات</th>
										</tr>
									</thead>
									<tbody>
										@foreach(DB::table('courses')->get() as $course)
										<tr>
											<th scope="row">{{ $loop->iteration }}</th>
											<td>{{ $course->title_ar }}</td>
											<td>{{ $course->professor_ar }}</td>
											<td>{{ $course->price }}</td>
											<td>{{ $course->heur }} ساعة</td>
											<td>
												<img src="{{ asset($course->image) }}" width="100">
											</td>
											<td>
												<div class="d-flex justify-content-center">
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
<script>
    function searchCourses() {
        let input = document.getElementById('searchInput').value.toLowerCase();
        let table = document.querySelector('table');
        let tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td');
            let found = false;

            for (let j = 0; j < td.length; j++) {
                let cell = td[j];
                if (cell) {
                    let text = cell.textContent || cell.innerText;
                    if (text.toLowerCase().indexOf(input) > -1) {
                        found = true;
                        break;
                    }
                }
            }

            if (found) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    </script>
@endsection
