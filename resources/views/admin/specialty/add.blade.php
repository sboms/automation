@extends('layouts.admin')
@section('title')
إضافة اختصاص
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
                        <h4 class="card-title" id="basic-layout-form">إضافة اختصاص</h4>
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
                                <p>الرجاء إضافة معلومات الاختصاص بشكل كامل مع الانتاه إلى رمز الاختصاص ونوعه</p>
                            </div>
                            <form class="form" action="{{ route('specialty.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> معلومات الاختصاص</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">الاختصاص</label>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="اسم الاختصاص">
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">الاسم الإنكليزي</label>
                                                <input type="text" id="name_en" name="name_en" class="form-control" placeholder="اسم الاختصاص باللغة الانكلزية">
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
                                            <label for="projectinput4">عدد السنوات</label>
                                            <input type="number" max="7" min="2" id="number_of_years" class="form-control" placeholder="عدد سنوات الإقامة في الاختصاص" name="number_of_years">
                                            @error("number_of_years")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">الكود</label>
                                            <input type="text" id="code" class="form-control" placeholder="رمز الاختصاص" name="code">
                                            @error("code")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section"><i class="ft-alert-circle"></i> حالة الاختصاص</h4>
                                <div class="form-group">
                                    <strong for="SpecialtyState">الحالة</strong>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput5">عام</label>
                                            <input type="radio" name="type" value="عام" id="type" class="form-control" checked>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput5">فرعي</label>
                                            <input type="radio" name="type" value="فرعي" id="type" class="form-control">
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
