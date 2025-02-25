@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الدورات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل دروس الدورة</span>
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
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <div class="d-flex">
                                <input type="text" class="form-control" id="topicSearch" placeholder="بحث عن موضوع...">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0"> عنوان الدرس</th>
                                <th class="wd-15p border-bottom-0">اسم الدورة</th>

                                <th class="wd-15p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course_topics as $topic)
                                <tr>
                                    <td>{{ $topic->id }}</td>
                                    <td>{{ $topic->title_ar }}</td>
                                    <td>{{ DB::table('courses')->where('id', $topic->course_id)->first()->title_ar }}</td>
                                    <td>{{ $topic->description }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-info btn-sm" role="button" aria-pressed="true">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_topic{{ $topic->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- حذف الموضوع -->
                                <div class="modal fade" id="delete_topic{{ $topic->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">حذف الموضوع</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('topics.destroy', $topic->id) }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="modal-body">
                                                    <h5>هل أنت متأكد من حذف هذا الموضوع؟</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                    <button type="submit" class="btn btn-danger">تأكيد</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- row closed -->

@endsection
@section('js')
<script>
    document.getElementById('topicSearch').addEventListener('keyup', function() {
        let searchText = this.value.toLowerCase();
        let table = document.getElementById('example1');
        let rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName('td');
            let found = false;

            for (let j = 0; j < cells.length; j++) {
                let cellText = cells[j].textContent.toLowerCase();
                if (cellText.includes(searchText)) {
                    found = true;
                    break;
                }
            }

            rows[i].style.display = found ? '' : 'none';
        }
    });
</script>
@endsection
