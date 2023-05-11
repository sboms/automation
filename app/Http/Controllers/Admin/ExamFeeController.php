<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamFee;
use App\Models\Resident;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExamFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exam $exam)
    {
        if (Auth::user()->hasPermissionTo('عرض كل رسوم الامتحان')) {
            $examFees = $exam->ExamFees()->get();
            return view('admin.ExamFee.index', compact('examFees'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exam $exam, Resident $resident)
    {
        if (Auth::user()->hasPermissionTo('إضافة رسم امتحاني لقيم')) {
            $isResidentHasExamFee = $resident->ExamFees()->where('exam_id', $exam->id)->get();

            if ($isResidentHasExamFee->count()) {
                return redirect()->back()->with("warning", "لقد قام هذا القيم بدفع الرسوم بالفعل ");
            }
            return view('admin.ExamFee.add', compact('exam', 'resident'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Exam $exam, Resident $resident)
    {
        if (Auth::user()->hasPermissionTo('إضافة رسم امتحاني لقيم')) {
            $examFee = ExamFee::create([
                'value' => $request->value,
                'payment_date' => $request->payment_date,
                'receipt_number' => $request->receipt_number,
                'resident_id' => $resident->id,
                'exam_id' => $exam->id,
            ]);
            if ($request->receipt_image != null) {
                $examFee->receipt_image = $request->file('receipt_image')->store('ExamFee', 'public');
                $examFee->save();
            }
            return redirect()->route('ExamResidents.create', ['exam' => $exam->id])->with('success', "تم إضافة الاغتذار بنجاح");
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamFee  $examFee
     * @return \Illuminate\Http\Response
     */
    public function show(ExamFee $examFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamFee  $examFee
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam, Resident $resident)
    {
        if (Auth::user()->hasPermissionTo('تعديل رسم امتحاني لمقيم')) {
            $examFee = $resident->ExamFees()->where('exam_id', $exam->id)->first();
            return view('admin.ExamFee.edit', compact('examFee'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamFee  $examFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExamFee $examFee)
    {
        if (Auth::user()->hasPermissionTo('تعديل رسم امتحاني لمقيم')) {
            $examFee->value = $request->value;
            $examFee->payment_date = $request->payment_date;
            $examFee->receipt_number = $request->receipt_number;
            if ($request->file('receipt_image') != null) {
                try {
                    Storage::disk('public')->delete($examFee->receipt_image);
                } catch (Exception $e) {
                }
                $examFee->receipt_image = $request->file('receipt_image')->store('ExamFee', 'public');
            }
            $examFee->save();
            return redirect()->back();
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamFee  $examFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam, Resident $resident)
    {
        if (Auth::user()->hasPermissionTo('حذف رسم امتحاني لمقيم')) {
            $resulteCunt = $resident->Results()->where('exam_id', $exam->id)->count();
            if ($resulteCunt) {
                return redirect()->back()->with('error', 'المقيم لديه درجة في الامتحان الحالي احذف الدرحة أولاً');
            }
            return redirect()->back()->with('success', 'تم الحذف بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
}