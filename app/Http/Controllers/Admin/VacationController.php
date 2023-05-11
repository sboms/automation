<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VacationRequest;
use App\Models\Vacation;
use Auth;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل الإجازات')) {
            $vacations = Vacation::all();
            return view('admin.vacation.index', compact('vacations'));
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
        if (Auth::user()->hasPermissionTo('إضافة إجازة')) {
            return view('admin.vacation.add');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacationRequest $request)
    {
        if (Auth::user()->hasPermissionTo('إضافة إجازة')) {
            Vacation::create([
                'name'              => $request->name,
                'maxday'            => $request->maxday,
                'maxdayinyear'      => $request->maxdayinyear,
                'repetition'        => $request->repetition,
                'salarydeduction'   => $request->salarydeduction,
                'recompense'        => $request->recompense,
            ]);
            return redirect()->back()->with('success', 'تم إضافة الإجازة بناح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function show(Vacation $vacation)
    {
        return view('admin.vacation.show', compact('vacation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacation $vacation)
    {
        if (Auth::user()->hasPermissionTo('تعديل إجازة')) {
            return view('admin.vacation.edit', compact('vacation'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacation $vacation)
    {
        if (Auth::user()->hasPermissionTo('تعديل إجازة')) {
            $vacation->name             = $request->name;
            $vacation->maxday           = $request->maxday;
            $vacation->maxdayinyear     = $request->maxdayinyear;
            $vacation->repetition       = $request->repetition;
            $vacation->salarydeduction  = $request->salarydeduction;
            $vacation->recompense       = $request->recompense;
            $vacation->save();
            return redirect()->back()->with('success', 'تم تعديل الإجازة بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacation  $vacation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacation $vacation)
    {
        if (Auth::user()->hasPermissionTo('حذف إجازة')) {
            $residentCount = $vacation->Residents()->count();
            if ($residentCount > 0) {
                return redirect()->back()->with('error', 'لم يتم حذف الإجازة لوجود مقيمين حصلوا على الإجازة بالفعل');
            }
            $vacation->delete();
            return redirect()->back()->with('success', 'تم حذف الإجازة بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
}