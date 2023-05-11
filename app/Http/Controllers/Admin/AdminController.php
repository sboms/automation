<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\ResidenceYear;
use App\Models\Specialty;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function test()
    {
        $specialties = Specialty::all();

        foreach ($specialties as $specialty) {
            $residents = $specialty->Residents()->wherePivot('status', 'مقيم')->get();
            foreach ($residents as $resident) {
                $lastResindenceYear = $resident->ResidenceYear()->where('specialty_id', $specialty->id)->orderBy('start_date', 'desc')->first();
                $numberDaysFromStatrDay = $this->CountDays($lastResindenceYear->start_date, date('y-m-d'));
                if ($numberDaysFromStatrDay < 365) {
                    continue;
                } else {

                    $comment = '';
                    $penaltyDays = 0;
                    $vacationDays = 0;
                    $stateDays = 0;
                    $penalties = $resident->Penalties()->where('residence_effect', true)->wherePivot('specialty_id', $specialty->id)->wherePivot('start', '>=', $lastResindenceYear->start_date)->get();
                    $vacations = $resident->Vacations()->where('recompense', false)->wherePivot('specialty_id', $specialty->id)->wherePivot('start', '>=', $lastResindenceYear->start_date)->get();
                    $stats = $resident->States()->wherePivot('specialty_id', $specialty->id)->wherePivot('start', '>=', $lastResindenceYear->start_date)->get();

                    if ($penalties != null) {
                        foreach ($penalties as $penalty) {
                            $penaltyDays += $this->CountDays($penalty->pivot->start, $penalty->pivot->end);
                        }
                    }

                    if ($vacations != null) {
                        foreach ($vacations as $vacation) {
                            $vacationDays += $this->CountDays($vacation->pivot->start, $vacation->pivot->end);
                        }
                    }
                    if ($stats != null) {
                        foreach ($stats as $stats) {
                            $stateDays += $this->CountDays($stats->pivot->start, $stats->pivot->end);
                        }
                    }

                    $fullDays = $numberDaysFromStatrDay - $penaltyDays - $vacationDays - $stateDays;

                    if ($fullDays >= 365) {

                        $this->moveToNexYear($resident, $specialty, $lastResindenceYear);
                    }
                }
            }
        }
        return 0;
    }
    /**
     * Transferring the resident to the next residence year and completing training if it was the last year.
     *
     * @return Boolean
     */
    public function moveToNexYear($resident, $specialty, $lastResindenceYear)
    {

        if (($specialty->number_of_years - 1) == (int)$lastResindenceYear->number) {
            if (!$this->chekFirstExam($resident, $specialty)) {
                $lastResindenceYear->comment = 'لن يتم الترفع إلى سنة الإقامة الأخيرة حتى يحقق المقيم درجة نجاح في الامتحان الأولي';
                $lastResindenceYear->save();
                return 0;
            }
        }

        if ($specialty->number_of_years == (int)$lastResindenceYear->number) {


            $lastResindenceYear->end_date = date('Y-m-d');
            $lastResindenceYear->save();
            $resident->Specialties()->updateExistingPivot($specialty->id, [
                'status' => 'أنهى التدريب',
            ]);

            return 0;
        }

        $date = Carbon::today()->addDay();
        $nextDay = $date->format('Y-m-d');
        if ((int)$lastResindenceYear->number == 1) {

            $lastResindenceYear->end_date = date('Y-m-d');
            $lastResindenceYear->save();

            ResidenceYear::create([
                'name' => 'ثانية',
                'number' => 2,
                'state' => 'إقامة',
                'comment' => null,
                'start_date' => $nextDay,
                'end_date' => null,
                'resident_id' => $resident->id,
                'specialty_id' => $specialty->id,
            ]);
        }
        if ((int)$lastResindenceYear->number == 2) {
            $lastResindenceYear->end_date = date('Y-m-d');
            $lastResindenceYear->save();
            ResidenceYear::create([
                'name' => 'ثالثة',
                'number' => 3,
                'state' => 'إقامة',
                'comment' => null,
                'start_date' => $nextDay,
                'end_date' => null,
                'resident_id' => $resident->id,
                'specialty_id' => $specialty->id,
            ]);
        }
        if ((int)$lastResindenceYear->number == 3) {
            $lastResindenceYear->end_date = date('Y-m-d');
            $lastResindenceYear->save();
            ResidenceYear::create([
                'name' => 'رابعة',
                'number' => 4,
                'state' => 'إقامة',
                'comment' => null,
                'start_date' => $nextDay,
                'end_date' => null,
                'resident_id' => $resident->id,
                'specialty_id' => $specialty->id,
            ]);
        }
        if ((int)$lastResindenceYear->number == 4) {
            $lastResindenceYear->end_date = date('Y-m-d');
            $lastResindenceYear->save();
            ResidenceYear::create([
                'name' => 'خامسة',
                'number' => 5,
                'state' => 'إقامة',
                'comment' => null,
                'start_date' => $nextDay,
                'end_date' => null,
                'resident_id' => $resident->id,
                'specialty_id' => $specialty->id,
            ]);
        }
        if ((int)$lastResindenceYear->number == 5) {
            $lastResindenceYear->end_date = date('Y-m-d');
            $lastResindenceYear->save();
            ResidenceYear::create([
                'name' => 'سادسة',
                'number' => 6,
                'state' => 'إقامة',
                'comment' => null,
                'start_date' => $nextDay,
                'end_date' => null,
                'resident_id' => $resident->id,
                'specialty_id' => $specialty->id,
            ]);
        }
        if ((int)$lastResindenceYear->number == 6) {
            $lastResindenceYear->end_date = date('Y-m-d');
            $lastResindenceYear->save();
            ResidenceYear::create([
                'name' => 'سابعة',
                'number' => 7,
                'state' => 'إقامة',
                'comment' => null,
                'start_date' => $nextDay,
                'end_date' => null,
                'resident_id' => $resident->id,
                'specialty_id' => $specialty->id,
            ]);
        }
    }

    /**
     * Check whether the resident is required to take the preliminary exam or not
     *
     * @return Boolean
     */
    public function chekFirstExam($resident, $specialty)
    {
        $cuResident = $specialty->Residents()->wherePivot('specialty_id', $specialty->id)->wherePivot('resident_id', $resident->id)->first();
        if ($cuResident->pivot->first_exam) {
            $results = $resident->Results()->where('value', '>', 59)->get();
            foreach ($results as $result) {
                $exam = $result->Exam()->get();
                if ($exam->name == 'كتابي أولي') {
                    return true;
                }
            }
            return false;
        }
        return true;
    }

    /**
     * Returns the number of days between two dates.
     *
     * @return int
     */
    public function CountDays($sDate, $eDate)
    {
        $startDate = new DateTime($sDate);
        $endDate = new DateTime($eDate);

        $interval = $startDate->diff($endDate);
        $countDays = $interval->days;
        return $countDays;
    }
    /***************************************************************************************** */
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
