@extends('layouts.admin')
@section('title')
إضافة اعتذار
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
                        <h4 class="card-title" id="basic-layout-form">إضافة اعتذار</h4>
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
                                <p>إضافة اعتذار للمقيم {{ $resident->User->name }}{{ $resident->User->last_name }} عن امتحان {{ $exam->name }}</p>
                            </div>
                            <form class="form" action="{{ route('Apology.store',['exam'=>$exam->id,'resident'=>$resident->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> معلومات الاعتذار</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput2">السبب *</label>
                                                <select class="select2 form-control" id="location2" name="reason" required>
                                                    <option value="">اختر سبب الاعتذار</option>
                                                    <option value="مرض خطير للطبيب">مرض خطير للطبيب</option>
                                                    <option value="مرض خطير /وفاة أحد الأقرباء من الدرجة الأولى">مرض خطير /وفاة أحد الأقرباء من الدرجة الأولى</option>
                                                    <option value="ظروف السفر">ظروف السفر</option>
                                                    <option value="ظرف أمني طارئ">ظرف أمني طارئ</option>
                                                    <option value="أسباب أخرى">أسباب أخرى</option>
                                                </select>
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> التاريخ الإعتذار</label>
                                                <input type="date" id="date" name="date" class="form-control" placeholder="اسم الاختصاص">
                                                @error("date")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> التوضيج</label>
                                                <input type="text" id="explan" name="explan" class="form-control" placeholder="اسم الاختصاص">
                                                @error("explan")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> تعليق الامتحانات</label>
                                                <input type="text" id="comment" name="comment" class="form-control" placeholder="اسم الاختصاص">
                                                @error("comment")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1"> الملف التوضيحي</label>
                                                <input type="file" id="allfile" name="allfile" class="form-control" placeholder="اسم الاختصاص">
                                                <span class="text-info">الرجاء جمع كل الملفات والوثائق التي تثبت صحة ما ذكر أعلا في ملف pdf</span><br />
                                                @error("allfile")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section"><i class="ft-alert-circle"></i> حالة الاعتذار</h4>
                                <div class="form-group">
                                    <strong for="SpecialtyState">الحالة</strong>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput5">مقبول</label>
                                            <input type="radio" name="state" value="true" id="state" class="form-control" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput5">مرفوض</label>
                                            <input type="radio" name="state" value="false" id="state" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <a href="{{ url()->previous() }}"><button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> إلغاء
                                        </button></a>
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
