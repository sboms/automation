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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">إضافة مقيم</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
                            <form action="{{ route('resident.update',['resident'=>$resident->id]) }}" name="submittedForm" method="POST" enctype="multipart/form-data" class="icons-tab-steps wizard-circle">
                                @csrf
                                @method('PUT')
                                <!--المعلومات الشخصية -->
                                <h6><i class="step-icon la la-home"></i>المعلومات الشخصية</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName2">الاسم :</label>
                                                <input type="text" name="name" value="{{$resident->User->name}}" class="form-control" id="firstName2">
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastName2">العائلة :</label>
                                                <input type="text" name="last_name" value="{{$resident->User->last_name}}" class="form-control" id="lastName2">
                                                @error("last_name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName2">اسم الأب :</label>
                                                <input type="text" name="father" value="{{$resident->User->father}}" class="form-control" id="firstName2">
                                                @error("father")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastName2">اسم الأم :</label>
                                                <input type="text" name="mother" value="{{$resident->User->mother}}" class="form-control" id="lastName2">
                                                @error("mother")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailAddress3">البريد الإلكتروني :</label>
                                                <input type="email" name="email" value="{{$resident->User->email}}" class="form-control" id="emailAddress3">
                                                @error("email")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailAddress3">كلمة المرور :</label>
                                                <input type="password" name="password" class="form-control" id="emailAddress3">
                                                @error("password")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phoneNumber2">رقم الهاتف :</label>
                                                <input type="tel" name="phone" value="{{$resident->User->phone}}" class="form-control" id="phoneNumber2">
                                                @error("phone")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>الجنس</label>
                                                <div class="input-group">
                                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                                        <input type="radio" name="gender" value="ذكر" class="custom-control-input" id="yes" checked>
                                                        <label class="custom-control-label" for="yes">ذكر </label>
                                                    </div>
                                                    <div class="d-inline-block custom-control custom-radio">
                                                        <input type="radio" name="gender" value="أنثى" class="custom-control-input" id="no">
                                                        <label class="custom-control-label" for="no">أنثى</label>
                                                    </div>
                                                </div>
                                                @error("gender")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date2">تاريخ الميلاد :</label>
                                                <input type="date" name="birthdate" value="{{$resident->User->birthdate}}" class="form-control" id="date2">
                                                @error("birthdate")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date2">مكان الولادة :</label>
                                                <input type="text" name="birthplace" value="{{$resident->User->birthplace}}" class="form-control" id="date2">
                                                @error("birthplace")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="date2">مكان الإقامة :</label>
                                                <input type="text" name="livingplace" value="{{$resident->livingplace}}" class="form-control" id="date2">
                                                @error("livingplace")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </fieldset>
                                <!-- المعلومات باللغة الإنكليزية -->
                                <h6><i class="step-icon la la-pencil"></i>المعلومات باللغة الإنكليزية</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="proposalTitle2">الاسم الكامل :</label>
                                                <input type="text" name="name_en" value="{{$resident->name_en}}" class="form-control" id="proposalTitle2">
                                                @error("name_en")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailAddress4">اسم الأب :</label>
                                                <input type="email" name="father_en" value="{{$resident->father_en}}" class="form-control" id="emailAddress4">
                                                @error("father_en")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="emailAddress4">اسم الأم :</label>
                                                <input type="text" name="mother_en" value="{{$resident->mother_en}}" class="form-control" id="emailAddress4">
                                                @error("mother_en")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <!--------------------------------------------------------------------------------->

                                <!-- الوثائق الرسمية -->
                                <h6><i class="step-icon la la-image"></i>الوثائق الرسمية</h6>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meetingName2">الصورة الشخصية :</label>
                                                <div class="custom-file">
                                                    <input type="file" name="personal_picture" value="{{$resident->personal_picture}}" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">الصورة الشخصية</label>
                                                    @error("personal_picture")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meetingName2">شهادة الطب :</label>
                                                <div class="custom-file">
                                                    <input type="file" name="university_degree" value="{{$resident->university_degree}}" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">شهادة الطب</label>
                                                    @error("university_degree")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meetingName2">وثيقة التخرج :</label>
                                                <div class="custom-file">
                                                    <input type="file" name="graduation_notice" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">وثيقة التخرج</label>
                                                    @error("graduation_notice")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meetingName2">صور الهوية :</label>
                                                <div class="custom-file">
                                                    <input type="file" name="id_card" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">صورة الهوية</label>
                                                    @error("id_card")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meetingName2">الوثيقة النقابية :</label>
                                                <div class="custom-file">
                                                    <input type="file" name="syndication_document" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">الوثيقة النقابية</label>
                                                    @error("syndication_document")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meetingName2">ترخيص مزاولة المهنة :</label>
                                                <div class="custom-file">
                                                    <input type="file" name="practicing_profession" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">ترخيص مزاولة المهنة</label>
                                                    @error("practicing_profession")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
