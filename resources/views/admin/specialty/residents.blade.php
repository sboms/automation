@extends('layouts.admin')
@section('title')
كل المقيمين في اختصاصاص {{ $specialty->name }}
@endsection
@section('style')
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href={{ asset('assets/admin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}>
<link rel="stylesheet" type="text/css" href={{ asset('assets/admin/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css') }}>
<link rel="stylesheet" type="text/css" href={{ asset('assets/admin/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}>
<!-- END VENDOR CSS-->
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
                    <h4 class="card-title">كل المقيمين في اختصاصاص {{ $specialty->name }}</h4>
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
                        <p class="card-text">كل الأطباء المقيمين</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dataex-html5-selectors">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>اسم الأم</th>
                                    <th>الحالة</th>
                                    <th>الإجراء</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($residents as $resident)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $resident->User->name }} {{ $resident->User->father }}
                                        {{ $resident->User->last_name }}</td>
                                    <td>{{ $resident->User->mother }}</td>
                                    <td>{{ $resident->pivot->status }}</td>
                                    <td>
                                        <!-- /btn-group -->
                                        <div class="btn-group mr-1 mb-1">
                                            <a href="{{ route('residenceYear.index', ['resident' => $resident->id, 'specialty' => $specialty->id]) }}">
                                                <button type="button" class="btn btn-outline-success">سنوات
                                                    الإقامة</button>
                                            </a>
                                        </div>
                                        <div class="btn-group mr-1 mb-1">
                                            <a href="{{ route('vacationResident.index', ['resident' => $resident, 'specialty' => $specialty]) }}">
                                                <button type="button" class="btn btn-outline-primary">الإجازات</button>
                                            </a>
                                        </div>
                                        <div class="btn-group mr-1 mb-1">
                                            <a href="{{ route('penaltyResident.index', ['resident' => $resident, 'specialty' => $specialty]) }}">
                                                <button type="button" class="btn btn-outline-danger">العقوبات</button>
                                            </a>
                                        </div>
                                        <div class="btn-group mr-1 mb-1">
                                            <a href="{{ route('StateResident.index',['resident' =>$resident ,'specialty'=>$specialty]) }}">
                                                <button type="button" class="btn btn-outline-dark">تغيير الحالة</button>
                                            </a>
                                        </div>
                                        <div class="btn-group mr-1 mb-1">
                                            <a href="{{ route('Deprivation.index',['resident' =>$resident ,'specialty'=>$specialty]) }}">
                                                <button type="button" class="btn btn-outline-warning">العقوبات الامتحانية</button>
                                            </a>
                                        </div>
                    </div>
                    </td>
                    <td><a href="{{ route('resident.edit', ['resident' => $resident->id]) }}"><i class="ft-edit" style="color: rgb(255, 104, 4);"></i></i></a><a href=""> <i class="ft-eye" style="color: rgb(4, 173, 245);"></i></a> <i class="ft-delete" style="color: rgb(251, 5, 1);"></i></td>
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
@section('script')
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('assets/admin/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
@endsection
