<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل المسيات الوظيفية')) {
            $roles = Role::all();
            return view('admin.role.index', compact('roles'));
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
        if (Auth::user()->hasPermissionTo('إضافة مسمى وظيفي')) {
            return view('admin.role.add');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasPermissionTo('إضافة مسمى وظيفي')) {
            Role::create([
                'name' => $request->name,
            ]);
            return redirect()->back()->with('success', 'تم إضافة المسمى الوظيفي بنجاح');
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
        if (Auth::user()->hasPermissionTo('تعديل مسمى وظيفي')) {
            $role = Role::findById($id);
            return view('admin.role.edit', compact('role'));
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
    public function update(Request $request, Role $role)
    {
        if (Auth::user()->hasPermissionTo('تعديل مسمى وظيفي')) {
            if ($role->name == 'Super Admin') {
                return redirect()->back()->with('warning', 'هذا المسمى أساسي في النظام ولا يمكن تعديله');
            }
            $role->name = $request->name;
            $role->save();
            return redirect()->back()->with('success', 'تم تعديل المسى الوظيفي بنجاح');
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (Auth::user()->hasPermissionTo('حذف مسمى وظيفي')) {
            if ($role->id <= 11) {
                return redirect()->back()->with('error', 'لا يمكن حذف مسمى وظيفي أساسي يمكنك محاولة تعديله فقط');
            }
        }
        return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    /**
     * Add permission to role.
     *
     * @param  \App\Models\Role  $city
     * @return \Illuminate\Http\Response
     */
    public function addPermissionToRoleCreate(Role $role)
    {
        //if (Auth::user()->hasPermissionTo('إضافة مسمى مهة لمسمى وظيفي')) {
        $cuPermissions = $role->permissions;
        $premissions = Permission::all();
        return view('admin.role.permissionToRole', compact('premissions', 'role', 'cuPermissions'));
        // }
        // return redirect()->back()->with('warning', 'لا تملك الصلاحية لزيارة هذه الصفحة');
    }

    public function addPermissionToRoleStore(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissionsIds);
        return redirect()->back()->with('success', 'تم تعديل الصلاحيات بنجاح');
    }
}
