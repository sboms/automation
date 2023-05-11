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
              <form action="{{ route('resident.store') }}" name="submittedForm" method="POST"  enctype="multipart/form-data" class="icons-tab-steps wizard-circle">
                @csrf

                <!--المعلومات الشخصية -->
                <h6><i class="step-icon la la-home"></i>المعلومات الشخصية</h6>
                <fieldset>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstName2">الاسم :</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="firstName2">
                        @error("name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastName2">العائلة :</label>
                        <input type="text" name="last_name" value="{{old('last_name')}}"  class="form-control" id="lastName2">
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
                        <input type="text" name="father" value="{{old('father')}}"  class="form-control" id="firstName2">
                        @error("father")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastName2">اسم الأم :</label>
                        <input type="text" name="mother" value="{{old('mother')}}"  class="form-control" id="lastName2">
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
                        <input type="email" name="email" value="{{old('email')}}"  class="form-control" id="emailAddress3">
                        @error("email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="emailAddress3">كلمة المرور :</label>
                        <input type="password" name="password" value="{{old('password')}}"  class="form-control" id="emailAddress3">
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
                        <input type="tel" name="phone" value="{{old('phone')}}"  class="form-control" id="phoneNumber2">
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
                          <input type="date" name="birthdate" value="{{old('birthdate')}}"  class="form-control" id="date2">
                          @error("birthdate")
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="date2">مكان الولادة :</label>
                          <input type="text" name="birthplace" value="{{old('birthplace')}}"  class="form-control" id="date2">
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
                          <input type="text" name="livingplace" value="{{old('livingplace')}}"  class="form-control" id="date2">
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
                        <input type="text" name="name_en" value="{{old('name_en')}}"  class="form-control" id="proposalTitle2">
                        @error("name_en")
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="emailAddress4">اسم الأب :</label>
                            <input type="email" name="father_en" value="{{old('father_en')}}"  class="form-control" id="emailAddress4">
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
                            <input type="text" name="mother_en" value="{{old('mother_en')}}"  class="form-control" id="emailAddress4">
                            @error("mother_en")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                    </div>
                  </div>
                </fieldset>
                <!-- معلومات الاختصاص -->
                <h6><i class="step-icon la la-tv"></i>معلومات الاختصاص</h6>
                <fieldset>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="eventName2">درجة الطب العام :</label>
                        <input type="number" step="0.1" min="59" name="graduation_result" value="{{old('graduation_result')}}"    class="form-control" id="eventName2">
                        @error("graduation_result")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="eventName2">سنة التخرج :</label>
                          <input type="date" name="graduation_year" value="{{old('graduation_year')}}"  class="form-control" id="eventName2">
                          @error("graduation_year")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="eventName2">تاريخ التسجيل في سبومز  :</label>
                        <input type="date" name="registration_date" value="{{old('registration_date')}}"  class="form-control" id="eventName2" >
                        @error("registration_date")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="eventName2">حالة المقيم قبل التسجيل  :</label>
                          <select class="custom-select form-control" id="location2" name="p_status">
                            <option value="طالب طب">طالب طب</option>
                            <option value="مقيم سابق">مقيم سابق</option>
                            <option value="أنهى التدريب">أنهى التدريب</option>
                          </select>
                          @error("status")
                              <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="eventName2">حالة المقيم في الاختصاص الحالي  :</label>
                          <select class="custom-select form-control" id="location2" name="status">
                            <option value="مقيم">مقيم </option>
                            <option value="أنهى التدريب">أنهى التدريب</option>
                          </select>
                          @error("status")
                              <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="eventName2">تاريخ بدء التدريب السابق :</label>
                        <input type="date" name="start_previous_training" value="{{old('start_previous_training')}}"  class="form-control" id="eventName2" >
                        @error("start_previous_training")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="eventName2">تاريخ نهاية التدريب السابق :</label>
                          <input type="date" name="end_previous_training" value="{{old('end_previous_training')}}"  class="form-control" id="eventName2" >
                            @error("end_previous_training")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                      </div>

                  </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="location2">الاختصاص:</label>
                        <select class="custom-select form-control" id="location2" name="specialty_id">
                          @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="location2">سنة الاقامة الحالية:</label>
                          <select class="custom-select form-control" id="location2" name="year">
                                <option value="1">الأولى</option>
                                <option value="2">الثانية</option>
                                <option value="3">الثالثة</option>
                                <option value="4">الرابعة</option>
                                <option value="5">الخامسة</option>
                                <option value="6">السادسة</option>
                                <option value="7">السابعة</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="eventName2">تاريخ بدء سنة الإقامة  :</label>
                          <input type="date" name="start_date" value="{{old('start_date')}}"  class="form-control" id="eventName2" >
                          @error("start_date")
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="location2">الحالة: </label>
                          <select class="custom-select form-control" id="location2" name="state">
                                <option value="قبول">قبول</option>
                                <option value="إقامة">إقامة</option>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="eventName2">تاريخ بدء التدريب  :</label>
                        <input type="date" name="start_training" value="{{old('start_training')}}"  class="form-control" id="eventName2" >
                        @error("start_training")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="meetingName2">استمارة مباشرة التدريب :</label>
                          <div class="custom-file">
                              <input type="file" name="training_document" value="{{old('training_document')}}"  class="custom-file-input" id="inputGroupFile01">
                              <label class="custom-file-label" for="inputGroupFile01">استمارة مباشرة التدريب</label>
                              @error("training_document")
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="meetingName2">رقم التسجيل :</label>
                          <div class="custom-file">
                            <input type="number" name="registration_number" value="{{old('registration_number')}}" min="1"  class="form-control" id="eventName2" >
                              <span class="text-success">في حال ترك رقم التسجيل فارغ يتم إنشاء رقم تلقائي</span>
                              @error("registration_number")
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group"><br>
                          <label for="eventName2">الامتحان الكتابي الأولي مطلوب؟</label>
                          <input type="checkbox" id="switcherySize1" name="first_exam" class="switchery" checked/>
                            @error("end_training")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                      <div class="col-md-3">
                        <div class="form-group"><br>
                          <label for="eventName2">الامتحان الكتابي النهائي مطلوب؟</label>
                          <input type="checkbox" id="switcheryColor1" name="final_exam" class="switchery" data-color="warning" checked/>
                            @error("end_training")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                      </div>

                  </div>

<!--------------------------------------------------------------------------------->
                </fieldset>
                <!-- الوثائق الرسمية -->
                <h6><i class="step-icon la la-image"></i>الوثائق الرسمية</h6>
                <fieldset>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="meetingName2">الصورة الشخصية :</label>
                        <div class="custom-file">
                            <input type="file" name="personal_picture" value="{{old('personal_picture')}}"  class="custom-file-input" id="inputGroupFile01">
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
                              <input type="file" name="university_degree" value="{{old('university_degree')}}" class="custom-file-input" id="inputGroupFile01">
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
                            <input type="file" name="graduation_notice" value="{{old('graduation_notice')}}"  class="custom-file-input" id="inputGroupFile01">
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
                              <input type="file" name="id_card" value="{{old('id_card')}}"  class="custom-file-input" id="inputGroupFile01">
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
                            <input type="file" name="syndication_document" value="{{old('syndication_document')}}"  class="custom-file-input" id="inputGroupFile01">
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
                              <input type="file" name="practicing_profession" value="{{old('practicing_profession')}}"  class="custom-file-input" id="inputGroupFile01">
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
