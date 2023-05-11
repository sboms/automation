<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Resident;
use App\Models\Result;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exam $exam)
    {
        if (Auth::user()->hasPermissionTo('عرض نتاج امتحان')) {
            $results = $exam->Results()->get();
            // if ($results->count()) {
            //     return redirect()->back()->with('warning', 'لم بتم إضافة درجات لهذا الامتحان');
            // }
            return view('admin.result.index', compact('results', 'exam'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exam $exam)
    {
        if (Auth::user()->hasPermissionTo('إضافة نتيجة امتحان')) {
            $residents = $this->rsidentsPaidExaminationFee($exam);
            // $examFees = $exam->ExamFees()->get();
            // foreach ($examFees as $examFee) {
            //     $residents->push($examFee->Resident()->first());
            // }
            return view('admin.result.add', compact('residents', 'exam'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Exam $exam)
    {
        if (Auth::user()->hasPermissionTo('إضافة نتيجة امتحان')) {
            $residents = $this->rsidentsPaidExaminationFee($exam);
            $specialty = Specialty::find($exam->specialty_id);
            $result = new Result();
            foreach ($residents as $resident) {
                $residentResulte = Result::where([['resident_id', '=', $resident->id], ['exam_id', '=', $exam->id]])->first();
                if ($residentResulte != null) {
                    $residentResulte->update([
                        'center_id' => $request['examCenters' . $resident->id],
                        'resident_id' => $resident->id,
                        'value' => $request['result' . $resident->id],
                    ]);
                } else {
                    $result = Result::Create([
                        'resident_id' => $resident->id,
                        'exam_id' => $exam->id,
                        'center_id' => $request['examCenters' . $resident->id],
                        'resident_id' => $resident->id,
                        'value' => $request['result' . $resident->id],
                    ]);
                }
                if ($exam->name == "سريري وشفوي" && $result->value > 59) {
                    $resident->Specialties()->updateExistingPivot($specialty->id, [
                        'status' => 'خريج',
                    ]);
                } elseif ($exam->name == "سريري وشفوي" && $result->value < 60) {
                    $resident->Specialties()->updateExistingPivot($specialty->id, [
                        'status' => 'أنهى التدريب',
                    ]);
                }
            }
            return redirect()->route('ExamResidents.create', ['exam' => $exam->id])->with('success', 'تم إضافة التائج بنتجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        if (Auth::user()->hasPermissionTo('تعديل نتيجة امتحانية')) {
            return view('admin.result.edit', compact('result'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        if (Auth::user()->hasPermissionTo('تعديل نتيجة امتحانية')) {
            $result->value = $request->value;
            $result->save();
            $exam = Exam::find($result->exam_id);
            $specialty = Specialty::find($exam->specialty_id);

            $resident = Resident::find($result->resident_id);
            if ($exam->name == "سريري وشفوي" && $result->value > 59) {
                $resident->Specialties()->updateExistingPivot($specialty->id, [
                    'status' => 'خريج',
                ]);
            } elseif ($exam->name == "سريري وشفوي" && $result->value < 60) {
                $resident->Specialties()->updateExistingPivot($specialty->id, [
                    'status' => 'أنهى التدريب',
                ]);
            }
            return redirect()->route('Result.index', ['exam' => $exam->id]);
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        if (Auth::user()->hasPermissionTo('حذف نتيجة امتحانية')) {
            $exam = Exam::find($result->exam_id);
            $specialty = Specialty::find($exam->specialty_id);
            $resident = Resident::find($result->resident_id);
            if ($exam->name == "سريري وشفوي") {
                $resident->Specialties()->updateExistingPivot($specialty->id, [
                    'status' => 'أنهى التدريب',
                ]);
            }
            $result->delete();
            return redirect()->back()->with('success', 'تم حذف الجلسة الامتحانية نتجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Get all Residents that paid exam fee
     *
     * @param  \App\Models\Exam $exam
     * @return Collection Of Residents
     */
    public function rsidentsPaidExaminationFee($exam)
    {

        $residents = collect();
        $examFees = $exam->ExamFees()->get();
        foreach ($examFees as $examFee) {
            $residents->push($examFee->Resident()->first());
        }
        return $residents;
    }
}
