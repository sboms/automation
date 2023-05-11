<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamCenter\StoreExamCenterRequest;
use App\Http\Requests\ExamCenter\UpdateExamCenterRequest;
use App\Models\ExamCenter;
use Auth;
use Illuminate\Http\Request;

class ExamCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل المراكز الامتحانية')) {
            $examCenters = ExamCenter::all();
            return view('admin.examCenter.index', compact('examCenters'));
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
        if (Auth::user()->hasPermissionTo('إضافة مركز امتحاني')) {
            return view('admin.examCenter.add');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamCenterRequest $request)
    {
        if (Auth::user()->hasPermissionTo('إضافة مركز امتحاني')) {
            ExamCenter::create([
                'name' => $request->name,
                'place' => $request->place,
                'type' => $request->type,
            ]);
            return redirect()->back()->with('success', 'تم إضافة المركز الامتحاني بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamCenter  $examCenter
     * @return \Illuminate\Http\Response
     */
    public function show(ExamCenter $examCenter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamCenter  $examCenter
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamCenter $examCenter)
    {
        if (Auth::user()->hasPermissionTo('تعديل مركز امتحاني')) {
            return view('admin.examCenter.edit', compact('examCenter'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExamCenter  $examCenter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamCenterRequest $request, ExamCenter $examCenter)
    {
        if (Auth::user()->hasPermissionTo('تعديل مركز امتحاني')) {
            $examCenter->name = $request->name;
            $examCenter->place = $request->place;
            $examCenter->type = $request->type;
            $examCenter->save();
            return redirect()->back()->with('success', 'تم إضافة المركز بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamCenter  $examCenter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamCenter $examCenter)
    {
        //
    }
}