@extends('layouts.admin')
@section('title')
    كل الاختصاصات
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
                        <h4 class="card-title">كل الاختصاصات</h4>
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
                            <p class="card-text">جميع اختصاصات الهيئة السورية للاختصاصات الطبية</p>
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
                                    @foreach ($specialties as $specialty)
                                        <tr>
                                            <th>{{ $i++ }}</th>
                                            <td>{{ $specialty->name }}</td>


                                            <td>
                                                @php($committee = $specialty->Committee)
                                                @if (isset($committee->Users))
                                                    @foreach ($committee->Users as $admin)
                                                        @if ($admin->hasRole(9))
                                                            {{ $admin->name }} {{ $admin->last_name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @php($committee = $specialty->Committee)
                                                @if (isset($committee->Users))
                                                    @foreach ($committee->Users as $admin)
                                                        @if ($admin->hasRole(6))
                                                            {{ $admin->name }} {{ $admin->last_name }}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>

                                            <td>{{ $specialty->Residents->Count()}}</td>
                                            <td>
                                                <a href="{{ route('specialty.residents', ['specialty' => $specialty->id]) }}">
                                                    <button type="button" class="btn btn-outline-success  btn-lg" data-toggle="modal" data-backdrop="false" data-target="#info">
                                                        المقيمين
                                                    </button>
                                                </a>
                                                <a href="{{route('specialty.edit',['specialty'=>$specialty->id]) }}">
                                                    <button type="button" class="btn btn-outline-info  btn-lg" data-toggle="modal" data-backdrop="false" data-target="#info">
                                                        تعديل
                                                    </button>
                                                </a>
                                                </a>
                                                <a>
                                                    <button type="button" class="btn btn-outline-danger  btn-lg" data-toggle="modal" data-target="#danger{{ $specialty->id }}" city-id={{ $specialty->id }}>
                                                        حذف
                                                    </button>
                                                </a>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <!-- Modal -->
                                                        <div class="modal fade text-left" id="danger{{ $specialty->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-danger white">
                                                                        <h4 class="modal-title white" id="myModalLabel10">حذف مسمى وظيفي</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5>تنبيه قبل الحذف</h5>
                                                                        <ul>
                                                                            <li> لن يتم حذف أي اختصاص لديه مقيم أو خريجين </li>
                                                                            <li>في حال كنت متأكد من أنك تريد حذف هذا الاختصاص عليك أولاً اخراج المقيمين من الاختصاص</li>
                                                                        </ul>
                                                                        <hr>
                                                                        <h5>هل أنت متأكد من أنك تريد حذف معلومات  الاختصاص</h5>
                                                                        <ul>
                                                                            <li>{{ $specialty->name }}</li>
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
