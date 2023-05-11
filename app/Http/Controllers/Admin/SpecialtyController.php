<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialtyRequest;
use App\Models\Committee;
use App\Models\ResidenceYear;
use App\Models\Resident;
use App\Models\Specialty;
use App\Models\State;
use Auth;
use Carbon\Carbon;
use Database\Seeders\ResidentSeeder;
use DateTime;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function test()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل الاختصاصات')) {
            $specialties = Specialty::all();
            return view('admin.specialty.index', compact('specialties'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasPermissionTo('إضافة اختصاص')) {
            return view('admin.specialty.add');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtyRequest $request)
    {
        if (Auth::user()->hasPermissionTo('إضافة اختصاص')) {
            Specialty::create([
                'name' => $request->name,
                'number_of_years' => $request->number_of_years,
                'code' => $request->code,
                'type' => $request->type,

            ]);
            return redirect()->back()->with('success', 'تم إضافة الاختصاص بنجاح');
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
        if (Auth::user()->hasPermissionTo('تعديل اختصاص')) {
            $specialty = Specialty::find($id);
            return view('admin.specialty.edit', compact('specialty'));
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
    public function update(SpecialtyRequest $request, $id)
    {
        if (Auth::user()->hasPermissionTo('تعديل اختصاص')) {
            $specialty = Specialty::find($id);
            $specialty->name = $request->name;
            $specialty->number_of_years = $request->number_of_years;
            $specialty->code = $request->code;
            $specialty->type = $request->type;
            $specialty->save();
            return redirect()->back()->with('success', 'تعديل معلمومات الاختصاص بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Specialty $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('حذف اختصاص')) {
            if ($specialty->Residents()->count() > 0) {
                return redirect()->back()->with('error', 'لا يمكن حذف هذا الاختصاص لأنه يحتوي على مقيمين');
            }
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
}
