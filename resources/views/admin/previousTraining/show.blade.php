@extends('layouts.admin')
@section('title')
التدريبات السابقة
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
              <h4 class="card-title">كل تدريبات المقيم  السابقة</h4>
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
                <p class="card-text">{{ $resident->User->name }} {{ $resident->User->last_name }}</p>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>تاريخ البداية</th>
                      <th>تاريخ النهاية</th>
                      <th>مركز التدريب</th>
                      <th>مكان المركز</th>
                      <th>   مشرف التدريب   </th>
                      <th>معلومات التواصل</th>
                      <th>الإجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php($i=1)
                      @foreach ($resident->PreviousTrainings as $PreviousTraining)
                      <tr>
                        <th>{{ $i++ }}</th>
                        <td>{{ $PreviousTraining->start_date }}</td>
                        <td>{{ $PreviousTraining->end_date }}</td>
                        <td>{{ $PreviousTraining->hospital_name }}</td>
                        <td>{{ $PreviousTraining->hospital_place }}</td>
                        <td>{{ $PreviousTraining->official_name }}</td>
                        <td>{{ $PreviousTraining->official_email }}  {{ $PreviousTraining->official_phone }}</td>
                        <td><a href="{{ route('previousTraining.edit',['prId'=>$PreviousTraining->id]) }}"><i class="ft-edit" style="color: rgb(255, 104, 4);"></i></i></a><a href=""> <i class="ft-eye" style="color: rgb(4, 173, 245);"></i></a> <i class="ft-delete" style="color: rgb(251, 5, 1);"></i></td>
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
