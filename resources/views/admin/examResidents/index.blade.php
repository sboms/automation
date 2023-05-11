@extends('layouts.admin')
@section('title')
الامتحانات
@endsection
@section('content')
      <div class="content-body">
        @include('admin.alerts.errors')
        @include('admin.alerts.success')
        @include('admin.alerts.warning')
      <!-- Bordered striped start -->
      {{--  <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>المقيمن في الاختصاص المتحمل ترشحهم للإمتحان </h4>
                        <span class="badge badge-primary"><a href="">إضافة رسوم الامتحان</a></span>
                    </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card col-lg-12">
                                    <div class="card-title">
                                        <h4>{{ $arr['exam']->name }} في اختصاص : </h4>
                                        <h4>{{ $arr['exam']->Specialty->name }} </h4>

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover ">
                                                <thead>
                                                    <tr>
                                                        <th>اختر المرشحين</th>
                                                        <th>#</th>
                                                        <th>اسم المقيم</th>
                                                        <th>مراجعة معلومات المقيم</th>
                                                        <th>الاختصاص</th>


                                                    </tr>
                                                </thead>
                                                <form action="" method='POST'>
                                                    @csrf
                                                    <tbody>
                                                        @foreach($arr['residents'] as $resident)
                                                        <tr>
                                                            <td><input type="checkbox" name="residents[]" id="residents" value="{{ $resident->id }}" ></td>
                                                            <td scope="row">{{ $resident->id }}</td>
                                                            <td>{{ $resident->User->name }}</td>
                                                            <td>
                                                                @foreach ($resident->Specialtis as $Specialty)
                                                                    @if ($Specialty->id == $arr['exam']->Specialty->id)
                                                                        {{ $Specialty->pivot->commencement_date }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{ $arr['exam']->Specialty->name }}</td>
                                                            {{-- <td>
                                                                <label style="visibility: hidden">{{  $isPayed=false  }}</label>
                                                                @foreach ($arr['examfees'] as $examfee)
                                                                    @if ($resident->id == $examfee->resident_id)
                                                                        <span class="badge badge-success">
                                                                            <a href="#">تم </a>
                                                                        </span>
                                                                        <label style="visibility: hidden">{{ $isPayed=true }}</label>
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                                @if (!$isPayed)
                                                                    <span class="badge badge-danger">
                                                                        <a href="">لم يدفع </a>
                                                                    </span>
                                                                @endif

                                                                {{-- {{ route('Delete.Exam',['id'=>$exam->id]) }}
                                                            </td> --}}

                                                            {{-- <td><span class="badge badge-primary"><a href="{{ route('Edit.Exam',['id'=>$exam->id]) }}">تعديل</a></span> | <span class="badge badge-danger"><a href="{{ route('Delete.Exam',['id'=>$exam->id]) }}">حذف</a></span> </td> --}}
                                                        {{--  </tr>
                                                        @endforeach

                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td>
                                                                <input type="submit"  class=" badge-success" value="إضافة إلى قائمة المرشحين">
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /# card -->
                            </div>
                        </div>

                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
      </section>  --}}
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">كل الامتحانات </h4>
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
                <p class="card-text"></p>
                <div class="col-sm-12 col-lg-4 col-xl-2" style="float: left;">
                    <ul class="pl-0 list-unstyled">
                      <li class="mb-1">
                        <a href="{{ route('exam.create') }}">
                            <button type="button" class="btn btn-info btn-block">إضافة إجازة </button>
                        </a>
                      </li>
                    </ul>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>الامتحان</th>
                      <th>التاريخ </th>
                      <th>الاختصاص</th>
                      <th>الدورة</th>
                      <th>المراكز</th>
                      <th>الإجراء</th>
                    </tr>
                  </thead>
                  <tbody>

                      <tr>
                        <th>{{  }}</th>
                        <td>{{  }}</td>
                        <td>{{  }}</td>
                        <td>{{  }}</td>
                        <td>{{ }}</td>
                        <td>

                        </td>
                        <td>
                            <a href="{{ route('specialty.residents', ['specialty' => $specialty->id]) }}">
                                <button type="button" class="btn btn-outline-success  btn-lg" data-toggle="modal" data-backdrop="false" data-target="#info">
                                    المقيمين
                                </button>
                            </a>
                            <a href="{{route('specialty.edit',['specialty'=>$specialty->id]) }}">
                                <button type="button" class="btn btn-outline-info  btn-lg" data-toggle="modal" data-backdrop="false" data-target="#info">
                                    تعديل
                                </button>
                            </a>
                            </a>
                            <a>
                                <button type="button" class="btn btn-outline-danger  btn-lg" data-toggle="modal" data-target="#danger{{ $specialty->id }}" city-id={{ $specialty->id }}>
                                    حذف
                                </button>
                            </a>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <!-- Modal -->
                                    <div class="modal fade text-left" id="danger{{ $specialty->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
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
                                                        <li> لن يتم حذف أي اختصاص لديه مقيم أو خريجين </li>
                                                        <li>في حال كنت متأكد من أنك تريد حذف هذا الاختصاص عليك أولاً اخراج المقيمين من الاختصاص</li>
                                                    </ul>
                                                    <hr>
                                                    <h5>هل أنت متأكد من أنك تريد حذف معلومات  الاختصاص</h5>
                                                    <ul>
                                                        <li>{{ $specialty->name }}</li>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إلغاء</button>
                                                    <form action="{{ route('specialty.destroy',['specialty' => $specialty->id]) }}" method="post">
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
                        </td>                      </tr>
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
