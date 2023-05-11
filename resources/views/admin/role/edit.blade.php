@extends('layouts.admin')
@section('title')
إضافة مسمى وظيفي
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
                        <h4 class="card-title" id="basic-layout-form">تعديل المسمى الوظيفي</h4>
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
                                <p>يعتبر المسمى الوظيفي في النظام صلاحية المستخدم للدخول إلى الأقسام المختلفة</p>
                            </div>
                            <form class="form" action="{{ route('role.update',['role' => $role->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $role->id }}">

                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> معلومات المسمى الوظيفي</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1">المسمى الوظيفي</label>
                                                <input type="text" id="name" name="name" value="{{ $role->name }}" class="form-control" placeholder="اسم المسمى الوظيفي">
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <a href="{{ url()->previous() }}">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> إلغاء
                                            </button>
                                        </a>
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
