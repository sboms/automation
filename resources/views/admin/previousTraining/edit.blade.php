@extends('layouts.admin')
@section('title')
تعديل تدريب سابق
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
                  <h4 class="card-title" id="basic-layout-form">تعيل تدريب سابق </h4>
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
                      <p>تعديل فترة تدريب سابقة للمقيم {{ $previousTraining->Resident->User->name }} {{ $previousTraining->Resident->User->last_name }}</p>
                    </div>
                    <form class="form" action="{{ route('previousTraining.update',['previousTraining'=>$previousTraining->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-alert-circle"></i>معلومات التدريب</h4>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">تاريخ بداية التدريب *</label>
                                    <input type="date" id="start_date" value="{{ $previousTraining->start_date }}" name="start_date" class="form-control" placeholder="اسم مركز التدريب">
                                    @error("start_date")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2">تارايخ نهاية التدريب *</label>
                                    <input type="date" id="end_date" name="end_date" value="{{ $previousTraining->end_date }}" class="form-control" placeholder="مكان مركز التدريب" >
                                    @error("end_date")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="meetingName2">وثيقة إثبات التدريب *</label>
                                    <div class="custom-file">
                                        <input type="file" name="pr_document"    class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">استمارة مباشرة التدريب</label>
                                        @error("pr_document")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2">الاختصاص *</label>
                                    <select class="custom-select form-control" id="location2" name="specialty">
                                        @foreach ($specialties as $specialty)
                                            <option value="{{ $specialty->id }}" {{ $specialty->id == $previousTraining->Specialty->id ? 'selected' : '' }}>{{ $specialty->name }}</option>
                                        @endforeach
                                    </select>
                                    @error("specialty_id")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                </div>
                            </div>
                            <h4 class="form-section"><i class="ft-tag"></i> معلومات المركز</h4>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="projectinput1"> اسم مركز التدريب</label>
                                <input type="text" id="hospital_name" value="{{ $previousTraining->hospital_name }}" name="hospital_name" class="form-control" placeholder="اسم مركز التدريب">
                                @error("hospital_name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="projectinput2">مكان مركز التدريب</label>
                                <input type="text" id="hospital_place" value="{{ $previousTraining->hospital_place }}" class="form-control" placeholder="مكان مركز التدريب" name="hospital_place">
                                @error("hospital_place")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                            </div>
                            <h4 class="form-section"><i class="ft-tag"></i> معلومات المشرف على التدريب</h4>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput4">اسم المشرف على التدريب</label>
                                    <input type="text" id="official_name" value="{{ $previousTraining->official_name }}" class="form-control" placeholder="اسم المشرف على التدريب" name="official_name">
                                    @error("official_name")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="projectinput4">البريد الإلكتورني للمشرف</label>
                                    <input type="text" id="official_email" value="{{ $previousTraining->official_email }}" class="form-control" placeholder="اسم المشرف على التدريب" name="official_email">
                                    @error("official_email")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="projectinput1">رقم هاتف المشرف</label>
                                <input type="text" id="official_phone" value="{{ $previousTraining->official_phone }}" name="official_phone" class="form-control" placeholder="اسم مركز التدريب">
                                @error("official_phone")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
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
                    </form>
                    <a href="{{ url()->previous() }}">

                            <i class="la "></i> عودة

                    </a>
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
