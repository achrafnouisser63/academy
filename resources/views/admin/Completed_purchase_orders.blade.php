@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الزوار</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ طلبات الشراء المكتملة</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">طلبات الشراء المكتملة</h4>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<div class="row">
										<div class="col-sm-12 col-md-4 mb-3">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="بحث..." id="searchInput" onkeyup="searchTable()">

												<div class="input-group-append">
													<span class="input-group-text"><i class="fas fa-search"></i></span>
												</div>
											</div>
										</div>
									</div>
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">رقم المستخدم</th>
												<th class="wd-15p border-bottom-0">اسم المستخدم</th>
												<th class="wd-20p border-bottom-0">اسم الدورة</th>
												<th class="wd-15p border-bottom-0">حالة الدورة</th>
												<th class="wd-10p border-bottom-0">تاريخ التسجيل</th>
												<th class="wd-15p border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach(DB::table('user_courses')->where('status', 'yes')->get() as $userCourse)
											<tr>
												<td>{{ $userCourse->user_id }}</td>
												<td>{{ DB::table('users')->where('id', $userCourse->user_id)->first()->name }}</td>
												<td>{{ DB::table('courses')->where('id', $userCourse->course_id)->first()->title_ar }}</td>
												<td>{{ $userCourse->status }}</td>
												<td>{{ Carbon\Carbon::parse($userCourse->created_at)->format('Y-m-d') }}</td>
												<td>
													<div class="btn-group">
														<form action="{{ route('reject.course', $userCourse->id) }}" method="POST" style="display: inline;">
															@csrf
															<button type="submit" class="btn btn-sm btn-danger" title="توقيف" onclick="return confirm('هل أنت متأكد من توقيف هذا الطلب؟')">
																<i class="fas fa-times"></i>
															</button>
														</form>
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									<div class="d-flex justify-content-center mt-3">
										{{ DB::table('user_courses')->where('status', 'yes')->paginate(10)->links() }}
									</div>
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
    function searchTable() {
        var input = document.getElementById("searchInput");
        var filter = input.value.toLowerCase();
        var table = document.getElementById("example1");
        var tr = table.getElementsByTagName("tr");

        for (var i = 0; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td");
            var found = false;
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    var txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            if (found) {
                tr[i].style.display = "";
            } else {
                if (i > 0) { // Skip header row
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script>
@endsection
