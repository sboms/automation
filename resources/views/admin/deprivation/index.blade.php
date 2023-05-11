@extends('layouts.admin')
@section('title')
العقوبات الامتحانية
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
                        <h4 class="card-title">كل العقوبات الامتحانبة</h4>
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
                            <p class="card-text">كل العقوبات الامتحانية للمقيم {{ $resident->User->name }} {{ $resident->User->last_name }} في اختصاص {{ $specialty->name }}</p>
                            <div style="float: left;margin: 1ch">
                                <a href="{{route('Deprivation.create',['resident'=>$resident->id,'specialty'=>$specialty->id]) }}">
                                    <button type="button" class="btn btn-outline-info  btn-lg" data-toggle="modal" data-backdrop="false" data-target="#info">
                                        إضافة عقوبة امتحانية
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاختصاصاص</th>
                                        <th>مسؤل المجلس</th>
                                        <th>رئيس المجلس</th>

                                        <th>المقيمين</th>
                                        <th>الإجراء</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($deprivations as $deprivation)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <td>{{ $deprivation->date }}</td>
                                            <td>{{ $deprivation->reason }}</td>
                                            <td>{{ $deprivation->Exam->name }}</td>
                                            <td>{{ $deprivation->Exam->date }}</td>


                                            <td>
                                                <a href="{{route('Deprivation.edit',['deprivation'=>$deprivation->id]) }}">
                                                    <button type="button" class="btn btn-outline-info  btn-lg" data-toggle="modal" data-backdrop="false" data-target="#info">
                                                        تعديل
                                                    </button>
                                                </a>
                                                </a>
                                                <a>
                                                    <button type="button" class="btn btn-outline-danger  btn-lg" data-toggle="modal" data-target="#danger{{ $deprivation->id }}" city-id={{ $deprivation->id }}>
                                                        حذف
                                                    </button>
                                                </a>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <!-- Modal -->
                                                        <div class="modal fade text-left" id="danger{{ $deprivation->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger white">
                                                                        <h4 class="modal-title white" id="myModalLabel10">حذف  عقوبة امتحانية</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>تنبيه قبل الحذف</h5>

                                                                        <h5>هل أنت متأكد من أنك تريد حذف العقوبة الامتحانية </h5>
                                                                        <ul>
                                                                            <li>سبب العقوبة:{{ $deprivation->reason }}</li>
                                                                            <li>الامتحان الذي تم الحرمان منه:  {{ $deprivation->Exam->name }}</li>
                                                                            <li>المقيم صاحب العقوبة:  {{ $resident->User->name }}</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إلغاء</button>
                                                                        <form action="{{ route('specialty.destroy',['specialty' => $specialty->id]) }}" method="post">
                                                                            @csrf
                                                                            @method("DELETE")
                                                                            <button type="submit" class="btn btn-outline-danger">تأكد الحذف </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
        <!-- Bordered striped end -->
    </div>
    </div>
    </div>
    </div>
@endsection
