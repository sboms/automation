@extends('layouts.admin')
@section('title')
إضافة رسم امتحان
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
                        <h4 class="card-title" id="basic-layout-form">إضافة رسم امتحان</h4>
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
                                <p>إضافة رسم امتحان للمقيم {{ $resident->User->name }}{{ $resident->User->last_name }} عن امتحان {{ $exam->name }}</p>
                            </div>
                            <form class="form" action="{{ route('ExamFee.store',['exam'=>$exam->id,'resident'=>$resident->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-tag"></i> معلومات الرسم امتحان</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1"> القيمة </label>
                                                <input type="number" id="value" name="value" class="form-control" placeholder="قيمة المبلغ المدفوع " required>
                                                <span class="text-info">المبلغ الذي تم دفعه بالدولار الأمريكي </span><br />
                                                @error("value")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> تاريخ الدفع </label>
                                                <input type="date" id="payment_date" name="payment_date" class="form-control" placeholder="تاريخ الدفع " required>
                                                @error("payment_date")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> رقم الايصال</label>
                                                <input type="text" id="receipt_number" name="receipt_number" class="form-control" placeholder="رقم الايصال" required>
                                                @error("receipt_number")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="projectinput1"> صورة الايصال </label>
                                                <input type="file" id="receipt_image" name="receipt_image" class="form-control" placeholder="اسم الاختصاص" required>
                                                <span class="text-info">الرجاء تصوير إيصال الدفع بعد التوقيع الختم </span><br />
                                                @error("receipt_image")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> إلغاء
                                    </button>
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
