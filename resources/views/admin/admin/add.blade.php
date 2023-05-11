@extends('layouts.admin')
@section('title')
إضافة موظف
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
                        <h4 class="card-title" id="basic-layout-form">إضافة موظف</h4>
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
                                <p>........</p>
                            </div>
                            <form class="form" action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> معلومات شخصية</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">الاسم</label>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="الاسم ">
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">العائلة</label>
                                                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="العائلة">
                                                @error("last_name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">تاريخ الميلاد</label>
                                            <input type="date" id="birthdate" class="form-control" placeholder="تاريخ الميلاد" name="birthdate">
                                            @error("birthdate")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">مكان الولادة</label>
                                            <input type="text" id="birthplace" class="form-control" placeholder="مكان الولادة" name="birthplace">
                                            @error("birthplace")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">اسم الأب</label>
                                            <input type="text" id="father" class="form-control" placeholder="اسم الأب" name="father">
                                            @error("father")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">اسم الأم</label>
                                            <input type="text" id="mother" class="form-control" placeholder="اسم الأم" name="mother">
                                            @error("mother")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">البريد الإلكتروني</label>
                                            <input type="email" id="email" class="form-control" placeholder="البريد الإلكتروني" name="email">
                                            @error("email")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">كلمة المرور</label>
                                            <input type="text" id="password" class="form-control" placeholder="كلمة المرور" name="password">
                                            @error("password")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="projectinput4">الجنس</label>
                                        <div class="form-group">
                                            <label for="projectinput5">ذكر</label>
                                            <input type="radio" name="gender" value="ذكر" id="gender" class="form-control" checked>
                                        </div>
                                        <div class="form-group">
                                            <label for="projectinput5">أنثى</label>
                                            <input type="radio" name="gender" value="أنثى" id="gender" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section"><i class="ft-alert-circle"></i> المعلومات المهنية</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">مكان العمل الحالي</label>
                                            <input type="text" id="workplace" class="form-control" placeholder="مكان العمل الحالي" name="workplace">
                                            @error("workplace")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">المسمى الوظيفي</label>
                                            <select class="select2 form-control" multiple="multiple" id="location2" name="role[]">
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error("role")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
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
