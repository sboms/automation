@extends('layouts.admin')
@section('title')
تعديل درجة امتحان
@endsection
@section('style')
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/vendors.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/vendors/css/forms/toggle/switchery.min.css")}}">
<!-- END VENDOR CSS-->
<!-- BEGIN Page Level CSS-->
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/core/colors/palette-gradient.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/plugins/forms/switch.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/fonts/simple-line-icons/style.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/core/colors/palette-switch.css")}}">
<!-- END Page Level CSS-->
@endsection
@section('content')
<div class="content-body">
    @include('admin.alerts.errors')
    @include('admin.alerts.success')
    @include('admin.alerts.warning')
    <!-- Basic form layout section start -->
    <section id="basic-form-layouts">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">تعديل درجة امتحان</h4>
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
                            <div class="card-text">
                                <p>تعديل درجة امتحان المقيم {{ $result->Resident->User->name }} {{ $result->Resident->User->last_name }} في اختصاص {{ $result->Exam->Specialty->name }} في الامتحان {{ $result->Exam->name }} بتاريخ {{ $result->Exam->exam_date }}</p>
                            </div>
                            <form class="form" action="{{ route('Result.update',['result' =>$result->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> البيانات</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">الدرجة </label>

                                                <input type="number" max="100" min="0" step="1" id="value" name="value" value="{{ $result->value }}" class="form-control" required>
                                                @error("value")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('Result.index',['exam' => $result->Exam->id]) }}">
                                        <p>العودة إلى كل الإجازات </p>
                                    </a>
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> إلغاء
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> حفظ
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic form layout section end -->
</div>
</div>
</div>
</div>
@endsection
@section('script')
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset("assets/admin/app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/admin/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/admin/app-assets/vendors/js/forms/toggle/switchery.min.js")}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset("assets/admin/app-assets/js/scripts/forms/switch.js")}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
@endsection
