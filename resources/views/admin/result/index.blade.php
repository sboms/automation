@extends('layouts.admin')
@section('title')
الدرجات
@endsection
@section('content')
<div class="content-body">
    @include('admin.alerts.errors')
    @include('admin.alerts.success')
    @include('admin.alerts.warning')
    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">كل الدرجات </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <p class="card-text"></p>
                        <div class="col-sm-12 col-lg-4 col-xl-2" style="float: left;">
                            <ul class="pl-0 list-unstyled">
                                <li class="mb-1">
                                    <a href="{{ route('Result.create',['exam'=>$exam->id]) }}">
                                        <button type="button" class="btn btn-info btn-block"> إضافة النتائج </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>اسم الأب </th>
                                    <th>اسم الأم</th>
                                    <th>الامتحان</th>
                                    <th>الاختصاص</th>
                                    <th>الدرجة</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($results as $result)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $result->Resident->User->name }} {{ $result->Resident->User->last_name }}</td>
                                    <td>{{ $result->Resident->User->father }}</td>
                                    <td>{{ $result->Resident->User->last_name }}</td>
                                    <td>{{ $result->Exam->name}}</td>
                                    <td>{{ $result->Exam->Specialty->name}}</td>
                                    <td>{{ $result->value }}</td>
                                    <td>
                                        <a href="{{ route('Result.edit',['result'=>$result->id]) }}">
                                            <button type="button" class="btn btn-outline-info  btn-lg" data-toggle="modal" data-backdrop="false" data-target="#info">
                                                تعديل
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger  btn-lg" data-toggle="modal" data-target="#danger{{ $result->id }}" city-id={{ $result->id }}>
                                            حذف
                                        </button>
                                    </td>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <!-- Modal -->
                                            <div class="modal fade text-left" id="danger{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger white">
                                                            <h4 class="modal-title white" id="myModalLabel10">حذف جلسة امتحانية</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>تنبيه قبل الحذف</h5>

                                                            <h5>هل أنت متأكد من أنك تريد إلفاء ترشيح المقيم إلى الاختصاص</h5>
                                                            <ul>
                                                                <li>المقيم: {{ $result->Resident->User->name }} {{ $result->Resident->User->father }} {{ $result->Resident->User->last_name }}</li>
                                                                <li>الامتحان: {{ $result->Exam->name }} </li>
                                                                <li>تاريخ الامتحان: {{ $result->Exam->exam_date }} </li>

                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إلغاء</button>
                                                            <form action="{{ route('Result.destroy',['result'=>$result->id]) }}" method="post">
                                                                @csrf
                                                                @method("DELETE")
                                                                <input type="hidden" name="resident_id" value="{{ $result->id }}">
                                                                <button type="submit" class="btn btn-outline-danger">تأكيد إزالة الجلسة الامتحانية</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bordered striped end -->
</div>
</div>
</div>
</div>
@endsection
