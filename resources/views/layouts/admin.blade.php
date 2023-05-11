<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset("assets/admin/app-assets/images/ico/apple-icon-120.png")}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("assets/admin/app-assets/images/ico/favicon.ico")}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
    rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
    rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/vendors.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/vendors/css/pickers/daterange/daterangepicker.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/vendors/css/forms/selects/select2.min.css")}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/app.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/custom-rtl.css")}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/core/menu/menu-types/vertical-content-menu.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/core/colors/palette-gradient.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/plugins/forms/wizard.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/admin/app-assets/css-rtl/plugins/pickers/daterange/daterange.css")}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/admin/assets/css/style-rtl.css")}}">
    <!-- END Custom CSS-->
  @yield('style')
</head>
<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
<!--fixed-top-->
<!-- fixed-top-->
@include('admin.includes.header')
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      @include('admin.includes.sidebar')
      @yield('content')
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('admin.includes.footer')
  <!-- BEGIN VENDOR JS-->
  <script src="{{asset("assets/admin/app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset("assets/admin/app-assets/vendors/js/ui/headroom.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/admin/app-assets/vendors/js/extensions/jquery.steps.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/admin/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js")}}"
  type="text/javascript"></script>
  <script src="{{asset("assets/admin/app-assets/vendors/js/pickers/daterange/daterangepicker.js")}}"
  type="text/javascript"></script>
  <script src="{{asset("assets/admin/app-assets/vendors/js/forms/validation/jquery.validate.min.js")}}"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{asset("assets/admin/app-assets/js/core/app-menu.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/admin/app-assets/js/core/app.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/admin/app-assets/js/scripts/customizer.js")}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset("assets/admin/app-assets/js/scripts/forms/wizard-steps.js")}}" type="text/javascript"></script>
  <script src="{{asset("assets/admin/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js")}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  @yield('script')
  @yield('cuUcript')
  <script>
    function dodajAktywne(elem) {
        // get all 'a' elements
        var a = document.getElementsByTagName('li');
        // loop through all 'a' elements
        for (i = 0; i < a.length; i++) {
            // Remove the class 'active' if it exists
            a[i].classList.remove('active')
        }
        // add 'active' classs to the element that was clicked
        elem.classList.add('active');
    }
  </script>
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset("assets/admin/app-assets/vendors/js/forms/select/select2.full.min.js")}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
<!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset("assets/admin/app-assets/js/scripts/forms/select/form-select2.js")}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
