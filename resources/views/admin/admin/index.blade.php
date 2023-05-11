@extends('layouts.admin')
@section('title')
كل الاختصاصات
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
              <h4 class="card-title">كل الاختصاصات</h4>
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
                <p class="card-text">جميع اختصاصات الهيئة السورية للاختصاصات الطبية</p>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>الاسم</th>
                      <th>اسم الأب</th>
                      <th>تاريخ الميلاد</th>
                      <th>مكان العمل </th>
                      <th>المسمى الوظيفي</th>
                      <th>الإجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php($i=1)
                      @foreach ($users as $user)
                      <tr>
                        <th>{{ $i++ }}</th>
                        <td>{{ $user->name }} {{ $user->last_name }}</td>
                        <td>{{ $user->father }}</td>
                        <td>{{ $user->birthdate }}</td>
                        <td>{{ $user->workplace }}</td>
                        <td>
                          @foreach ($user->roles as $role)
                          {{ $role->name }} ,
                          @endforeach

                        </td>
                        <td><a href="{{ route('user.edit',['user'=>$user->id]) }}"><i class="ft-edit" style="color: rgb(255, 104, 4);"></i></i></a><a href=""> <i class="ft-eye" style="color: rgb(4, 173, 245);"></i></a> <i class="ft-delete" style="color: rgb(251, 5, 1);"></i></td>
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
