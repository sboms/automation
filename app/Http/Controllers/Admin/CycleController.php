<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use Auth;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل الدورات الامتحانية')) {
            $cycles = Cycle::all();
            return view('admin.cycle.index', compact('cycles'));
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
        if (Auth::user()->hasPermissionTo('إضافة دورة امتحانية')) {
            return view('admin.cycle.add');
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
        if (Auth::user()->hasPermissionTo('إضافة دورة امتحانية')) {
            Cycle::create([
                'type' => $request->type,
                'year' => $request->year,
            ]);
            return redirect()->back()->with('success', 'تم إضافة الدورة الامتحانية بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function show(Cycle $cycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Cycle $cycle)
    {
        if (Auth::user()->hasPermissionTo('تعديل دورة امتحانية')) {
            return view('admin.cycle.edit', compact('cycle'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cycle $cycle)
    {
        if (Auth::user()->hasPermissionTo('تعديل دورة امتحانية')) {
            $cycle->type = $request->type;
            $cycle->year = $request->year;
            $cycle->save();
            return redirect()->back()->with('success', 'تم تعديل معلومات الدورة الامتحانية بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cycle  $cycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cycle $cycle)
    {
        //
    }
}