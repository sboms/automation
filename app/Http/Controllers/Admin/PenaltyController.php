<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penalty;
use App\Http\Requests\StorePenaltyRequest;
use App\Http\Requests\UpdatePenaltyRequest;
use Auth;

class PenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل العقوبات')) {
            $penalties = Penalty::all();
            return view('admin.penalty.index', compact('penalties'));
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
        if (Auth::user()->hasPermissionTo('إضافة عقوبة')) {
            return view('admin.penalty.add');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenaltyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenaltyRequest $request)
    {
        if (Auth::user()->hasPermissionTo('إضافة عقوبة')) {
            Penalty::create([
                'name' => $request->name,
                'count' => $request->count,
                'residence_effect' => $request->residence_effect,
            ]);
            return redirect()->back()->with('success', 'تم إضافة الإجازة بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function show(Penalty $penalty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function edit(Penalty $penalty)
    {
        if (Auth::user()->hasPermissionTo('تعديل عقوبة')) {
            return view('admin.penalty.edit', compact('penalty'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenaltyRequest  $request
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenaltyRequest $request, Penalty $penalty)
    {
        if (Auth::user()->hasPermissionTo('تعديل عقوبة')) {
            $penalty->name = $request->name;
            $penalty->count = $request->count;
            $penalty->residence_effect = $request->residence_effect;
            $penalty->save();
            return redirect()->back()->with('success', 'تم تعديل العقوبة بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penalty  $penalty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penalty $penalty)
    {
        //
    }
}