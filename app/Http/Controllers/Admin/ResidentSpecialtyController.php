<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResidentSpecialtyController extends Controller
{
    /**
     * Display all resident in specialty.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function residents(Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('عرض المقيمين في اختصاص')) {
            $residents = $specialty->Residents()->wherePivot('status', '=', 'مقيم')->get();
            return view('admin.specialty.residents', compact('residents', 'specialty'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display all Training finished resident in specialty.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finished(Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('عرض الذين أنهو التدريب في اختصاص')) {
            $residents = $specialty->Residents()->wherePivot('status', '=', 'أنهى التدريب')->get();
            return view('admin.specialty.residents', compact('residents', 'specialty'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display all Graduates resident in specialty.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function graduates(Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('عرض الخريجين في اختصاص')) {
            $residents = $specialty->Residents()->wherePivot('status', '=', 'خريج')->get();
            return view('admin.specialty.residents', compact('residents', 'specialty'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }


    /**
     * Display other resident in specialty.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function other(Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('عرض الذين تم تغير حالتهم في اختصاص')) {
            $residents = $specialty->Residents()->wherePivot('status', '!=', 'خريج')->wherePivot('status', '!=', 'مقيم')->wherePivot('status', '!=', 'أنهى التدريب')->get();
            return view('admin.specialty.residents', compact('residents', 'specialty'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
