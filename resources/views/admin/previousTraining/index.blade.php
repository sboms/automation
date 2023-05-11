@extends('layouts.admin')
@section('title')
كل التدريبات السابقة
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
              <h4 class="card-title">التردربيات السابقة</h4>
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
                <p class="card-text">كل التدريبات السابقة للمقيم {{ $resident->User->name }} {{ $resident->User->last_name }} </p>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>البدء</th>
                      <th>الإنفكاك</th>
                      <th>المركز </th>
                      <th> مكان المركز </th>
                      <th>المشرف</th>
                      <th>رقم المشرف </th>
                      <th>بريد المشرف </th>
                      <th>الاختصاص</th>
                      <th>الوثيقة</th>
                      <th>الإجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php($i=1)
                      @foreach ($previousTrainings as $previousTraining)
                      <tr>
                        <th>{{ $i++ }}</th>
                        <td>{{ $previousTraining->start_date }}</td>
                        <td>{{ $previousTraining->end_date }}</td>
                        <td>{{ $previousTraining->hospital_name }}</td>
                        <td>{{ $previousTraining->hospital_place }}</td>
                        <td>{{ $previousTraining->official_name }}</td>
                        <td>{{ $previousTraining->official_phone }}</td>
                        <td>{{ $previousTraining->official_email }}</td>
                        <td>{{ $previousTraining->pr_document }}</td>
                        <td>{{ $previousTraining->specialty_id }}</td>
                        <td><a href="{{ route('previousTraining.edit',['previousTraining'=>$previousTraining->id]) }}"><i class="ft-edit" style="color: rgb(255, 104, 4);"></i></i></a><a href=""> <i class="ft-eye" style="color: rgb(4, 173, 245);"></i></a> <i class="ft-delete" style="color: rgb(251, 5, 1);"></i></td>
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
