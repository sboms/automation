@extends('layouts.admin')
@section('title')
كل المهام الوظيفية
@endsection
@section('style')
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/vendors.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/vendors/css/forms/icheck/icheck.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/vendors/css/forms/icheck/custom.css")}}">
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
                    <h4 class="card-title">كل المهام الوظيفية</h4>
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
                <div class="card-body">
                    <p style="font-size: 25px">كل الأدوار أو المهام الوظيفية المتوافرة في النظام</p></br>
                    <div class="row skin skin-square">
                        <form class="from" action="{{ route('permissionToRole.update',['role' => $role->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @foreach ($premissions as $premission)
                                <div class="col-md-4 col-sm-6">
                                    <fieldset>
                                        <input type="checkbox" id="input-{{ $premission->id }}" name="permissionsIds[]" value="{{ $premission->name }}" @foreach ($cuPermissions as $cuPermission) {{ $cuPermission->id == $premission->id ? "checked" : ""; }} @endforeach>
                                        <label for="input-{{ $premission->id }}">{{ $premission->name }}</label>
                                    </fieldset>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-actions">
                                <a href="{{ url()->previous() }}">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> إلغاء
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> حفظ
                                </button>
                            </div>
                        </form>
                        <div class="col-sm-12">
                            <fieldset class="colors clear">
                                <strong>اختر لونك المفضل</strong>
                                <ul>
                                    <li title="Black"></li>
                                    <li class="red active" title="Red"></li>
                                    <li class="green" title="Green"></li>
                                    <li class="blue" title="Blue"></li>
                                    <li class="aero" title="Aero"></li>
                                    <li class="grey" title="Grey"></li>
                                    <li class="orange" title="Orange"></li>
                                    <li class="yellow" title="Yellow"></li>
                                    <li class="pink" title="Pink"></li>
                                    <li class="purple" title="Purple"></li>
                                </ul>
                            </fieldset>
                        </div>
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
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset("assets/admin/app-assets/vendors/js/ui/headroom.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/admin/app-assets/vendors/js/forms/icheck/icheck.min.js")}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset("assets/admin/app-assets/js/scripts/forms/checkbox-radio.js")}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
@endsection
