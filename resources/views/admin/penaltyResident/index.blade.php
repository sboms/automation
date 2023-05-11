@extends('layouts.admin')
@section('title')
كل عقوبات المقيم في الاختصاص
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
                    <h4 class="card-title">العقوبات الوظيفية</h4>
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
                        <p class="card-text">كل عقوبات المقيم {{ $resident->User->name }} {{ $resident->User->last_name }} في اختصاص {{ $specialty->name }}</p>
                    </div>
                    <div class="col-sm-12 col-lg-4 col-xl-2" style="float: left;">
                        <ul class="pl-0 list-unstyled">
                            <li class="mb-1">
                                <a href="{{ route('penaltyResident.create',['resident'=>$resident->id,'specialty'=>$specialty->id]) }}">
                                    <button type="button" class="btn btn-info btn-block">إضافة عقوبة </button>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>العقوبة</th>
                                    <th>تاريخ البداية </th>
                                    <th>تاريخ النهاية</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($penalties as $penalty)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $penalty->name }}</td>
                                    <td>{{ $penalty->pivot->start }}</td>
                                    <td>{{ $penalty->pivot->end}}</td>

                                    <td>
                                        <a href="{{ route('penaltyResident.edit',['resident' =>$resident->id,'specialty' =>$specialty->id,'penalty' =>$penalty->id]) }}">
                                            <button type="button" class="btn btn-outline-info  btn-lg" data-toggle="modal" data-backdrop="false" data-target="#info">
                                                تعديل
                                            </button>
                                        </a>
                                        </a>
                                        <a>
                                            <button type="button" class="btn btn-outline-danger  btn-lg" data-toggle="modal" data-target="#danger{{ $penalty->id }}" city-id={{ $penalty->id }}>
                                                حذف
                                            </button>
                                        </a>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <!-- Modal -->
                                                <div class="modal fade text-left" id="danger{{ $penalty->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger white">
                                                                <h4 class="modal-title white" id="myModalLabel10">حذف مسمى وظيفي</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">


                                                                <h5>هل أنت متأكد من أنك تريد حذف العقوبة</h5>

                                                                <ul>
                                                                    <li>{{ $penalty->name }}</li>
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إلغاء</button>
                                                                <form action="{{ route('penaltyResident.destroy',['resident'=>$resident->id,'specialty'=>$specialty->id,'penalty'=>$penalty->id]) }}" method="post">
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
