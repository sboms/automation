@extends('layouts.admin')
@section('title')
تعديل معلومات مجلس علمي
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
                        <h4 class="card-title" id="basic-layout-form">تعديل معلومات المجلس العلمي</h4>
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
                                <p>....</p>
                            </div>
                            <form class="form" action="{{ route('committee.update',['committee' => $committee->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $committee->id }}">

                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> معلومات المجلس العلمي</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">اسم المجلس </label>
                                                <input type="text" id="name" name="name" value="{{ $committee->name }}" class="form-control" placeholder="اسم المجلس العلمي">
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">اختصاص المجلس </label>
                                                <select class="custom-select form-control" id="location2" name="specialty_id">
                                                    @foreach ($specialties as $specialty)
                                                    <option value="{{ $specialty->id }}" {{ $specialty->id == $committee->Specialty->id ? "selected" : "" }}>{{ $specialty->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error("specialty_id")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-tag"></i>إضافة أعضاء المجلس العلمي</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رئيس المجلس العلمي</label>
                                                        <select class="custom-select form-control" id="location2" name="adminCommittee">
                                                            <option>اختر رئيس المجلس العلمي</option>
                                                            @foreach ($adminCommittee as $user)
                                                            <option value="{{ $user->id }}" @foreach ($committee->Users as $coUser)
                                                                {{ $user->id == $coUser->id ? 'selected' : '' }}
                                                                @endforeach
                                                                >{{ $user->name }} {{ $user->last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error("name_en")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">أعضاء المجلس العلمي</label>
                                                        <select class="select2 form-control" multiple="multiple" id="location2" name="membersCommittee[]">
                                                            <optgroup>اختر أعضاء المجلس العلمي
                                                                @foreach ($membersCommittee as $user)
                                                                <option value="{{ $user->id }}" @foreach ($committee->Users as $coUser)
                                                                    {{ $user->id == $coUser->id ? 'selected' : '' }}
                                                                    @endforeach
                                                                    >{{ $user->name }} {{ $user->last_name }}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                        @error("name_en")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">سكتير المجلس العلمي</label>
                                                        <select class="custom-select form-control" id="location2" name="secretaryCommittee">
                                                            <option>اختر سكرتير المجلس العلمي</option>
                                                            @foreach ($secretaryCommittee as $user)
                                                            <option value="{{ $user->id }}" @foreach ($committee->Users as $coUser)
                                                                {{ $user->id == $coUser->id ? 'selected' : '' }}
                                                                @endforeach
                                                                >{{ $user->name }} {{ $user->last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error("name_en")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
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
