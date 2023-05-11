@extends('layouts.admin')
@section('title')
إضافة عقوبة امتحانية
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
                        <h4 class="card-title" id="basic-layout-form">إضافة عقوبة امتحانية</h4>
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
                                <p>إضافة عبوبة حرمان من امتحان للمقيم {{$resident->User->name}} {{$resident->User->last_name}} في اختصاص {{ $specialty->name }} </p>
                            </div>
                            <form class="form" action="{{ route('Deprivation.store',['resident'=>$resident->id,'specialty'=>$specialty->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> معلومات العقوبة</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">الاختصاص</label>
                                                <input type="text" id="name" name="name" value="{{ $specialty->name }}" class="form-control" placeholder="اسم الاختصاص" readonly>
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">المقيم </label>
                                                <input type="text" id="name_en" name="name_en" value="{{$resident->User->name}} {{$resident->User->last_name}}" class="form-control" placeholder="اسم الاختصاص باللغة الانكلزية" readonly>
                                                @error("name_en")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">السبب</label>
                                            <input type="text" id="reason" class="form-control" placeholder="سبب العقوبة" name="reason">
                                            @error("reason")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">التاريخ</label>
                                            <input type="date" id="date" class="form-control" placeholder="رمز الاختصاص" name="date">
                                            @error("date")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput2">الامتحان  *</label>
                                            <select class="select2 form-control" id="location2"  name="exam_id" required>
                                                <option value="">اختر الامتحان</option>
                                                @foreach ($exams as $exam)
                                                <option value="{{ $exam->id }}">{{ $exam->name }} {{ $exam->exam_date }}</option>
                                                @endforeach
                                            </select>
                                            @error("name")
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
