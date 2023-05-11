@extends('layouts.admin')
@section('title')
المراكز الامتحانية
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
              <h4 class="card-title">كل المراكز الامتحانية </h4>
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
                        <a href="{{ route('examCenter.create') }}">
                            <button type="button" class="btn btn-info btn-block">إضافة مركز </button>
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
                      <th>الاسم</th>
                      <th>المكان</th>
                      <th>النوع</th>
                      <th>الإجراء</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php($i=1)
                      @foreach ($examCenters as $examCenter)
                      <tr>
                        <th>{{ $i++ }}</th>
                        <td>{{ $examCenter->name }}</td>
                        <td>{{ $examCenter->place }}</td>
                        <td>{{ $examCenter->type }}</td>
                        <td><a href="{{ route('examCenter.edit',['examCenter'=>$examCenter->id]) }}"><i class="ft-edit" style="color: rgb(255, 104, 4);"></i></i></a><a href=""> <i class="ft-eye" style="color: rgb(4, 173, 245);"></i></a> <i class="ft-delete" style="color: rgb(251, 5, 1);"></i></td>
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
