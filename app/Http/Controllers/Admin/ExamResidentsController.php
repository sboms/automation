<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apology;
use App\Models\Exam;
use App\Models\Resident;
use App\Models\Result;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamResidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exam $exam)
    {
        if (Auth::user()->hasPermissionTo('كل المرشحين للامتحان')) {
            return view('admin.examResidents.index', compact('exam'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     *
     * Nominate residents for the exam
     * @param  \app\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function create(Exam $exam)
    {
        if (Auth::user()->hasPermissionTo('ترشيح مقيم لامتحان')) {
            $residents = "";
            $specialty = Specialty::find($exam->specialty_id);
            /**Resident Has Paid Exam Fee */
            $residentsIdsHasPaidExamFee = $this->residentsPaidExamFee($exam);

            /**Nominate residents for the exam  */
            $examResidentsIds = Resident::whereHas('exams', function ($q) use ($exam) {
                $q->where('exams.id', '=', $exam->id);
            })->get('id');
            $examResidents = $exam->Residents()->wherePivotNotIn('resident_id', $residentsIdsHasPaidExamFee)->get();
            /** Punished by deprivation of the exam */
            $deprivationResidentsIds = Resident::whereHas('deprivations', function ($q) use ($exam) {
                $q->where('deprivations.exam_id', '=', $exam->id);
            })->get('id');
            $deprivationResidents = Resident::whereHas('deprivations', function ($q) use ($exam) {
                $q->where('deprivations.exam_id', '=', $exam->id);
            })->get();

            /**Residents who apologize for the exam */
            $tureApologies = $this->tureApologies($exam);
            /**Residents Ids who apologize for the exam */
            $residentsHasTrueApologyIds = $this->residentsHasTrueApologyIds($exam);

            /**Resident Has Exam Fee */
            $residentsHasExamFee = $this->residentsHasExamFee($exam);

            /**Resident Exemption from first exam */
            $exemptionFromFirstExam = $this->residentsExemptionFromTheFirstlExamIds($specialty);

            /**Resident Exemption from Final exam */
            $exemptionFromFinalExam = $this->residentsExemptionFromTheFinalExamIds($specialty);

            /**Resident Has success resulte Ids */
            $residentsHasSuccessResulteIds = $this->residentsHasSuccessResulteIds($exam);
            /**Get All Resident  */
            if ($exam->name == "تقييمي") {
                $residents = Resident::whereHas('specialties', function ($q) use ($specialty) {
                    $q->where('specialties.id', '=', $specialty->id);
                    $q->where('resident_specialty.status', '=', 'مقيم');
                })->whereNotIn('id', $examResidentsIds)->whereNotIn('id', $deprivationResidentsIds)->whereNotIn('id', $residentsHasTrueApologyIds)->whereNotIn('id', $residentsHasSuccessResulteIds)->get();
            } elseif ($exam->name == "كتابي أولي") {
                $residents = Resident::whereHas('specialties', function ($q) use ($specialty) {
                    $q->where('specialties.id', '=', $specialty->id);
                    $q->where('resident_specialty.status', '=', 'مقيم');
                })->whereNotIn('id', $examResidentsIds)->whereNotIn('id', $exemptionFromFirstExam)->whereNotIn('id', $deprivationResidentsIds)->whereNotIn('id', $residentsHasTrueApologyIds)->whereNotIn('id', $residentsHasSuccessResulteIds)->get();
            } elseif ($exam->name == "كتابي نهائي") {
                $residents = Resident::whereHas('specialties', function ($q) use ($specialty) {
                    $q->where('specialties.id', '=', $specialty->id);
                    $q->where('resident_specialty.status', '=', 'أنهى التدريب');
                })->whereNotIn('id', $examResidentsIds)->whereNotIn('id', $exemptionFromFinalExam)->whereNotIn('id', $deprivationResidentsIds)->whereNotIn('id', $residentsHasTrueApologyIds)->whereNotIn('id', $residentsHasSuccessResulteIds)->get();
            } else {
                /**Get all rsident has success result in final exam */
                $residentsHasSuccessFinalExamIds = $this->residentsHasSuccessFinalExamIds();
                /**ResidentIds who has exemption from the final exam. */
                $residentsExemptionFromTheFinalExamIds = $this->residentsExemptionFromTheFinalExamIds($specialty);

                $residents = Resident::whereHas('specialties', function ($q) use ($specialty) {
                    $q->where('specialties.id', '=', $specialty->id);
                    $q->where('resident_specialty.status', '=', 'أنهى التدريب');
                })->whereIn('id', $residentsHasSuccessFinalExamIds)->orWhereIn('id', $residentsExemptionFromTheFinalExamIds)->whereNotIn('id', $examResidentsIds)->whereNotIn('id', $deprivationResidentsIds)->whereNotIn('id', $residentsHasTrueApologyIds)->whereNotIn('id', $residentsHasSuccessResulteIds)->get();
            }

            return view('admin.examResidents.add', compact('residents', 'exam', 'specialty', 'examResidents', 'deprivationResidents', 'tureApologies', 'residentsHasExamFee'));
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
        if (Auth::user()->hasPermissionTo('ترشيح مقيم لامتحان')) {
            $exam->Residents()->attach($request->residents);
            return redirect()->back();
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Exam $exam)
    {
        if (Auth::user()->hasPermissionTo('إلغاء ترسيح مقيم لامتحان')) {
            $resident = Resident::find($request->resident_id);
            $examFees = $resident->ExamFees()->where('exam_id', $exam->id)->get();
            if ($examFees->count() > 0) {
                return redirect()->back()->with('error', 'لقد قام المقيم بدفع رسوم الامتحان بالفعل لا يمكن إزالة الترشح للامتحان قبل حذف رسم الامتحان');
            }
            $exam->Residents()->detach($request->resident_id);
            return redirect()->back()->with('success', 'تم إزالة ترشيح المقيم بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Get a listing of the Residents that finish training
     *
     * @return Collection of Residents
     */
    public function finishTraining(Specialty $specialty)
    {
        $specialty->Residents()->where('resident_specialty.status', 'أنهى التدريب')->get();
        return view('admin.examResidents.index', compact('exam'));
    }

    /**
     * Get a listing of the Residents that Payment of fees
     *
     * @return Collection of Residents
     */
    public function residentsHasExamFee(Exam $exam)
    {
        $residentsHasExamFee = collect();
        $examFees = $exam->ExamFees()->get();
        foreach ($examFees as $fee) {
            $residentsHasExamFee->push($fee->Resident()->first());
        }
        return $residentsHasExamFee;
    }

    /**
     * Get a listing of the ResidentsIds who have an accepted apology
     *
     * @return Collection of Residents
     */
    public function residentsHasTrueApologyIds(Exam $exam)
    {
        $tureApologies = $exam->Apologies()->where('state', true)->get();
        $residentsHasTrueApologyIds = collect();
        foreach ($tureApologies as $apology) {
            /**Push Resident in Collection */
            $residentsHasTrueApologyIds->push($apology->Resident()->get('id'));
        }
        return $residentsHasTrueApologyIds;
    }

    /**
     * Get a listing of the True Apology
     *
     * @return Collection of Residents
     */
    public function tureApologies(Exam $exam)
    {
        $tureApologies = $exam->Apologies()->where('state', true)->get();
        return $tureApologies;
    }

    /**
     * Get a Collection of the Residente
     *
     * @return Collection of Residents
     */
    public function residentsHasSuccessResulte(Exam $exam)
    {
        $residents = collect();
        $resultes = $exam->Results()->where('value', '>', '59')->get();
        foreach ($resultes as $resulte) {
            $residents->push($resulte->Resident()->first());
        }
        return $residents;
    }

    /**
     * Get a Collection of the ResidentIds
     *
     * @return Collection of Residents
     */
    public function residentsHasSuccessResulteIds(Exam $exam)
    {
        $curntExamTpye = $exam->name;
        $allExamThatSameTypeIds = Exam::where('name', $curntExamTpye)->get('id');
        $resulteSuccessForCurrentExamName = Result::whereIn('exam_id', $allExamThatSameTypeIds)->where('value', '>', 59)->get();
        $residents = collect();
        foreach ($resulteSuccessForCurrentExamName as $resulte) {
            $residents->push($resulte->Resident()->get('id'));
        }
        return $residents;
    }

    /**
     * Get a Collection of the ResidentIds That success in Final exam.
     *
     * @return Collection of Residents
     */
    public function residentsHasSuccessFinalExamIds()
    {
        $allExamThatSameTypeIds = Exam::where('name', 'سريري وشفوي')->get('id');
        $resulteSuccessForCurrentExamName = Result::whereIn('id', $allExamThatSameTypeIds)->where('value', '>', 59)->get();
        $residents = collect();
        foreach ($resulteSuccessForCurrentExamName as $resulte) {
            $residents->push($resulte->Resident()->get('id'));
        }
        return $residents;
    }

    /**
     * Get a Collection of the ResidentIds who has exemption from the first exam exam.
     *
     * @return Collection of Residents
     */
    public function residentsExemptionFromTheFirstlExamIds(Specialty $specialty)
    {
        $residents = Resident::whereHas('specialties', function ($q) use ($specialty) {
            $q->where('specialties.id', '=', $specialty->id);
            $q->where('resident_specialty.status', '=', 'مقيم');
            $q->where('resident_specialty.first_exam', '=', false);
        })->get('id');
        return $residents;
    }
    /**
     * Get a Collection of the ResidentIds who has exemption from the final exam.
     *
     * @return Collection of Residents
     */
    public function residentsExemptionFromTheFinalExamIds(Specialty $specialty)
    {
        $residents = Resident::whereHas('specialties', function ($q) use ($specialty) {
            $q->where('specialties.id', '=', $specialty->id);
            $q->where('resident_specialty.status', '=', 'أنهى التدريب');
            $q->where('resident_specialty.final_exam', '=', false);
        })->get('id');
        return $residents;
    }

    /**
     * Get a Collection of the ResidentIds who has Paid exam fees.
     *
     * @return Collection of ResidentsIds
     */
    public function residentsPaidExamFee(Exam $exam)
    {
        return Resident::whereHas('ExamFees', function ($q) use ($exam) {
            $q->where('exam_fees.exam_id', '=', $exam->id);
        })->get('id');
    }
}
