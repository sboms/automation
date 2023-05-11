<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\State;
use App\Http\Requests\State\StoreStateRequest;
use App\Http\Requests\State\UpdateStateRequest;
use App\Models\Resident;
use App\Models\Specialty;
use Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل الحالات الوظيفة')) {
            $states = State::all();
            return view('admin.state.index', compact('states'));
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
        if (Auth::user()->hasPermissionTo('إضافة حالة وظيفية')) {
            return view('admin.state.add');
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
        if (Auth::user()->hasPermissionTo('إضافة حالة وظيفية')) {
            State::create([
                'name'              => $request->name,
                'new_state'     => $request->new_state,
            ]);
            return redirect()->back()->with('success', 'تم إضافة الحالة بناح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {

        return view('admin.state.show', compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        if (Auth::user()->hasPermissionTo('تعديل حالة وظيفية')) {
            return view('admin.state.edit', compact('state'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        if (Auth::user()->hasPermissionTo('تعديل حالة وظيفية')) {
            $state->name             = $request->name;
            $state->new_state           = $request->new_state;
            $state->save();
            return redirect()->back()->with('success', 'تم تعديل الحالة بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        if (Auth::user()->hasPermissionTo('حذف حالة وظيفية')) {
            $residentCount = $state->Residents()->count();
            if ($residentCount > 0) {
                return redirect()->back()->with('error', 'لم يتم حذف الحالة لوجود مقيمين حصلوا على الحالة بالفعل');
            }
            $state->delete();
            return redirect()->back()->with('success', 'تم حذف الحالة بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }
}