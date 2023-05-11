<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\Specialty;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل المجالس')) {
            $committees = Committee::all();
            return view('admin.committee.index', compact('committees'));
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
        /**
         * Roles ids
         * Committee admin 6
         * Committee member 7
         * secretary 9
         */
        if (Auth::user()->hasPermissionTo('إضافة مجلس')) {
            $adminCommittee = User::role(6)->get();
            $membersCommittee = User::role(7)->get();
            $secretaryCommittee = User::role(9)->get();
            $specialties = Specialty::all();
            return view('admin.committee.add', compact('specialties', 'adminCommittee', 'membersCommittee', 'secretaryCommittee'));
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

        if (Auth::user()->hasPermissionTo('إضافة مجلس')) {
            DB::beginTransaction();
            $committee = Committee::create([
                'name' => $request->name,
                'specialty_id' => $request->specialty_id,
            ]);
            $committee->Users()->attach($request->adminCommittee);
            $committee->Users()->attach($request->membersCommittee);
            $committee->Users()->attach($request->secretaryCommittee);
            DB::commit();
            return redirect()->back()->with('success', 'تم إضافة المجلس العلمي بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
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
    public function edit(Committee $committee)
    {
        /**
         * Roles ids
         * Committee admin 6
         * Committee member 7
         * secretary 9
         */
        if (Auth::user()->hasPermissionTo('تعديل مجلس')) {
            $adminCommittee = User::role(6)->get();
            $membersCommittee = User::role(7)->get();
            $secretaryCommittee = User::role(9)->get();
            $specialties = Specialty::all();
            return view('admin.committee.edit', compact('committee', 'specialties', 'adminCommittee', 'membersCommittee', 'secretaryCommittee'));
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Committee $committee)
    {
        if (Auth::user()->hasPermissionTo('تعديل مجلس')) {
            DB::beginTransaction();
            $committee->name = $request->name;
            $committee->specialty_id = $request->specialty_id;
            $committee->save();
            $committee->Users()->detach();
            $committee->Users()->attach($request->adminCommittee);
            $committee->Users()->attach($request->membersCommittee);
            $committee->Users()->attach($request->secretaryCommittee);
            DB::commit();
            return redirect()->back()->with('success', 'تعديل معلمومات المجلس العلمي بنجاح');
        }
        return redirect()->back()->with('erorr', 'لا تملك الصلاحية لزيارة هذه الصفحة');
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
