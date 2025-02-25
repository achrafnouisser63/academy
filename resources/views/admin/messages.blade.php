@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الرسائل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ كل الرسائل</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									كل الرسائل
								</div>
								@if(session('success'))
									<div class="alert alert-success text-center">
										{{ session('success') }}
									</div>
								@endif
<div class="row">
    <div class="col-sm-12 col-md-4 mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="بحث..." id="searchInput">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 mb-3">
        <select class="form-control" id="filterStatus">
            <option value=""><i class="fas fa-filter"></i> جميع الحالات</option>
            <option value="no"><i class="fas fa-envelope"></i> غير مقروءة</option>
            <option value="yes"><i class="fas fa-envelope-open"></i> مقروءة</option>
        </select>
    </div>
</div>


								<div class="table-responsive">
									<table class="table mg-b-0 text-md-nowrap">
										<thead>
											<tr>
												<th>#</th>
												<th>المرسل</th>
												<th>البريد الإلكتروني</th>
												<th>الموضوع</th>
												<th>الحالة</th>
												<th>تاريخ الإرسال</th>
												<th>العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach($msgs as $msg)
											<tr>
												<th scope="row">{{ $loop->iteration }}</th>
												<td>{{ $msg->name }}</td>
												<td>{{ $msg->email }}</td>
												<td>{{ $msg->subject }}</td>
												<td>
													@if($msg->vu == 'no')
														<span class="badge badge-danger">غير مقروءة</span>
													@else
														<span class="badge badge-success">مقروءة</span>
													@endif
												</td>
												<td>{{ $msg->created_at }}</td>
												<td>
													<a href="{{ route('show.message', $msg->id) }}" class="btn btn-sm btn-info">
														<i class="las la-eye"></i>
													</a>
													<a href="{{ route('delete.message', $msg->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
														<i class="las la-trash"></i>
													</a>
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
    $(document).ready(function() {
        function filterTable() {
            var searchText = $('#searchInput').val().toLowerCase();
            var statusFilter = $('#filterStatus').val();

            $('tbody tr').each(function() {
                var row = $(this);
                var name = row.find('td:eq(0)').text().toLowerCase();
                var email = row.find('td:eq(1)').text().toLowerCase();
                var subject = row.find('td:eq(2)').text().toLowerCase();
                var status = row.find('.badge').hasClass('badge-danger') ? 'no' : 'yes';

                var matchesSearch = name.includes(searchText) ||
                                  email.includes(searchText) ||
                                  subject.includes(searchText);

                var matchesStatus = statusFilter === '' || status === statusFilter;

                row.toggle(matchesSearch && matchesStatus);
            });
        }

        $('#searchInput').on('keyup', filterTable);
        $('#filterStatus').on('change', filterTable);
    });
    </script>
@endsection
