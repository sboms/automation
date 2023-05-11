@extends('layouts.admin')
@section('title')
تغيير حالة المقيم
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
                        <h4 class="card-title" id="basic-layout-form">تغيير حالة المقيم</h4>
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
                                <p>تغيير حالة المقيم {{ $resident->User->name }} {{ $resident->User->last_name }} في اختصاص {{ $specialty->name }}</p>
                            </div>
                            <form class="form" action="{{ route('StateResident.store',['resident'=>$resident,'specialty'=>$specialty]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> البيانات</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="eventName2">اختر نوع الحالة :</label>
                                                <select class="custom-select form-control" id="location2" name="state" required>
                                                    <option value="">اختر نوع الحالة</option>
                                                    @foreach ($states as $state)
                                                    <option value={{ $state->id }}>{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error("state")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">تاريخ إصدار الحالة</label>
                                                <input type="date" id="date" name="date" class="form-control" placeholder="تاريخ البداية " required>
                                                @error("date")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">تاريخ البداية</label>
                                                <input type="date" id="start" name="start" class="form-control" placeholder="تاريخ البداية " required>
                                                @error("start")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">تاريخ النهاية</label>
                                                <input type="date" id="end" name="end" class="form-control" placeholder="تاريخ النهاية" required>
                                                @error("end")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">السبب </label>
                                                <input type="text" id="reason" name="reason" class="form-control" placeholder="سبب الحالة ">
                                                @error("reason")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('StateResident.index',['resident' =>$resident->id,'specialty' =>$specialty->id]) }}">
                                        <p>العودة إلى كل الحالات </p>
                                    </a>
                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> إلغاء
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> حفظ
                                        </button>
                                    </div>
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
