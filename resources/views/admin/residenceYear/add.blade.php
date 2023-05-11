@extends('layouts.admin')
@section('title')
إضافة سنة إقامة
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
                        <h4 class="card-title" id="basic-layout-form">إضافة سنة إقامة</h4>
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
                                <p></p>
                            </div>
                            <form class="form" action="{{ route('residenceYear.create',['resident'=>$resident->id,'specialty'=>$specialty->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id">
                                <input type="hidden" name="resident_id" value="{{ $resident->id }}">
                                <input type="hidden" name="specialty_id" value="{{ $specialty->id }}">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> معلومات المقيم والاختصاص</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">الاسم</label>
                                                <input type="text" id="resident" name="resident" value="{{ $resident->User->name }} {{ $resident->User->last_name }}" class="form-control" readonly>
                                                @error("resident")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">الاختصاص </label>
                                                <input type="text" id="specialty" name="specialty" value="{{ $specialty->name }}" class="form-control" readonly>
                                                @error("specialty")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section"><i class="ft-alert-circle"></i> معلومات سنة الإقامة الجديدة</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">ترتيب سنة الإقامة </label>
                                            <select class="select2 form-control" id="number" name="number" required>
                                                <option value="">اختر سنة الإقامة</option>
                                                <option value="1">أولى</option>
                                                <option value="2">ثانية</option>
                                                <option value="3">ثالثة</option>
                                                <option value="4">رابعة</option>
                                                <option value="5">خامسة</option>
                                                <option value="6">سادسة</option>
                                                <option value="7">سابعة</option>
                                            </select>
                                            @error("number")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">الملاحظ - التعليق </label>
                                            <input type="text" id="comment" name="comment" class="form-control">
                                            @error("comment")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">تاريخ البداية </label>
                                            <input type="date" id="start_date" name="start_date" class="form-control">
                                            @error("start_date")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">تاريخ النهاية </label>
                                            <input type="date" id="end_date" name="end_date" class="form-control">
                                            @error("end_date")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <label>حالة السنة</label>
                                            <div class="input-group">
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" name="state" class="custom-control-input" value="إقامة" id="yes" required>
                                                    <label class="custom-control-label" for="yes">إقامة</label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-radio">
                                                    <input type="radio" name="state" class="custom-control-input" value="قبول" id="no">
                                                    <label class="custom-control-label" for="no">قبول</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('residenceYear.index',['resident'=>$resident->id,'specialty'=>$specialty->id]) }}">
                                    <p>العودة إلى كل سنوات الإقامة</p>
                                </a>
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
