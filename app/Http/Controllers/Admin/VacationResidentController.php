<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VacationResidentRequest;
use App\Models\Resident;
use App\Models\Specialty;
use App\Models\Vacation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacationResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resident $resident, Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('عرض إجازات المقيم')) {
            $vacations = $resident->Vacations()->wherePivot('specialty_id', '=', $specialty->id)->get();
            return view('admin.vacationresident.index', compact('vacations', 'resident', 'specialty'));
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
        if (Auth::user()->hasPermissionTo('إضافة إجازة لمقيم')) {
            $vacations = Vacation::all();
            return view('admin.vacationresident.add', compact('resident', 'specialty', 'vacations'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacationResidentRequest $request, Resident $resident, Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('إضافة إجازة لمقيم')) {
            $resident->Vacations()->attach($request->vacation, [
                'start' => $request->start, 'end' => $request->end, 'specialty_id' => $specialty->id
            ]);
            return redirect()->back()->with('success', 'تم إضافة الإجازة بناح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacation  $vacationresident
     * @return \Illuminate\Http\Response
     */
    public function show(Vacation $vacationresident)
    {
        // if (Auth::user()->hasPermissionTo('عرض كل سنوات الإقامة')) {
        //     return view('admin.vacationresident.show', compact('vacationresident'));
        // }
        // return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident, Specialty $specialty, Vacation $vacation)
    {
        if (Auth::user()->hasPermissionTo('تعديل إجازة لمقيم')) {
            $vacations = Vacation::all();
            $reVacation = $resident->Vacations()->newPivotStatement()->where([['specialty_id', '=', $specialty->id], ['vacation_id', '=', $vacation->id]])->first();
            $cuVacation = Vacation::find($reVacation->vacation_id);
            //dd($reVacation);
            return view('admin.vacationresident.edit', compact('resident', 'specialty', 'vacations', 'reVacation', 'cuVacation'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacation  $vacationresident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident, Specialty $specialty, Vacation $vacation)
    {
        if (Auth::user()->hasPermissionTo('تعديل إجازة لمقيم')) {
            //$user->roles()->wherePivot('id', $userRoleId)->updateExistingPivot($oldRoleId, ['role_id' => $newRoleId]);
            //$user->roles()->newPivotStatement()->where('id', $userRoleId)->update(['role_id' => $newRoleId]);
            //dd($request);
            $va = $resident->Vacations()->newPivotStatement()->where([['specialty_id', '=', $specialty->id], ['vacation_id', '=', $vacation->id]])->update(['start' => $request->start, 'end' => $request->end, 'vacation_id' => $request->vacation]);

            return redirect()->route('vacationResident.index', ['resident' => $resident->id, 'specialty' => $specialty->id])->with('success', 'تم تعديل الإجازة بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacation  $vacationresident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resident $resident, Specialty $specialty, Vacation $vacation)
    {
        if (Auth::user()->hasPermissionTo('حذف عقوبة لمقيم')) {
            $resident->Vacations()->wherePivot('vacation_id', $vacation->id)->wherePivot('specialty_id', $specialty->id)->detach();
            return redirect()->back()->with('success', 'تم حذف إجازة القيم بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
}
