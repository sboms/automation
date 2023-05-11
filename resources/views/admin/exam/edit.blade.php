@extends('layouts.admin')
@section('title')
تعديل امتحان
@endsection
@section('style')
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/vendors.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/vendors/css/forms/selects/select2.min.css")}}">
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
                        <h4 class="card-title" id="basic-layout-form">تعديل امتحان</h4>
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
                            </div>
                            <form class="form" action="{{ route('exam.update',['exam'=>$exam->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> البيانات</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput2">نوع الامتحان *</label>
                                                <select class="custom-select form-control" id="location2" name="name">
                                                    <option value="">اختر نوع الامتحان</option>
                                                    <option value="كتابي أولي" {{ $exam->name == "" ? "selected" : "" }}>كتابي أولي</option>
                                                    <option value="كتابي نهائي"  {{ $exam->name == "" ? "selected" : "" }}>كتابي نهائي</option>
                                                    <option value="سريري وشفوي"  {{ $exam->name == "" ? "selected" : "" }}>سريري وشفوي</option>
                                                    <option value="تقييمي"  {{ $exam->name == "" ? "" : "selected" }}>تقييمي</option>
                                                </select>
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">تاريخ الامتحان</label>
                                                <input type="date" id="exam_date" value="{{ $exam->exam_date }}" name="exam_date" class="form-control" placeholder="">
                                                @error("exam_date")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput2">الدورة الامتحانية*</label>
                                                <select class="custom-select form-control" id="location2" name="cycle">
                                                    <option value="">اختر الدورة الامتحانية*</option>
                                                    @foreach($cycles as $cycle)
                                                    <option value="{{ $cycle->id }}" {{ $exam->Cycle->id == $cycle->id ? "selected" : "" }}>{{ $cycle->type }}</option>
                                                    @endforeach
                                                </select>
                                                @error("cycle")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput2">اختصاص الامتحان *</label>
                                                <select class="custom-select form-control" id="location2" name="specialty">
                                                    <option value="">اختر اختصاص الامتحان</option>
                                                    @foreach ($specialties as $specialty)
                                                    <option value="{{ $specialty->id }}"{{ $exam->Specialty->id == $specialty->id  ? "selected" : "" }}>{{ $specialty->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error("specialty")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput2">مراكز الامتحان *</label>
                                                <select class="select2 form-control" id="location2" multiple="multiple" name="examCenters[]">
                                                    <option value="">اختر مراكز الامتحان</option>
                                                    @foreach ($examCenmters as $examCenmter)
                                                    <option value="{{ $examCenmter->id }}"
                                                        @foreach ($curExamCenmters as $curExamCenmter)
                                                            {{ $examCenmter->id == $curExamCenmter->id ? "selected" : "" }}
                                                        @endforeach>{{ $examCenmter->name }}
                                                     </option>
                                                    @endforeach
                                                </select>
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> إلغاء
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> حفظ
                                    </button>
                                </div>
                                <a href="{{ route('exam.index') }}">العودة إلى جميع حالات المقيم</a>
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
!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset("assets/admin/app-assets/vendors/js/forms/select/select2.full.min.js")}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
<!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset("assets/admin/app-assets/js/scripts/forms/select/form-select2.js")}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
@endsection
@section('cuUcript')
@endsection
