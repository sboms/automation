<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResidenceYear\StoreResidenceYearRequest;
use App\Http\Requests\ResidenceYear\UpdateResidenceYearRequest;
use App\Models\ResidenceYear;
use App\Models\Resident;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ResidenceYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resident $resident, Specialty $specialty)
    {
        if (Auth::user()->hasPermissionTo('عرض كل سنوات الإقامة')) {
            $residenceYears = $resident->ResidenceYear()->where('specialty_id', $specialty->id)->get();
            return view('admin.residenceYear.index', compact('residenceYears', 'resident', 'specialty'));
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
        if (Auth::user()->hasPermissionTo('إضافة سنة إقامة')) {
            return view('admin.residenceYear.add', compact('resident', 'specialty'));
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResidenceYearRequest $request)
    {
        if (Auth::user()->hasPermissionTo('إضافة سنة إقامة')) {
            ResidenceYear::create([
                'name' => $this->getYearName($request->number),
                'number' => $request->number,
                'state' => $request->state,
                'comment' => $request->comment,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'resident_id' => $request->resident_id,
                'specialty_id' => $request->specialty_id,
            ]);
            return redirect()->back();
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResidenceYear  $residenceYear
     * @return \Illuminate\Http\Response
     */
    public function show(ResidenceYear $residenceYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ResidenceYear $residenceYear)
    {
        if (Auth::user()->hasPermissionTo('تعديل سنة إقامة')) {
            $resident = Resident::find($residenceYear->resident_id);
            $specialty = Specialty::find($residenceYear->specialty_id);
            return view('admin.residenceYear.edit', compact('residenceYear', 'resident', 'specialty'));
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
    public function update(UpdateResidenceYearRequest $request, ResidenceYear $residenceYear)
    {
        if (Auth::user()->hasPermissionTo('تعديل سنة إقامة')) {
            $residenceYear->name = $this->getYearName($request->number);
            $residenceYear->number = $request->number;
            $residenceYear->state = $request->state;
            $residenceYear->comment = $request->comment;
            $residenceYear->start_date = $request->start_date;
            $residenceYear->end_date = $request->end_date;
            $residenceYear->save();
            return redirect()->route('residenceYear.index', ['resident' => $residenceYear->resident_id, 'specialty' => $residenceYear->specialty_id])->with('success', 'تم تعديل سنة الإقامة ينجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResidenceYear  $residenceYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResidenceYear $residenceYear)
    {
        if (Auth::user()->hasPermissionTo('حذف سنة إقامة')) {
            $resident = $residenceYear->resident_id;
            $specialty = $residenceYear->specialty_id;
            $residenceYear->delete();
            return redirect()->route('residenceYear.index', ['resident' => $resident, 'specialty' => $specialty])->with('success', 'تم حذف سنة الإقامة ينجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
    /**
     * Get Year Name
     *
     * @param  int  $number
     * @return string
     */
    public function getYearName($num)
    {
        if ($num == 1) {
            return "أولى";
        } elseif ($num == 2) {
            return "ثانية";
        } elseif ($num == 3) {
            return "ثالثة";
        } elseif ($num == 4) {
            return "رابعة";
        } elseif ($num == 5) {
            return "خامسة";
        } elseif ($num == 6) {
            return "سادسة";
        } else {
            return "سابعة";
        }
    }
}