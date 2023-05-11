<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deprivation;
use App\Models\Exam;
use App\Models\Resident;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeprivationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resident $resident, Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('عرض كل العقوبات الامتحانية لمقيم')) {
            $specialtyId = $specialty->id;
            $specialtyExams = Exam::whereHas('Specialty', function ($q) use ($specialtyId) {
                $q->where('exams.specialty_id', '=', $specialtyId);
            })->get('id');
            $deprivations = $resident->Deprivations()->whereIn('deprivations.exam_id', $specialtyExams)->get();
            return view('admin.deprivation.index', compact('deprivations', 'resident', 'specialty'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Resident $resident, Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('إضافة عقوبة امتحانية لمقيم')) {
            $exams = Exam::where([['specialty_id', '=', $specialty->id], ['exam_date', '>', date(now())]])->get();
            return view('admin.deprivation.add', compact('resident', 'specialty', 'exams'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Resident $resident, Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('إضافة عقوبة امتحانية لمقيم')) {
            Deprivation::create([
                'reason' => $request->reason,
                'date' => $request->date,
                'resident_id' => $resident->id,
                'exam_id' => $request->exam_id,
            ]);
            return redirect()->back()->with('success', 'تم إضافة العقوبة بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deprivation  $deprivation
     * @return \Illuminate\Http\Response
     */
    public function show(Deprivation $deprivation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deprivation  $deprivation
     * @return \Illuminate\Http\Response
     */
    public function edit(Deprivation $deprivation)
    {
        if (Auth::user()->hasPermissionTo('تعديل عقوبة امتحانية لمقيم')) {
            //
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deprivation  $deprivation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deprivation $deprivation)
    {
        if (Auth::user()->hasPermissionTo('تعديل عقوبة امتحانية لمقيم')) {
            //
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deprivation  $deprivation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deprivation $deprivation)
    {
        if (Auth::user()->hasPermissionTo('حذف عقوبة امتحانية لمقيم')) {
            //
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
}
