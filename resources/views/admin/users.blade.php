@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المستخدمين</span>
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
								المستخدمين
							</div>
							<p class="mg-b-20">قائمة بجميع المستخدمين المسجلين في النظام</p>

							<div class="row mb-3">
								<div class="col-md-4">
									<div class="input-group">
										<input type="text" class="form-control" id="searchInput" placeholder="بحث عن مستخدم..." onkeyup="filterUsers()">
										<div class="input-group-append">
											{{-- <button class="btn btn-primary" type="button"><i class="las la-search"></i></button> --}}
										</div>
									</div>
								</div>

							</div>

							<div class="table-responsive">
								<table class="table table-bordered mg-b-0 text-md-nowrap">
									<thead>
										<tr>
											<th>#</th>
											<th>الاسم</th>
											<th>البريد الإلكتروني</th>
											<th>رقم الهاتف</th>
											<th>تاريخ التسجيل</th>
											<th>الحالة</th>
											<th>العمليات</th>
										</tr>
									</thead>
									<tbody>
										@foreach(DB::table('users')->where('role', '!=', 'admin')->get() as $user)
										<tr>
											<th scope="row">{{ $loop->iteration }}</th>
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td>@if($user->phone)<a target="_blank" href="https://wa.me/{{ substr($user->phone, 0, 1) === '0' ? '212' . substr($user->phone, 1) : $user->phone }}">{{ $user->phone }}</a>@else لا يوجد رقم هاتف @endif</td>
											<td>{{ $user->created_at }}</td>
											<td><span class="badge badge-success">نشط</span></td>
											<td>
												<div class="d-flex justify-content-center">
													<a href="{{ route('edit.user', $user->id) }}" class="btn btn-info mx-1"><i class="las la-pen"></i></a>
													<a href="{{ route('delete.user', $user->id) }}" class="btn btn-danger mx-1" onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟ سيتم حذف جميع بياناته نهائياً')"><i class="las la-trash"></i></a>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>

							<div class="mt-3">
								<div class="d-flex justify-content-center">
									{{ DB::table('users')->where('role', '!=', 'admin')->paginate(10)->links() }}
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
    function filterUsers() {
        var input = document.getElementById("searchInput");
        var filter = input.value.toLowerCase();
        var table = document.querySelector("table");
        var tr = table.getElementsByTagName("tr");

        for (var i = 1; i < tr.length; i++) {
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
            tr[i].style.display = found ? "" : "none";
        }
    }
</script>
@endsection
