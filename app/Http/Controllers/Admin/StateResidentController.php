<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Resident;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StateResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resident $resident, Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('كل حالات المقيم')) {
            $states = $resident->States()->wherePivot('specialty_id', '=', $specialty->id)->get();
            return view('admin.stateResident.index', compact('states', 'resident', 'specialty'));
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
        if (Auth::user()->hasPermissionTo('إضافة حالة لمقم')) {
            $states = State::all();
            return view('admin.stateResident.add', compact('resident', 'specialty', 'states'));
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

        if (Auth::user()->hasPermissionTo('إضافة حالة لمقم')) {
            $stat = State::find($request->state);
            $resident->States()->attach($request->state, [
                'date' => $request->date, 'start' => $request->start, 'end' => $request->end, 'reason' => $request->reason, 'specialty_id' => $specialty->id
            ]);
            //$resident->Specialties()->updateExistingPivot($specialty->id, ['status' => $stat->name]);
            return redirect()->back()->with('success', 'تم إضافة تغير الحالة بنجاح');
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
     * @param  State $state ,Specialty $specialty,Resident $resident
     * @return \Illuminate\Http\Response
     */
    public function edit(Resident $resident, Specialty $specialty, State $state, $pivotId)
    {

        if (Auth::user()->hasPermissionTo('تعديل حالة لمقيم')) {
            $states = State::all();
            $cuState = $resident->States()->wherePivot('id', $pivotId)->first();
            //$reState = $resident->States()->newPivotStatement()->where([['specialty_id', '=', $specialty->id], ['state_id', '=', $state->id]])->first();


            return view('admin.stateResident.edit', compact('states', 'state', 'cuState', 'specialty', 'resident'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  State $state  Specialty $specialty Resident $resident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resident $resident, Specialty $specialty, State $state, $pivotId)
    {

        if (Auth::user()->hasPermissionTo('تعديل حالة لمقيم')) {
            //$resident->States()->wherePivot('id', $request->$pivotId)->updateExistingPivot($state->id, ['state_resident.date' => $request->date, 'state_resident.start' => $request->start, 'state_resident.end' => $request->end, 'state_resident.reason' => $request->reason]);
            $resident->States()->newPivotStatement()->where([['id', '=', $request->pivotId], ['specialty_id', '=', $specialty->id], ['state_id', '=', $state->id]])->update(['date' => $request->date, 'start' => $request->start, 'end' => $request->end, 'reason' => $request->reason]);
            return redirect()->route('StateResident.index', ['resident' => $resident, 'specialty' => $specialty])->with('success', 'تم تعديل معلومات العقوبة بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   Resident $resident
     * @param   Specialty $specialty
     * @param   State $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Resident $resident, Specialty $specialty, State $state)
    {
        // if (Auth::user()->hasPermissionTo('حذف حالة لمقيم')) {
        //     $resident->States()->wherePivot('id', $request->pivotId)->detach();
        //     return redirect()->route('StateResident.index', ['resident' => $resident, 'specialty' => $specialty])->with('success', 'تم حذف معلومات العقوبة بنجاح');
        // }
        // return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
        return redirect()->back()->with('warning', 'يمكنك الذهاب وتعديل الحالة المراد حذفها وتحويله إلى اليوم');
    }
}
