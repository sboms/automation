<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apology;
use App\Http\Requests\StoreApologyRequest;
use App\Http\Requests\UpdateApologyRequest;
use App\Models\Exam;
use App\Models\Resident;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exam $exam)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exam $exam, Resident $resident)
    {
        if (Auth::user()->hasPermissionTo('إضافة اعتذار لمقيم')) {
            $apology = $resident->Apologies()->where('exam_id', $exam->id)->first();
            if ($apology) {
                return redirect()->route('Apology.edit', ['apology' => $apology->id])->with('warning', 'لدى المقيم اعتذار سابق عن الامتحان الحالي يمكنك تعديل الاعتذار');
            }
            return view('admin.Apology.add', compact('exam', 'resident'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApologyRequest $request, Exam $exam, Resident $resident)
    {
        if (Auth::user()->hasPermissionTo('إضافة اعتذار لمقيم')) {
            $apology = Apology::create([
                'date' => $request->date,
                'state' => $request->state,
                'reason' => $request->reason,
                'explan' => $request->explan,
                'comment' => $request->comment,
                'resident_id' => $resident->id,
                'exam_id' => $exam->id,
            ]);
            if ($request->allfile != null) {

                $apology->allfile = $request->file('allfile')->store('Apology', 'public');
                $apology->save();
            }
            $message = "تم إضافة الاعتذار المرفوض بنجاح";
            if ($apology->state) {
                $message = "تم إضافة الاعتذار المقبول وتم إلغاء ترشح المقيم للمتحان";
                $exam->Residents()->detach($resident->id);
            }
            return redirect()->route('ExamResidents.create', ['exam' => $exam->id])->with('success', $message);
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apology  $apology
     * @return \Illuminate\Http\Response
     */
    public function show(Apology $apology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apology  $apology
     * @return \Illuminate\Http\Response
     */
    public function edit(Apology $apology)
    {
        if (Auth::user()->hasPermissionTo('تعديل اعتذار لمقيم')) {
            return view('admin.Apology.edit', compact('apology'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApologyRequest  $request
     * @param  \App\Models\Apology  $apology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApologyRequest $request, Apology $apology)
    {
        if (Auth::user()->hasPermissionTo('تعديل اعتذار لمقيم')) {
            //dd($request->state);
            $exam = $apology->Exam()->first();
            $resident = $apology->Resident()->first();
            $apology->date   = $request->date;
            $apology->reason = $request->reason;
            $apology->explan = $request->explan;
            $apology->comment = $request->comment;
            if ($request->file('allfile') != null) {
                try {
                    Storage::disk('public')->delete($apology->allfile);
                } catch (Exception $e) {
                }
                $apology->allfile = $request->file('allfile')->store('Apology', 'public');;
            }
            /** apology is acceptable and request is unacceptable */
            if ($apology->state && ($request->state == "false")) {
                $apology->state = $request->state;
                $exam->Residents()->attach($resident->id);
            }

            /** apology is unacceptable and request is acceptable */
            if (!$apology->state && ($request->state == "true")) {
                $apology->state = $request->state;
                $exam->Residents()->detach($resident->id);
            }
            $apology->save();

            return redirect()->route('ExamResidents.create', ['exam' => $exam->id])->with('success', 'تم تعديل الاعتذار بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apology  $apology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apology $apology)
    {
        if (Auth::user()->hasPermissionTo('حذف اعتذار لمقيم')) {
            $exam = $apology->Exam()->first();
            $resident = $apology->Resident()->first();
            // $examFeeCount=$resident->ExamFees()->where('exam_id', $exam->id)->count();
            // if ($examFeeCount) {
            //     return redirect()->back()->with('erorr', 'لقد قام المقيم بدفع رسوم الامتحان لايمكن حذف الاعتذار قبل حذف رسم الامتحان');
            // }
            /** apology is acceptable and request is unacceptable */
            if ($apology->state) {
                $exam->Residents()->attach($resident->id);
            }
            try {
                Storage::disk('public')->delete($apology->allfile);
            } catch (Exception $e) {
            }
            $apology->delete();
            return redirect()->route('ExamResidents.create', ['exam' => $exam->id])->with('success', 'تم حذف الاعتذار ينجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
}
