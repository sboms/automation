<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreviousTraining;
use App\Models\Resident;
use App\Models\Specialty;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreviousTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resident $resident)
    {
        if (Auth::user()->hasPermissionTo('عرض كل التدريبات السابقة')) {
            $previousTrainings = $resident->PreviousTrainings()->get();
            return view('admin.previousTraining.index', compact('resident', 'previousTrainings'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($residentId)
    {
        if (Auth::user()->hasPermissionTo('إضافة تدريب سابق')) {
            $resident = Resident::find($residentId);
            $cuSpecialty = $resident->Specialties()->first();
            $specialties = Specialty::all();
            return view('admin.previousTraining.add', compact('resident', 'specialties', 'cuSpecialty'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $residentId)
    {
        if (Auth::user()->hasPermissionTo('إضافة تدريب سابق')) {
            $pr_document = $request->pr_document != null ? UploadImage('residents/pr_document', $request->pr_document) : null;
            PreviousTraining::create([
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'hospital_name'     => $request->hospital_name,
                'hospital_place'    => $request->hospital_place,
                'official_name'     => $request->official_name,
                'official_phone'    => $request->official_phone,
                'official_email'    => $request->official_email,
                'pr_document'       => $pr_document,
                'resident_id'       => $residentId,
                'specialty_id'      => $request->specialty_id,
            ]);
            return redirect()->back()->with('success', 'تم إضافة تدريب سابق بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($residentid)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PreviousTraining $previousTraining)
    {
        if (Auth::user()->hasPermissionTo('تعديل تدريب سابق')) {
            $specialties = Specialty::all();
            return view('admin.previousTraining.edit', compact('previousTraining', 'specialties'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
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
        if (Auth::user()->hasPermissionTo('تعديل تدريب سابق')) {
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasPermissionTo('حذف تدريب سابق')) {
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
}
