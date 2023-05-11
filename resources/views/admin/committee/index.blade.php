@extends('layouts.admin')
@section('title')
كل المجالس
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
              <h4 class="card-title">كل المجالس العلمية</h4>
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
                <p class="card-text">جميع المجالس العلمية في الهيئة السورية للاختصاصات الطبية</p>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>اسم المجلس العلمي</th>
                      <th>اختصاص المجلس </th>
                      <th>رئيس المجلس</th>
                      <th>مسؤول المجلس</th>
                      <th>أعضاء المجلس</th>
                      <th>الإجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php($i=1)
                      @foreach ($committees as $committee)
                      <tr>
                        <th>{{ $i++ }}</th>
                        <td>{{ $committee->name }}</td>
                        <td>{{ $committee->Specialty->name }}</td>
                        <td>
                          @isset($committee->Users)
                          @foreach ($committee->Users  as $admin )
                                @if($admin->hasRole(6))
                                    {{ $admin->name }} {{ $admin->last_name }}
                                @endif
                            @endforeach
                          @endisset

                        </td>
                        <td>
                            @foreach ($committee->Users  as $admin )
                                @if($admin->hasRole(9))
                                    {{ $admin->name }} {{ $admin->last_name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($committee->Users  as $admin )
                                @if($admin->hasRole(7))
                                    {{ $admin->name }} {{ $admin->last_name }} ,
                                @endif
                            @endforeach
                        </td>

                        <td><a href="{{ route('committee.edit',['committee'=>$committee->id]) }}"><i class="ft-edit" style="color: rgb(255, 104, 4);"></i></i></a><a href=""> <i class="ft-eye" style="color: rgb(4, 173, 245);"></i></a> <i class="ft-delete" style="color: rgb(251, 5, 1);"></i></td>
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
