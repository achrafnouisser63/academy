@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الرسائل</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض الرسالة</span>
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
									تفاصيل الرسالة
								</div>
								<div class="table-responsive">
									<table class="table mg-b-0 text-md-nowrap">
										<tbody>
											<tr>
												<th scope="row">الموضوع:</th>
												<td>{{ $msg->subject }}</td>
											</tr>
											<tr>
												<th scope="row">المرسل:</th>
												<td>{{ $msg->name }}</td>
											</tr>
                                                <tr>
                                                    <th scope="row">البريد الإلكتروني:</th>
                                                    <td>{{ $msg->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">الهاتف:</th>
                                                    @if ($msg->id_user)
                                                        <td><a href="https://wa.me/{{ substr(DB::table('users')->where('id', $msg->id_user)->first()->phone, 0, 1) === '0' ? '212' . substr(DB::table('users')->where('id', $msg->id_user)->first()->phone, 1) : DB::table('users')->where('id', $msg->id_user)->first()->phone }}" target="_blank">{{ DB::table('users')->where('id', $msg->id_user)->first()->phone }}</a></td>
                                                    @else
                                                        <td>لا يوجد رقم هاتف</td>
                                                    @endif
                                                </tr>

											<tr>
												<th scope="row">الرسالة:</th>
												<td>{{ $msg->message }}</td>
											</tr>
											<tr>
												<th scope="row">تاريخ الإرسال:</th>
												<td>{{ $msg->created_at }}</td>
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
