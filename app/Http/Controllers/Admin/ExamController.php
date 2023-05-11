<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use App\Models\Exam;
use App\Models\ExamCenter;
use App\Models\Specialty;
use Auth;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل الامتحانات')) {
            $exams = Exam::all();
            return view('admin.exam.index', compact('exams'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasPermissionTo('إضافة امتحان')) {
            $currentYear = date('Y');
            $specialties = Specialty::all();
            $cycles = Cycle::whereYear('year', '>=', $currentYear)->get();
            $examCenmters = ExamCenter::all();
            return view('admin.exam.add', compact('specialties', 'cycles', 'examCenmters'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasPermissionTo('إضافة امتحان')) {
            $exam = Exam::create([
                'name' => $request->name,
                'exam_date' => $request->exam_date,
                'specialty_id' => $request->specialty,
                'cycle_id' => $request->cycle,
            ]);
            $exam->ExamCenters()->attach($request->examCenters);
            return redirect()->back()->with('success', 'تم إضافة الامتحان بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        if (Auth::user()->hasPermissionTo('تعديل امتحان')) {
            $specialties = Specialty::all();
            $cycles = Cycle::all();
            $examCenmters = ExamCenter::all();
            $curExamCenmters = $exam->ExamCenters()->get();
            return view('admin.exam.edit', compact('exam', 'specialties', 'cycles', 'examCenmters', 'curExamCenmters'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        if (Auth::user()->hasPermissionTo('تعديل امتحان')) {
            $exam->name = $request->name;
            $exam->exam_date = $request->exam_date;
            $exam->specialty_id = $request->specialty;
            $exam->cycle_id = $request->cycle;
            $exam->save();
            $exam->ExamCenters()->detach();
            $exam->ExamCenters()->attach($request->examCenters);
            return redirect()->back()->with('تم تعديل معلومات الامتحان بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}