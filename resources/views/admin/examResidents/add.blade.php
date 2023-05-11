@extends('layouts.admin')
@section('title')
ترشيح الامقمين إلى امتحان
@endsection
@section('content')
<div class="content-body">
    @include('admin.alerts.errors')
    @include('admin.alerts.success')
    @include('admin.alerts.warning')
    <!-- Start Add Resident To Exam  -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">ترشيخ المقينين</h2>
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
                        <p class="card-text">ترشيح المقمين في اختصاص <label style="color: rgb(6, 133, 230)">{{ $specialty->name  }}</label> إلى امتحان <label style="color: rgb(6, 133, 230)">{{ $exam->name }}</label></p>
                    </div>
                    <div class="table-responsive col-12">
                        <form class="form" action="{{ route('ExamResidents.store',['exam'=>$exam->id]) }}" method="POST">
                            @csrf
                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>اسم الأب </th>
                                        <th>اسم الأم </th>
                                        <th>الرقم </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($residents as $resident)
                                    <tr>
                                        <th><input type="checkbox" name="residents[]" id="residents" value="{{ $resident->id }}"></th>
                                        <th>{{ $resident->User->name }} {{ $resident->User->last_name }}</th>

                                        <td>{{ $resident->User->father }}</td>
                                        <td>{{ $resident->User->mother }}</td>
                                        <td>{{ $specialty->code }}
                                            @foreach ($resident->Specialties as $cuSpecialty)
                                            {{ $cuSpecialty->id == $specialty->id ? $cuSpecialty->pivot->registration_number : "" }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <button type="submit" class="btn btn-outline-success  btn-lg" data-toggle="modal" data-backdrop="false" data-target="#info">
                                    ترشيح المقيمين الذين تم اختيارهم
                                </button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  End Add Resident To Exam  -->
    <!-- Start Added Resident To Exam  -->
    <div class="row">
        @if($examResidents->count() > 0 )
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">الرشحين للامتحان </h2>
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
                        <p class="card-text">المقيمين الذين تم ترشيحهم للامتحان <label style="color: rgb(230, 111, 6)">{{ $exam->name }}</label> في اختصاص <label style="color: rgb(230, 111, 6)">{{ $specialty->name  }}</label></p>
                    </div>
                    <div class="table-responsive col-12">

                        <table class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم الثلاثي</th>
                                    <th>الرقم </th>
                                    <th>إزالة </th>
                                    <th>اعتذار </th>
                                    <th>دفع الرسوم </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=0)
                                @foreach ($examResidents as $resident)
                                <tr>
                                    <th>{{ ++$i }}</th>
                                    <th>{{ $resident->User->name }} {{ $resident->User->father }} {{ $resident->User->last_name }}</th>
                                    <td>{{ $specialty->code }}
                                        @foreach ($resident->Specialties as $cuSpecialty)
                                        {{ $cuSpecialty->id == $specialty->id ? $cuSpecialty->pivot->registration_number : "" }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a>
                                            <button type="button" class="btn btn-outline-danger  btn-lg" data-toggle="modal" data-target="#danger{{ $resident->id }}" city-id={{ $resident->id }}>
                                                إزالة
                                            </button>
                                        </a>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <!-- Modal -->
                                                <div class="modal fade text-left" id="danger{{ $resident->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger white">
                                                                <h4 class="modal-title white" id="myModalLabel10">حذف مسمى وظيفي</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>تنبيه قبل الإزالة</h5>

                                                                <h5>هل أنت متأكد من أنك تريد إلفاء ترشيح المقيم إلى الاختصاص</h5>
                                                                <ul>
                                                                    <li>المقيم: {{ $resident->User->name }} {{ $resident->User->father }} {{ $resident->User->last_name }}</li>
                                                                    <li>الامتحان: {{ $exam->name }} </li>
                                                                    <li>تاريخ الامتحان: {{ $exam->exam_date }} </li>

                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إلغاء</button>
                                                                <form action="{{ route('ExamResidents.destroy',['exam'=>$exam->id]) }}" method="post">
                                                                    @csrf
                                                                    @method("DELETE")
                                                                    <input type="hidden" name="resident_id" value="{{ $resident->id }}">
                                                                    <button type="submit" class="btn btn-outline-danger">تأكد الإزالة </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('Apology.create',['exam'=>$exam->id,'resident'=>$resident->id]) }}">
                                            <button type="button" class="btn btn-outline-info btn-lg">
                                                اعتذار
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('ExamFee.create',['exam'=>$exam->id,'resident'=>$resident->id]) }}">
                                            <button type="button" class="btn btn-outline-success btn-lg">
                                                دفع الرسوم
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>

                    </div>
                </div>
            </div>
        </div>
        @endif


        <!--  End Added Resident To Exam  -->
        <!-- Start deprivationResidents  -->
        @if($deprivationResidents->count() > 0)
        <div class="col-6">
            <div class="card" style="background-color: rgb(255, 236, 236)">
                <div class="card-header" style="background-color: rgb(255, 209, 209)">
                    <h2 class="card-title">المقافبين بالحرمان من الامتحان </h2>
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
                        <p class="card-text" style="color: black">المقيمين الذين تم ترشيحهم للامتحان <label style="color: rgb(230, 111, 6)">{{ $exam->name }}</label> في اختصاص <label style="color: rgb(230, 111, 6)">{{ $specialty->name  }}</label></p>
                    </div>
                    <div class="table-responsive col-12">
                        <form class="form" action="{{ route('ExamResidents.store',['exam'=>$exam->id]) }}" method="POST">
                            @csrf
                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>اسم الأب </th>
                                        <th>اسم الأم </th>
                                        <th>الرقم </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=0)
                                    @foreach ($deprivationResidents as $resident)
                                    <tr>
                                        <th>{{ ++$i }}</th>
                                        <th>{{ $resident->User->name }} {{ $resident->User->last_name }}</th>

                                        <td>{{ $resident->User->father }}</td>
                                        <td>{{ $resident->User->mother }}</td>
                                        <td>{{ $specialty->code }}
                                            @foreach ($resident->Specialties as $cuSpecialty)
                                            {{ $cuSpecialty->id == $specialty->id ? $cuSpecialty->pivot->registration_number : "" }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!--  End deprivationResidents   -->
        <!-- Start Exam Fee  -->
        @if($residentsHasExamFee->count() > 0)
        <div class="col-6">
            <div class="card" style="background-color: rgb(234, 255, 231)">
                <div class="card-header" style="background-color: rgb(189, 255, 180)">
                    <h2 class="card-title">القيمين الذين دفعوا رسوم الامتحان</h2>
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
                        <p class="card-text" style="color: black">المقيمين الذين دفعوا رسوم الامتحان <label style="color: rgb(230, 111, 6)">{{ $exam->name }}</label> في اختصاص <label style="color: rgb(230, 111, 6)">{{ $specialty->name  }}</label></p>
                    </div>
                    <div class="table-responsive col-12">
                        <form class="form" action="{{ route('ExamResidents.store',['exam'=>$exam->id]) }}" method="POST">
                            @csrf
                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>الرقم</th>
                                        <th>الإجراء </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=0)
                                    @foreach ($residentsHasExamFee as $resident)
                                    <tr>
                                        <th>{{ ++$i }}</th>
                                        <th>{{ $resident->User->name }} {{ $resident->User->last_name }}</th>
                                        <td>{{ $specialty->code }}
                                            @foreach ($resident->Specialties as $cuSpecialty)
                                            {{ $cuSpecialty->id == $specialty->id ? $cuSpecialty->pivot->registration_number : "" }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('ExamFee.edit',['exam' =>$exam->id,'resident'=>$resident->id]) }}">
                                                <button type="button" class="btn btn-outline-info  btn-lg" data-toggle="modal" data-backdrop="false" data-target="#info">
                                                    تعديل
                                                </button>
                                            </a>
                                            </a>
                                            <a>

                                                <button type="button" class="btn btn-outline-danger  btn-lg" data-toggle="modal" data-target="#danger{{ $resident->id }}" city-id={{ $resident->id }}>
                                                    حذف
                                                </button>
                                            </a>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <!-- Modal -->
                                                    <div class="modal fade text-left" id="danger{{ $resident->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger white">
                                                                    <h4 class="modal-title white" id="myModalLabel10">حذف مسمى وظيفي</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h5>تنبيه قبل الحذف</h5>
                                                                    <ul>
                                                                        <li> لن يتم الرسوم طالما حصل المقيم على درجة في الامتحان المتقدم إليه </li>
                                                                    </ul>
                                                                    <hr>
                                                                    <h5>هل أنت متأكد من أنك تريد حذف معلومات إيصال الدفع للمقيم </h5>
                                                                    <ul>
                                                                        <li>{{ $resident->User->name }} {{ $resident->User->last_name }}</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إلغاء</button>
                                                                    <form action="{{ route('ExamFee.destroy',['exam' =>$exam->id,'resident'=>$resident->id]) }}" method="post">
                                                                        @csrf
                                                                        @method("DELETE")
                                                                        <button type="submit" class="btn btn-outline-danger">تأكد الحذف </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                        </form>
                        <a href="{{ route('Result.create',['exam'=>$exam->id]) }}">
                            <button type="button" class="btn btn-outline-success btn-lg">
                                إضافة نتائج الامتحان
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!--  End Exam Fees   -->
        <!-- Start apologResidents  -->
        @if($tureApologies->count() > 0)
        <div class="col-6">
            <div class="card" style="background-color: rgba(180, 251, 213, 0.668)">
                <div class="card-header" style="background-color: rgb(180, 251, 213)">
                    <h2 class="card-title">المعتذرين عن الامتحان</h2>
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
                        <p class="card-text" style="color: black">المقيمين الذين تم قبول اعتذارهم عن الامتحان <label style="color: rgb(230, 111, 6)">{{ $exam->name }}</label> في اختصاص <label style="color: rgb(230, 111, 6)">{{ $specialty->name  }}</label></p>
                    </div>
                    <div class="table-responsive col-12">
                        <form class="form" action="{{ route('ExamResidents.store',['exam'=>$exam->id]) }}" method="POST">
                            @csrf
                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>اسم الأب </th>
                                        <th>الرقم </th>
                                        <th>الاعتذار</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=0)
                                    @foreach ($tureApologies as $apology)
                                    <tr>
                                        <th>{{ ++$i }}</th>
                                        <th>{{ $apology->Resident->User->name }} {{ $apology->Resident->User->last_name }}</th>

                                        <td>{{ $apology->Resident->User->father }}</td>
                                        <td>{{ $specialty->code }}
                                            @foreach ($apology->Resident->Specialties as $cuSpecialty)
                                            {{ $cuSpecialty->id == $specialty->id ? $cuSpecialty->pivot->registration_number : "" }}
                                            @endforeach
                                        </td>
                                        <td> <a href="{{ route('Apology.edit',['apology'=>$apology->id]) }}"> <label class="btn btn-info">تعديل</label></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Start apologResidents  -->
        @if($exam->Results->count() > 0)
        <div class="col-6">
            <div class="card" style="background-color: rgba(185, 180, 251, 0.668)">
                <div class="card-header" style="background-color: rgb(185, 180, 251)">
                    <h2 class="card-title"> نتائج الامتحان </h2>
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
                        <p class="card-text" style="color: black">المقيمين الذين تم قبول اعتذارهم عن الامتحان <label style="color: rgb(230, 111, 6)">{{ $exam->name }}</label> في اختصاص <label style="color: rgb(230, 111, 6)">{{ $specialty->name  }}</label></p>
                    </div>
                    <div class="table-responsive col-12">
                        <form class="form" action="{{ route('ExamResidents.store',['exam'=>$exam->id]) }}" method="POST">
                            @csrf
                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>اسم الأب </th>
                                        <th>الرقم </th>
                                        <th>النتيجة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=0)
                                    @foreach ($exam->Results as $result)
                                    <tr>
                                        <th>{{ ++$i }}</th>
                                        <th>{{ $result->Resident->User->name }} {{ $result->Resident->User->last_name }}</th>

                                        <td>{{ $result->Resident->User->father }}</td>
                                        <td>{{ $specialty->code }}
                                            @foreach ($result->Resident->Specialties as $cuSpecialty)
                                            {{ $cuSpecialty->id == $specialty->id ? $cuSpecialty->pivot->registration_number : "" }}
                                            @endforeach
                                        </td>
                                        <td>{{ $result->value    }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- End apologResidents  -->
    </div>
    <!--  End apologResidents  -->
</div>
@endsection
