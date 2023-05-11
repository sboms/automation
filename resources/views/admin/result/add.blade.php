@extends('layouts.admin')
@section('title')
تنائج الامتحان
@endsection
@section('content')
<div class="content-body">
    @include('admin.alerts.errors')
    @include('admin.alerts.success')
    @include('admin.alerts.warning')
    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ادخل نتائج الامتحان</h4>
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
                        <h2 class="card-text">نتائج الامتحان {{ $exam->name }} في اختصاص {{ $exam->Specialty->name }} بتاريخ {{ $exam->exam_date }}</h2>

                    </div>
                    <div class="table-responsive">
                        <form class="form" action="{{ route('Result.store',['exam'=>$exam->id]) }}" method="POST">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم الثلاثي </th>
                                        <th>اسم الأم </th>
                                        <th>المركز</th>
                                        <th>الدرجة</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @csrf

                                    @foreach ($residents as $resident)
                                    <tr>
                                        <td>{{ $resident->id }}</td>
                                        <td>{{ $resident->User->name }} {{ $resident->User->father }} {{ $resident->User->last_name }}</td>
                                        <td>{{ $resident->User->mother }}</td>
                                        <td>
                                            <div class="form-group">
                                                <select class="select2" id="location2" name="examCenters{{ $resident->id }}" style="width: 90%" required>
                                                    @foreach ($exam->ExamCenters as $examCenmter)
                                                    <option value="{{ $examCenmter->id }}">{{ $examCenmter->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error("name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" min="0" max="100" id="result" name="result{{ $resident->id }}" class="form-control" placeholder="" required>
                                                @error("result")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="col-sm-12 col-lg-4 col-xl-2" style="float: left;">
                                <ul class="pl-0 list-unstyled">
                                    <li class="mb-1">
                                        <a href="{{ route('exam.create') }}">
                                            <button type="submit" class="btn btn-info btn-block">حفظ </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bordered striped end -->
</div>
</div>
</div>
</div>
@endsection
