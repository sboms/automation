@extends('layouts.admin')
@section('title')
الرئيسية
@endsection
@section('style')
<!-- BEGIN VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/vendors.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/vendors/css/forms/toggle/switchery.min.css")}}">
<!-- END VENDOR CSS-->
<!-- BEGIN Page Level CSS-->

@endsection
@section('content')
<div class="content-body">
    @include('admin.alerts.errors')
    @include('admin.alerts.success')
    @include('admin.alerts.warning')
    <!-- Basic form layout section start -->


    <!-- // Basic form layout section end -->
</div>

@endsection
@section('script')
<!-- BEGIN PAGE VENDOR JS-->

@endsection
