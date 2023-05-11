<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermissionTo('عرض كل الكادر')) {
            $users = User::all();
            return view('admin.admin.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::user()->hasPermissionTo('إضافة عضو')) {
            $committees = Committee::all();
            $roles = Role::all();
            return view('admin.admin.add', compact('committees', 'roles'));
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
        if (Auth::user()->hasPermissionTo('إضافة عضو')) {
            $user = User::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => $request->password,
                'last_name'         => $request->last_name,
                'gender'            => $request->gender,
                'phone'             => $request->phone,
                'father'            => $request->father,
                'mother'            => $request->mother,
                'birthplace'        => $request->birthplace,
                'password'          => Hash::make($request->password),
                'email_verified_at' => date(now()),
                'birthdate'         => $request->birthdate,
                'workplace'         => $request->workplace,
            ]);
            $user->assignRole($request->role);
            return redirect()->back()->with('success', 'الإضافة بنجاح');
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
    public function edit(User $user)
    {
        if (Auth::user()->hasPermissionTo('تعديل عضو')) {
            $roles = Role::all();
            return view('admin.admin.edit', compact('user', 'roles'));
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
    public function update(Request $request, User $user)
    {
        if (Auth::user()->hasPermissionTo('تعديل عضو')) {
            /**update user information*/
            $user->workplace = $request->workplace;
            $user->name      = $request->name;
            $user->email     = $request->email;
            $user->last_name = $request->last_name;
            $user->gender    = $request->gender;
            $user->phone     = $request->phone;
            $user->father    = $request->father;
            $user->mother    = $request->mother;
            $user->birthplace = $request->birthplace;
            $user->birthdate = $request->birthdate;
            if ($request->password != null) {
                $user->password  = $request->password;
            }
            $user->save();
            /** synchronize all roles with user */
            $user->syncRoles($request->role);

            return redirect()->back()->with('success', 'تعديل المعلومات بنجاح');
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
