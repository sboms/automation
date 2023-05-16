@extends('layouts.admin')
@section('title')
إضافة مقيم
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
    <!-- Form wizard with icon tabs section start -->
    <section id="icon-tabs">
        <div class="row">
            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                @if($resident->personal_picture)
                                <img class="card-img img-fluid mb-1" src=" {{ Storage::url($resident->personal_picture) }}" style="height: 200px;" alt="Card image cap">
                                @endif
                            </div>
                            <h1 class="btn-outline-teal"></h1>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-outline-teal" style="font-size: 20px;">{{ $resident->User->name }} {{ $resident->User->last_name }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @if($resident->Specialties->count() > 0)
            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class=" card" style="background-color: rgba(180, 251, 213, 0.668)">
                    <div class="card-header" style="background-color: rgb(180, 251, 213)">
                        <h2 class="card-title">اختصاصات المقيم</h2>
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
                            <p class="card-text" style="color: black">جميع الاختاصاصات التي أقام بها المقيم<label style="color: rgb(230, 111, 6)"><label style="color: rgb(230, 111, 6)"></label></p>
                        </div>
                        <div class="table-responsive col-12">

                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>الرقم</th>
                                        <th>الحالة </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=0)
                                    @foreach ($resident->Specialties as $specialty)
                                    <tr>
                                        <th>{{ ++$i }}</th>
                                        <th>{{ $specialty->name }}</th>
                                        <td>{{ $specialty->code }}{{ $specialty->pivot->registration_number }}</td>
                                        <td>{{ $specialty->pivot->status }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>


                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($resident->ResidenceYear->count() > 0)
            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class=" card" style="background-color: rgba(254, 102, 102, 0.668)">
                    <div class="card-header" style="background-color: rgb(255, 93, 93)">
                        <h2 class="card-title">سنوات الاقامة</h2>
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
                            <p class="card-text" style="color: black">سنوات الاقامة في جميع الاختصاصات<label style="color: rgb(230, 111, 6)"><label style="color: rgb(230, 111, 6)"></label></p>
                        </div>
                        <div class="table-responsive col-12">

                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>السنة</th>
                                        <th>تاريخ البداية</th>
                                        <th>تاريخ النهاية </th>
                                        <th>الاختصاص</th>
                                        <th>ملاحظات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=0)
                                    @foreach ($resident->ResidenceYear as $residenceYear)
                                    <tr>
                                        <th>{{ ++$i }}</th>
                                        <th>{{ $residenceYear->name }}</th>
                                        <td>{{ $residenceYear->start_date }}</td>
                                        <td>{{ $residenceYear->end_date }}</td>
                                        <td>{{ $residenceYear->Specialty->name }}</td>
                                        <td>{{ $residenceYear->comment }}</td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>


                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($resident->Exams->count() > 0)
            <div class="col-xl-6 col-md-12 col-sm-12">
                <div class=" card" style="background-color: rgba(254, 102, 102, 0.668)">
                    <div class="card-header" style="background-color: rgb(255, 93, 93)">
                        <h2 class="card-title">سنوات الاقامة</h2>
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
                            <p class="card-text" style="color: black">سنوات الاقامة في جميع الاختصاصات<label style="color: rgb(230, 111, 6)"><label style="color: rgb(230, 111, 6)"></label></p>
                        </div>
                        <div class="table-responsive col-12">

                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نوع الامتحان</th>
                                        <th>تاريخ الامتحان </th>

                                        <th>الاختصاص</th>
                                        <th>الدورة الامتحانية</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=0)
                                    @foreach ($resident->Exams as $exam)
                                    <tr>
                                        <th>{{ ++$i }}</th>
                                        <th>{{ $exam->name }}</th>
                                        <td>{{ $exam->exam_date }}</td>
                                        <td>{{ $exam->Specialty->name }}</td>
                                        <td>{{ $exam->Cycle->type }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>


                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </section>
    <!-- Form wizard with icon tabs section end -->
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
