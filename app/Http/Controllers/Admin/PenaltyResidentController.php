<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penalty;
use App\Models\Resident;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenaltyResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resident $resident, Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('كل عقوبات المقيم')) {
            $penalties = $resident->Penalties()->wherePivot('specialty_id', '=', $specialty->id)->get();
            return view('admin.penaltyResident.index', compact('penalties', 'resident', 'specialty'));
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
        if (Auth::user()->hasPermissionTo('إضافة عقوبة لمقيم')) {
            $penalties = Penalty::all();
            return view('admin.penaltyResident.add', compact('resident', 'specialty', 'penalties'));
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
        if (Auth::user()->hasPermissionTo('إضافة عقوبة لمقيم')) {
            $resident->Penalties()->attach($request->penalty, [
                'date' => $request->date, 'start' => $request->start, 'end' => $request->end, 'reason' => $request->reason, 'specialty_id' => $specialty->id
            ]);
            return redirect()->back()->with('success', 'تم إضافة العقوبة بناح');
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
     * @param  Penalty $penalty ,Specialty $specialty,Resident $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident, Specialty $specialty, Penalty $penalty)
    {
        if (Auth::user()->hasPermissionTo('تعديل عقوبة لمقيم')) {
            $penalties = Penalty::all();
            $rePenalty = $resident->Penalties()->newPivotStatement()->where([['specialty_id', '=', $specialty->id], ['penalty_id', '=', $penalty->id]])->first();
            // return $rePenalty;
            // $cuPenalty = Penalty::find($rePenalty->rePenalties);
            return view('admin.penaltyResident.edit', compact('penalties', 'penalty', 'rePenalty', 'specialty', 'resident'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Penalty $penalty  Specialty $specialty Resident $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident, Specialty $specialty, Penalty $penalty)
    {
        if (Auth::user()->hasPermissionTo('تعديل عقوبة لمقيم')) {
            $resident->Penalties()->newPivotStatement()->where([['specialty_id', '=', $specialty->id], ['penalty_id', '=', $penalty->id]])->update(['date' => $request->date, 'start' => $request->start, 'end' => $request->end, 'reason' => $request->reason]);
            return redirect()->route('penaltyResident.index', ['resident' => $resident, 'specialty' => $specialty])->with('success', 'تم تعديل معلومات العقوبة بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   Resident $resident
     * @param   Specialty $specialty
     * @param   Penalty $penalty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident, Specialty $specialty, Penalty $penalty)
    {
        if (Auth::user()->hasPermissionTo('حذف عقوبة لمقيم')) {
            $resident->Penalties()->wherePivot('penalty_id', $penalty->id)->wherePivot('specialty_id', $specialty->id)->detach();
            return redirect()->route('penaltyResident.index', ['resident' => $resident, 'specialty' => $specialty])->with('success', 'تم حذف معلومات العقوبة بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
}
